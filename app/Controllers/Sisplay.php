<?php

namespace App\Controllers;
use App\Models\M_Activity;

class Sisplay extends BaseController
{
	public function index()
	{
        echo view('admin/_partials/partial_header');
		
		$act = new M_Activity();
		$data = [
			'data_act' => $act->findAll()
		];
        
		echo view('frontend/index', $data);
	}
}
