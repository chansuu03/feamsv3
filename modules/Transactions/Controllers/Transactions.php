<?php
namespace Modules\Transactions\Controllers;

use App\Controllers\BaseController;
use Modules\Transactions\Models as Models;
use Modules\Payments\Models as PayModels;
use App\Models as AppModels;

class Transactions extends BaseController
{
    public function __construct() {
        $this->paymentModel = new PayModels\PaymentModel();
        $this->activityLogModel = new AppModels\ActivityLogModel();
        $this->userModel = new AppModels\UserModel();
        $this->transactionModel = new Models\TransactionModel();
    }

    public function index() {
        // checking roles and permissions
        $data['perm_id'] = check_role('40', 'TRANS', $this->session->get('role'));
        if(!$data['perm_id']['perm_access']) {
            $this->session->setFlashdata('sweetalertfail', true);
            return redirect()->to(base_url());
        }
        $data['rolePermission'] = $data['perm_id']['rolePermission'];

        $data['transactions']  = $this->transactionModel->viewAll();

        $data['user_details'] = user_details($this->session->get('user_id'));
        $data['active'] = 'transactions';
        $data['title'] = 'Transactions';
        return view('Modules\Transactions\Views\index', $data);
    }

    public function add() {
        // checking roles and permissions
        $data['perm_id'] = check_role('40', 'TRANS', $this->session->get('role'));
        if(!$data['perm_id']['perm_access']) {
            $this->session->setFlashdata('sweetalertfail', true);
            return redirect()->to(base_url());
        }
        $data['rolePermission'] = $data['perm_id']['rolePermission'];

        helper('text');
        $data['edit'] = false;
        $data['users'] = $this->userModel->findAll();
        $data['payments'] = $this->paymentModel->findAll();
        if($this->request->getMethod() == 'post') {
            if($this->validate('transactions')) {
                $file = $this->request->getFile('photo');
                $_POST['photo'] = $file->getRandomName();
                $_POST['added_by'] = $this->session->get('user_id');
                if($this->transactionModel->insert($_POST)) {
                    $file->move('uploads/transactions', $_POST['photo']);
                    $activityLog['user'] = $this->session->get('user_id');
                    $activityLog['description'] = 'Added a new transaction';
                    $this->activityLogModel->save($activityLog);
                    $this->session->setFlashData('successMsg', 'Adding transaction successful');
                    return redirect()->to(base_url('admin/transactions'));
                } else {
                    $this->session->setFlashData('failMsg', 'There is an error on adding transaction. Please try again.');
                    return redirect()->back()->withInput();
                }
            }
        }

        $data['user_details'] = user_details($this->session->get('user_id'));
        $data['active'] = 'payments';
        $data['title'] = 'Transactions';
        return view('Modules\Transactions\Views\form', $data);
    }

    public function edit($id) {
        // checking roles and permissions
        $data['perm_id'] = check_role('17', 'SLID', $this->session->get('role'));
        if(!$data['perm_id']['perm_access']) {
            $this->session->setFlashdata('sweetalertfail', true);
            return redirect()->to(base_url());
        }
        $data['rolePermission'] = $data['perm_id']['rolePermission'];

        helper('text');
        $data['edit'] = true;
        $data['value'] = $this->sliderModel->where('id', $id)->first();
        $data['id'] = $data['value']['id'];
        if($this->request->getMethod() == 'post') {
            if($this->validate('payments')){
                $file = $this->request->getFile('image');
                $slider = $_POST;
                $slider['image'] = $file->getRandomName();
                $slider['uploader'] = $this->session->get('user_id');
                if($this->sliderModel->update($data['id'], $slider)) {
                    $file->move('uploads/sliders', $slider['image']);
                    if ($file->hasMoved()) {
                        $activityLog['user'] = $this->session->get('user_id');
                        $activityLog['description'] = 'Edited an slider';
                        $this->activityLogModel->save($activityLog);
                        $this->session->setFlashData('successMsg', 'Editing slider successful.');
                    } else {
                        $this->session->setFlashData('failMsg', 'There is an error on editing slider. Please try again.');
                    }
                    return redirect()->to(base_url('admin/sliders'));
                } else {
                    $this->session->setFlashData('failMsg', 'There is an error on editing slider. Please try again.');
                }
            } else {
                $data['value'] = $_POST;
                $data['errors'] = $this->validation->getErrors();
            }
        }

        $data['user_details'] = user_details($this->session->get('user_id'));
        $data['active'] = 'sliders';
        $data['title'] = 'Transactions';
        return view('Modules\Transactions\Views\form', $data);
    }

    public function delete($id) {
        // checking roles and permissions
        $data['perm_id'] = check_role('39', 'PAY', $this->session->get('role'));
        if(!$data['perm_id']['perm_access']) {
            $this->session->setFlashdata('sweetalertfail', true);
            return redirect()->to(base_url());
        }
        $data['rolePermission'] = $data['perm_id']['rolePermission'];

        if($this->paymentModel->where('id', $id)->delete()) {
          $activityLog['user'] = $this->session->get('user_id');
          $activityLog['description'] = 'Deleted an payment';
          $this->activityLogModel->save($activityLog);
          $this->session->setFlashData('successMsg', 'Successfully deleted payment');
        } else {
          $this->session->setFlashData('errorMsg', 'Something went wrong!');
        }
        return redirect()->to(base_url('admin/payments'));
    }
}