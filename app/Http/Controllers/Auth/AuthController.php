<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;

use Auth;
use Request;
use Redirect;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }


    public function login()
    {
    	$data = Request::all();
    	
    	$auth = Auth('web');

    	$credentials = [
	        'email' =>  $data['email'], 
	        'password' =>  $data['password'],
	    ];

    	if ($auth->attempt($credentials)) {
        	return Redirect::to('/');
	    }
	 
	    return 'Gagal login.';
    }

    public function logout()
    {
    	Auth::guard('web')->logout();
    	return Redirect::to('/login');
    }
}
