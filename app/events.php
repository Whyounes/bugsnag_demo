<?php 
use Neoos\Foto\Models\Notification;

Event::listen('response.inserted', function( $response ){
	//notify all admins
	$admins = User::where('role', '=', 'admin')->get();
	foreach ($admins as $admin) {
		$notification = new Notification;
		$notification->description = "New response inserted and waiting activation <a href='/admin/questions/" . $response->question->id . "#response_".$response->id . "'>link</a>";
		$notification->user_id = Auth::user()->id;
		$notification->sender_id = 0;
		$notification->new = 1;
		$notification->save();

		$admin->notifications()->save( $notification );
	}//foreach

});

Event::listen('response.activated', function( $response ){

	//notify the user who posted the question
	$notification = new Notification;
	$notification->description = "New response activated <a href='/questions/" . $response->question->id . "#response_".$response->id . "'>link</a>";
	$notification->user_id = $response->question->user_id;
	$notification->sender_id = 0;
	$notification->new = 1;
	$notification->save();
	
	$response->question->user->notifications()->save( $notification );
});



Event::listen('question.inserted', function( $question ){
	$admins = User::where('role', '=', 'admin')->get();
	foreach ($admins as $admin) {
		$notification = new Notification;
		$notification->description = "New question inserted and waiting activation <a href='/admin/questions/" . $question->id . "'>link</a>";
		$notification->user_id = Auth::user()->id;
		$notification->new = 1;
		$notification->save();

		$admin->notifications()->save( $notification );
	}//foreach
});

Event::listen('question.activated', function( $question ){

	//notify the user who posted the question
	$notification = new Notification;
	$notification->description = "Question activated <a href='/questions/" . $question->id . "'>link</a>";
	$notification->user_id = $question->user_id;
	$notification->sender_id = 0;
	$notification->new = 1;
	$notification->save();
	
	$question->user->notifications()->save( $notification );
});