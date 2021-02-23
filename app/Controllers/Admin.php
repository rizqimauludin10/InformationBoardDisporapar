<?php

namespace App\Controllers;

class Admin extends BaseController
{
	public function index()
	{
		echo view('admin/_partials/partial_header');
		echo view('admin/_partials/partial_sidebar');
		echo view('admin/_partials/partial_topbar');
		echo view('admin/partial_index');
		echo view('admin/_partials/partial_footer');
		// echo("Hello World"); 
	}
}
