<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Test extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function show()
    {
    	echo "Test ok";
    	// $data['title'] = 'My Laravel Apps'; 
    	// echo('I\'m here');
     // 	return view('test.index', $data);
     	// return view('templates.material_dashboard.v_admin', $data);
    }
}