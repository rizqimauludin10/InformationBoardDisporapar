<?php 

namespace App\Models;

use CodeIgniter\Model;

class M_Piket extends Model{
    protected $table      = 'piket';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'name_piket',
        'date_piket',
        'shift_piket'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

}

?>