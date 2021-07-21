<?php
namespace Modules\Discussions\Controllers;

use CodeIgniter\Controller;
use App\Controllers\BaseController;
use Modules\Discussions\Models as Models;
use Modules\Roles\Models as Roles;
// use App\Models\UserModel;
use App\Models as AppModels;

class Discussions extends BaseController
{
    function __construct() {
        $this->session = session();
        $this->threadModel = new Models\ThreadModel();
        $this->roleModel = new Roles\RoleModel();
        $this->userModel = new AppModels\UserModel();
        $this->activityLogModel = new AppModels\ActivityLogModel();
    }
    
	public function index() {
        // checking roles and permissions
        $data['perm_id'] = check_role('', '', $this->session->get('role'));
        $data['rolePermission'] = $data['perm_id']['rolePermission'];

        $data['threads'] = $this->threadModel->viewPerRole(5, $this->session->get('role'));
        $data['allThreads'] = $this->threadModel->viewAll(5);
        $data['roles'] = $this->roleModel->where('id', $this->session->get('role'))->first();
        $data['thread_pager'] = $this->threadModel->pager;
        // echo '<pre>';
        // print_r($data['threads']);
        // die();
        
        $data['user_details'] = user_details($this->session->get('user_id'));
        $data['active'] = 'discussions';
        $data['title'] = 'Discussions';
        return view('Modules\Discussions\Views\index2', $data);
	}
    
    public function add($id) {
        // checking roles and permissions
        $data['perm_id'] = check_role('', '', $this->session->get('role'));
        $data['rolePermission'] = $data['perm_id']['rolePermission'];
        if($this->session->get('role') != $id) {
            if($id != 0) {
                $this->session->setFlashdata('sweetalertfail', true);
                return redirect()->to(base_url());
            }
        }
        
        if($this->request->getMethod() == 'post') {
            $post = $_POST;
            $post['visibility'] = $id;
            $post['creator'] = $this->session->get('user_id');
            $post['status'] = 'a';
            $post['link'] = str_replace(' ', '_', $_POST['subject']);
            $post['link'] = strtolower($post['link']);
            if($this->threadModel->insert($post)) {
                $activityLog['user'] = $this->session->get('user_id');
                $activityLog['description'] = 'Added an discussion thread';
                $this->activityLogModel->save($activityLog);
                $this->session->setFlashdata('successMsg', 'Thread added successfully');
            } else {
                $this->session->setFlashdata('failMsg', 'Failed to add thread');
            }
            return redirect()->to(base_url('discussions'));
        }
        $data['id'] = $id;
        $data['edit'] = false;
        $data['user_details'] = user_details($this->session->get('user_id'));
        $data['active'] = 'discussions';
        $data['title'] = 'Discussions';
        return view('Modules\Discussions\Views\add2', $data);
    }

    public function delete($id) {
        // checking roles and permissions
        // die($id);
        $thread = $this->threadModel->where(['id' => $id])->first();
        echo '<pre>';
        print_r($thread);
        $data['perm_id'] = check_role('35', 'DISC', $this->session->get('role'));
        if($thread['creator'] != $this->session->get('user_id')) {
            if(!$data['perm_id']['perm_access']) {
                $this->session->setFlashdata('sweetalertfail', true);
                return redirect()->to(base_url());
            }
        }
        $data['rolePermission'] = $data['perm_id']['rolePermission'];

        if($this->threadModel->where(['id' => $id])->delete()) {
            $activityLog['user'] = $this->session->get('user_id');
            $activityLog['description'] = 'Deleted an discussion thread';
            $this->activityLogModel->save($activityLog);
          $this->session->setFlashData('successMsg', 'Successfully deleted thread');
        } else {
          $this->session->setFlashData('errorMsg', 'Something went wrong!');
        }
        return redirect()->to(base_url('discussions'));
    }
}