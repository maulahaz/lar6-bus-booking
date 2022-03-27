<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
	public function __construct()
    {
    	$this->middleware('auth');
        $this->data['title'] = 'My Laravel Apps';
        // $this->middleware('guest');
    }

    public function index()
    {
    	$this->data['pageTitle'] = 'Dashboard';
        return view('admin.dashboard', $this->data);
    }
}
