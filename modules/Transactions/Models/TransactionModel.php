<?php 
namespace Modules\Transactions\Models;

use CodeIgniter\Model;

class TransactionModel extends Model {
    protected $table = 'transactions';
    protected $primaryKey = 'id';
  
    protected $useAutoIncrement = true;
    
    protected $allowedFields = ['user_id', 'photo', 'payment_id', 'amount', 'added_by', 'deleted_at'];
    protected $useSoftDeletes = true;
  
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function viewAll() {
        $this->select('transactions.*, users.first_name, users.last_name, payments.name');
        $this->where('transactions.deleted_at', NULL);
        $this->join('users', 'users.id = transactions.user_id');
        $this->join('payments', 'payments.id = transactions.payment_id');
        return $this->get()->getResultArray();
    }
}