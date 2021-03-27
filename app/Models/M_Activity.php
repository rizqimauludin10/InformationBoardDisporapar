<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Activity extends Model{

    protected $table      = 'today_activities';
    protected $primaryKey = 'id_act';

    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'user_id',
        'title_act',
        'name_act', 
        'desc_act',
        'date_act',
        'startfrom_act',
        'startuntil_act',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';


}