<?php 

namespace App\Models;

use CodeIgniter\Model;

class M_Pelayanan extends Model{
    protected $table      = 'pelayanan';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'plyn_name',
        'plyn_file',
        'plyn_status'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

}

?>