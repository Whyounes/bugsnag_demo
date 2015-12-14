<?php

class UserController extends BaseController {

	public function index(){
		$q = Input::get('term', '');
		$users= User::where('username', 'like', $q . '%')->get([ 'id', 'username as value', 'username as label' ]);
		
		return $users->toArray();
	}//index
	
	//remove this
	public function show(){
		$questions = Question::all();

		return View::make('user.dashboard', [ 'questions' => $questions ]);
	}//show

	public function edit( $id ){
		$user = User::findOrFail( $id );

		return View::make('admin.edit_user', [ 'user' => $user ]);
	}//edit

	public function update(){
		$id = Input::get('uid');
		$user = User::findOrFail( $id );

		//$username = Input::get('username');
		
		$role = Input::get('role');
		$active = Input::get('active', false);
		$active = $active === 'on' ? true : false;

		$rules = [
			'role' => 'required|in:admin,user'
		];
		$data = [ 'role' => $role ];

		if( Input::has('password') ){
			$password = Input::get('password');
			$repassword = Input::get('password_confirmation');

			$rules['password'] = 'required|min:4|confirmed';
			$data['password'] = $password;
			$data['password_confirmation'] = $repassword;
		}//if

		$validate = Validator::make( $data, $rules );

		if( $validate->fails() ){
			return Redirect::route('admin.users.edit', [ 'id' => $user->id ])->with( [ 'messages' => $validate->messages() ] );
		}//if


		if( Input::has('password') )
			$user->password = Hash::make($password);
		
		$user->role = $role;
		$user->active = $active;
		$user->save();

		return Redirect::route('admin.users')->with( [ 'message' => 'User updated successfully' ] );
	}//update

	public function profile(){

		return View::make('user.profile', [ 'user' => Auth::user() ]);
	}//profile

	public function profileUpdate(){
		$user = Auth::user();

		$rules = [ ];
		$data = [ ];

		if( Input::has('password') ){
			$password = Input::get('password');
			$repassword = Input::get('password_confirmation');

			$rules['password'] = 'required|min:4|confirmed';
			$data['password'] = $password;
			$data['password_confirmation'] = $repassword;
		}//if

		$validate = Validator::make( $data, $rules );

		if( $validate->fails() ){
			return Redirect::route('profile', [ 'user' => $user ])->with( [ 'messages' => $validate->messages() ] );
		}//if

		if( Input::has('password') )
			$user->password = Hash::make($password);
		
		$user->save();

		return Redirect::route('profile', [ 'user' => $user ])->with( [ 'message' => 'User updated successfully' ] );
	
	}//profileUpdate

	public function adminIndex(){
		$users = User::all();

		return View::make('admin.users', [ 'users' => $users ]);
	}//adminIndex

	public function create(){
		return View::make('admin.create_user');
	}//create

	public function store(){
		$username = Input::get('username');
		$password = Input::get('password');
		$repassword = Input::get('password_confirmation');
		$role = Input::get('role');
		$active = Input::get('active', false);
		$active = $active === 'on' ? true : false;

		$rules = [
			'username'		=> 'required|min:4|max:14|unique:users',
			'password'		=> 'required|min:4|confirmed',
			'role'			=> 'required|in:admin,user'
		];

		$validate = Validator::make([
				'username' => $username,
				'password' => $password,
				'password_confirmation' => $repassword,
				'role' => $role
			],
			$rules
		);

		if( $validate->fails() ){
			return Redirect::route('admin.users.create')->with( [ 'messages' => $validate->messages(), 'inputs' => Input::all() ] );
		}//if

		$user = new User;
		$user->username = $username;
		$user->password = Hash::make($password);
		$user->role = $role;
		$user->active = $active;
		$user->save();

		return Redirect::route('admin.users')->with( [ 'message' => 'User inserted successfully' ] );
	}//store

	public function activate( $id ){
		$user = User::findOrFail( $id );
		$user->active = 1;
		$user->save();

		return Redirect::route('admin.users')->with( [ 'message' => 'User has been activated successfully.' ] );
	}//Activate

	public function desactivate( $id ){
		$user = User::findOrFail( $id );
		$user->active = 0;
		$user->save();

		return Redirect::route('admin.users')->with( [ 'message' => 'User has been desactivated successfully.' ] );
	}//desactivate

	public function delete( $id ){
		$user = User::findOrFail( $id );
		$user->delete();

		return Redirect::route('admin.users')->with( [ 'message' => 'User deleted successfully.' ] );
	}//delete
}//class
