<?php 
namespace Modules\Payments\Models;

use CodeIgniter\Model;

class PaymentModel extends Model {
    protected $table = 'payments';
    protected $primaryKey = 'id';
  
    protected $useAutoIncrement = true;
    
    protected $allowedFields = ['name', 'cost', 'deleted_at'];
    protected $useSoftDeletes = true;
  
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}