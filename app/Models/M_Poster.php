<?php 

namespace App\Models;

use CodeIgniter\Model;

class M_Poster extends Model{
    protected $table      = 'poster';
    protected $primaryKey = 'id_poster';

    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'poster_name',
        'poster_date',
        'poster_image'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

}

?>