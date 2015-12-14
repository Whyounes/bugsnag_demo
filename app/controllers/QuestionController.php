<?php
use \Neoos\Foto\Models\Question;
use \Neoos\Foto\Models\Response;
use \Neoos\Foto\Models\Tag;

class QuestionController extends BaseController {

	public function index(){
		$questions = Question::where('active', 1)->orderby('created_at', 'asc')->get();

		return View::make('user.questions', [ 'questions' => $questions ]);
	}//index

	public function adminIndex(){
		$questions = Question::all();

		return View::make('admin.questions', [ 'questions' => $questions ]);
	}//index

	public function show( $id ){
		$question = Question::findOrFail( $id );
		$responses = $question->responses()->where('active', '=', true)->orderby('created_at', 'asc')->get();

		return View::make('user.question', [ 'question' => $question, 'responses' => $responses ]);
	}//show

	public function adminShow( $id ){
		$question = Question::findOrFail( $id );
		$responses = $question->responses()->orderby('created_at', 'asc')->get();

		return View::make('admin.question', [ 'question' => $question, 'responses' => $responses ]);
	}//show

	public function create(){
		return View::make('user.create_question');
	}//create

	public function store(){
		if( !Input::has('title') || !Input::has('description') ){
			return Redirect::route('question.create')->with( [ 'error' => 'Invalid input, please try again.' ] );
		}//if
		
		//insert tags if not exist and get id
		$tags = explode( ',', Input::get('tags', '') );
		$tags_ids = [];

		foreach ($tags as $tag) {
			$tags_ids[] = Tag::firstOrCreate(array('name' => $tag))->id;	
		}//foreach
		
		$question = new Question;
		$question->title = Input::get('title');
		$question->description = Input::get('description');
		$question->active = 0;
		$question->user_id = Auth::user()->id;
		$question->save();

		$question->tags()->attach( $tags_ids );

		Event::fire('question.inserted', [ $question ]);

		return Redirect::route('questions')->with( [ 'message' => 'Question inserted successfully, waiting for admin validation.' ] );
	}//store

	public function delete( $id ){
		$question = Question::findOrFail( $id );
		$question->responses()->delete();
		$question->delete();

		return Redirect::route('admin.questions')->with( [ 'message' => 'Question deleted successfully.' ] );
	}//delete

	public function activate( $id ){
		$question = Question::findOrFail( $id );
		$question->active = 1;
		$question->save();

		Event::fire('question.activated', [ $question ]);

		return Redirect::route('admin.questions')->with( [ 'message' => 'Question activated successfully.' ] );
	}//activate

	public function desactivate( $id ){
		$question = Question::findOrFail( $id );
		$question->active = 0;
		$question->save();

		return Redirect::route('admin.questions')->with( [ 'message' => 'Question desactivated successfully.' ] );
	}//activate
}//class