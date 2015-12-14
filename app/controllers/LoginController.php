<?php

class LoginController extends \BaseController {

	public function submit(){
		if( !Input::has('username') || !Input::has('password') )
			return Redirect::route('login')->withInputs( [ 'error' => 'Invalid input values.' ] );
		
		if( Input::has('remember_me') ){
			if( Input::get('remember_me') === 'on' )
				$remember = true;
			else
				$remember = false;
		}//if
		else{
			$remember = false;
		}//else
		
		$username = Input::get('username');
		$password = Input::get('password');
		
		if( Auth::attempt( [ 'username' => $username, 'password' => $password, 'active' => 1 ], $remember ) ){
			return Redirect::route('questions');
		}
		else{
			return Redirect::route('login')->withInputs( [ 'error' => 'Login or password incorrect, please try again.' ] );
		}//else
		
	}//submit

	public function logout(){
		Auth::logout();
		
		return Redirect::route('login');
	}//logout
}//class
