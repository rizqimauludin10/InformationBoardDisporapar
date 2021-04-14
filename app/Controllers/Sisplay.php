<?php

namespace App\Controllers;
use App\Models\M_Activity;
use App\Models\M_Piket;
use App\Models\M_Pelayanan;

class Sisplay extends BaseController
{
	public function index()
	{
		helper('date');
		helper('text');
        echo view('admin/_partials/partial_header');
		$todayDate = date('Y-m-d');
		
		
		$act = new M_Activity();
		$piket = new M_Piket();
		$plyn = new M_Pelayanan();
		$data = [
			'data_act' => $act->findAll(),
			'data_piket' => $piket->where('date_piket = ' , $todayDate)->findAll(),
			'data_plyn' => $plyn->where('plyn_status = ', '1')->findAll()
		];

		// dd ($data);
        
		echo view('frontend/index', $data);
	}
}
