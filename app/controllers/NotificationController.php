<?php
use \Neoos\Foto\Models\Notification;

class NotificationController extends BaseController {

	public function index(){
		$notifications = Notification::where('user_id', '=', Auth::user()->id )->orderby('created_at', 'desc')->get();
		$users = User::where('id', '!=', Auth::user()->id )->get();
		
		return View::make('user.notifications', [ 'notifications' => $notifications, 'users' => $users ]); 
	}//index

	public function markAsRead( $id ){
		$notification = Notification::findOrFail( $id );
		$notification->new = 0;
		$notification->save();

		return [ 'success' => true ];
	}//markAsRead

	public function store(){
		$users = explode(',', Input::get('users', '' ));
		$users_ids = User::whereIn( 'username', $users)->get(['id']);
		$description = Input::get('description');

		foreach ($users_ids as $user) {
			$notification = new Notification;
			$notification->description = $description;
			$notification->user_id = $user->id;
			$notification->sender_id = Auth::user()->id;
			$notification->new = 1;
			$notification->save();
		}//foreach
		
		return Redirect::route('notifications')->with('message', 'Notification sent successfully.');
	}//store
}//class