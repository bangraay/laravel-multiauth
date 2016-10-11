<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use Validator;
use App\Http\Controllers\Controller;

use Auth;
use Request;
use Redirect;

class AuthController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }


    public function login()
    {
    	$data = Request::all();
    	
    	$auth = Auth('admin');

    	$credentials = [
	        'email' =>  $data['email'], 
	        'password' =>  $data['password'],
	    ];

    	if ($auth->attempt($credentials)) {
        	return Redirect::to('/admin');
	    }
	 
	    return 'Gagal login.';
    }

    public function logout()
    {
    	Auth::guard('admin')->logout();
    	return Redirect::to('admin/login');
    }
}
