<?php

namespace App\Controllers;

use App\Models\M_Activity;
class B_Activity extends BaseController
{
	public function index()
	{
		

		echo view('admin/_partials/partial_header');
		echo view('admin/_partials/partial_sidebar');
		echo view('admin/_partials/partial_topbar');
		echo view('admin/b_activity/index');
		echo view('admin/_partials/partial_footer');
	}

	public function getData() {
		if($this->request->isAjax()){
			$act = new M_Activity();
				$data = [
					'data_act' => $act->findAll()
				];

				$msg = [
					'data' => view('admin/b_activity/act_data', $data)
				];

				echo json_encode($msg);
		} else {
			exit('Maaf');
		}
	}
}
