<?php

namespace App\Controllers;

class Sisplay extends BaseController
{
	public function index()
	{
        echo view('admin/_partials/partial_header');
        echo view('frontend/index');
        
		// echo("Hello World"); 
	}
}
