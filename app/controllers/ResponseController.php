<?php
use \Neoos\Foto\Models\Question;
use \Neoos\Foto\Models\Response;

class ResponseController extends BaseController {

	public function store(){
		if( !Input::has('message') || !Input::has('qid') )
			return "Stop playing aroud";

		$response = new Response;

		$message = Input::get('message');
		$qid = Input::get('qid');
		$response->description = $message;
		$response->question_id = $qid;
		$response->user_id = Auth::user()->id;
		$response->active = 0;
		
		$response->save();

		//fire response.inserted event
		Event::fire('response.inserted', [ $response ]);

		return Redirect::route('questions.show', [ 'id' => $qid ])->with( [ 'message' => 'Response added successfully, waiting for admin validation.' ] );
	}//create

	public function delete( $id ){
		$response = Response::findOrFail( $id );
		$response->delete();

		return Redirect::route('admin.questions.show', [ 'id' => $response->question->id ])->with( [ 'message' => 'Response deleted successfully.' ] );
	}//delete

	public function activate( $id ){
		$response = Response::findOrFail( $id );
		$response->active = 1;
		$response->save();

		Event::fire('response.activated', [ $response ]);

		return Redirect::route('admin.questions.show', [ 'id' => $response->question->id ])->with( [ 'message' => 'Response activated successfully.' ] );
	}//activate

	public function desactivate( $id ){
		$response = Response::findOrFail( $id );
		$response->active = 0;
		$response->save();

		return Redirect::route('admin.questions.show', [ 'id' => $response->question->id ])->with( [ 'message' => 'Response desactivated successfully.' ] );
	}//activate
}//class
