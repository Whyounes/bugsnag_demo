<?php

Route::get('/login', [ 'before' => 'guest', 'uses' => 'PagesController@login', 'as' => 'login' ]);
Route::get('/logout', [ 'before' => 'auth', 'uses' => 'LoginController@logout', 'as' => 'logout' ]);
Route::post('/login/submit', [ 'uses' => 'LoginController@submit', 'as' => 'login.submit' ]);


//Questions
Route::get('/', [ 'uses' => 'PagesController@dashboard', 'as' => 'dashboard', 'before' => 'auth' ]);

Route::get('/questions', [ 'uses' => 'QuestionController@index', 'as' => 'questions', 'before' => 'auth' ]);
Route::get( '/questions/{id}', [ 'uses' => 'QuestionController@show', 'as' => 'questions.show', 'before' => 'auth' ])->where([ 'id' => '\d']);
Route::get( '/questions/create', [ 'uses' => 'QuestionController@create', 'as' => 'questions.create', 'before' => 'auth' ]);
Route::post( '/questions/store', [ 'uses' => 'QuestionController@store', 'as' => 'questions.store', 'before' => 'auth' ]);

Route::get(	'/admin/questions', [ 'uses' => 'QuestionController@adminIndex', 'as' => 'admin.questions', 'before' => 'auth.admin' ]);//auth must be admin
Route::get( '/admin/questions/{id}', [ 'uses' => 'QuestionController@adminShow', 'as' => 'admin.questions.show', 'before' => 'auth.admin' ])->where([ 'id' => '\d']);//auth must be admin
Route::get(	'/admin/questions/delete/{id}', [ 'uses' => 'QuestionController@delete', 'as' => 'questions.delete', 'before' => 'auth.admin' ]);//auth must be admin
Route::get(	'/admin/questions/activate/{id}', [ 'uses' => 'QuestionController@activate', 'as' => 'questions.activate', 'before' => 'auth.admin' ]);//auth must be admin
Route::get(	'/admin/questions/desactivate/{id}', [ 'uses' => 'QuestionController@desactivate', 'as' => 'questions.desactivate', 'before' => 'auth.admin' ]);//auth must be admin

//Users
//ajax route
Route::get(	'/users', [ 'uses' => 'UserController@index', 'as' => 'users', 'before' => 'auth.admin' ]);//auth must be admin
Route::get(	'/admin/users', [ 'uses' => 'UserController@adminIndex', 'as' => 'admin.users', 'before' => 'auth.admin' ]);//auth must be admin
Route::get(	'/admin/users/create', [ 'uses' => 'UserController@create', 'as' => 'admin.users.create', 'before' => 'auth.admin' ]);//auth must be admin
Route::post( '/admin/users/store', [ 'uses' => 'UserController@store', 'as' => 'admin.users.store', 'before' => 'auth' ]);//auth must be admin
Route::get(	'/admin/users/delete/{id}', [ 'uses' => 'UserController@delete', 'as' => 'admin.users.delete', 'before' => 'auth.admin' ]);//auth must be admin
Route::get(	'/admin/users/show/{id}', [ 'uses' => 'UserController@show', 'as' => 'admin.users.show', 'before' => 'auth.admin' ]);//auth must be admin
Route::get(	'/admin/users/edit/{id}', [ 'uses' => 'UserController@edit', 'as' => 'admin.users.edit', 'before' => 'auth.admin' ]);//auth must be admin
Route::post( '/admin/users/update', [ 'uses' => 'UserController@update', 'as' => 'admin.users.update', 'before' => 'auth.admin' ]);//auth must be admin
Route::get(	'/admin/users/activate/{id}', [ 'uses' => 'UserController@activate', 'as' => 'admin.users.activate', 'before' => 'auth.admin' ]);//auth must be admin
Route::get(	'/admin/users/desactivate/{id}', [ 'uses' => 'UserController@desactivate', 'as' => 'admin.users.desactivate', 'before' => 'auth.admin' ]);//auth must be admin

//Profile
Route::get('/profile', [ 'before' => 'auth', 'uses' => 'UserController@profile', 'as' => 'profile' ]);
Route::post('/profile/update', [ 'before' => 'auth', 'uses' => 'UserController@profileUpdate', 'as' => 'profile.update' ]);

//Responses
Route::post( '/responses', [ 'uses' => 'ResponseController@store', 'as' => 'responses.store', 'before' => 'auth' ]);
Route::get(	'/admin/responses/activate/{id}', [ 'uses' => 'ResponseController@activate', 'as' => 'responses.activate', 'before' => 'auth.admin' ]);//auth must be admin
Route::get(	'/admin/responses/desactivate/{id}', [ 'uses' => 'ResponseController@desactivate', 'as' => 'responses.desactivate', 'before' => 'auth.admin' ]);//auth must be admin
Route::get(	'/admin/responses/delete/{id}', [ 'uses' => 'ResponseController@delete', 'as' => 'responses.delete', 'before' => 'auth.admin' ]);//auth must be admin

//Tags
Route::get('/tags', [ 'uses' => 'TagController@json', 'as' => 'tags' ]);

//Notifications
Route::get( '/notifications', [ 'uses' => 'NotificationController@index', 'as' => 'notifications', 'before' => 'auth' ]);
Route::post( '/notifications/store', [ 'uses' => 'NotificationController@store', 'as' => 'notifications.store', 'before' => 'auth' ]);
Route::get( '/notifications/read/{id}', [ 'uses' => 'NotificationController@markAsRead', 'as' => 'notifications.read', 'before' => 'auth' ])->where([ 'id' => '\d']);;

//Shared data
$shared_views = [ 
	'user.questions',
	'user.question',
	'user.create_question',
	'admin.questions',
	'admin.questions.show',
	'admin.users',
	'admin.create_user',
	'admin.edit_user',
	'user.profile',
	'admin.question',
	'user.notifications',
	'dashboard'
];

View::composer( $shared_views, function( $view ){
	$users = User::where('active', '=', 0)->get();
	$count_users = count($users);

	$questions = \Neoos\Foto\Models\Question::where('active', '=', 0)->get();
	$count_questions = count($questions);

	$responses = \Neoos\Foto\Models\Response::where('active', '=', 0)->get();
	$count_responses = count($responses);

	$notifications = Auth::user()->notifications()->where('new', '=', 1)->get();
	$count_notifications = count($notifications);


	$view->with( [ 
		'inactive_users' => $users, 'count_inactive_users' => $count_users, 
		'inactive_questions' => $questions, 'count_inactive_questions' => $count_questions,
		'inactive_responses' => $responses, 'count_inactive_responses' => $count_responses,
		'inactive_notifications' => $notifications, 'count_inactive_notifications' => $count_notifications 
	]);

});