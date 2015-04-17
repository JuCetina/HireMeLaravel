<?php namespace App\Http\Controllers;

use Input;
use Auth;
use Redirect;

class AuthController extends Controller
{
	public function login()
	{
		$data = Input::only('email', 'password', 'remember');

		$credentials = ['email' => $data['email'], 'password' => $data['password']];
		
		if(Auth::attempt($credentials, $data['remember']))
		{
			return Redirect::back();
		}

		return Redirect::back()->with('login_error', 1);
	}

	public function logout()
	{
		Auth::logout();
		return Redirect::route('home');
	}
}