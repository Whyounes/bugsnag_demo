<?php
use \Neoos\Foto\Models\Question;
use \Neoos\Foto\Models\Response;

class PagesController extends BaseController {

	public function login(){
		return View::make('login');
	}//login

	public function dashboard(){
		$count_users = User::all()->count();
		$count_questions = Question::all()->count();
		$count_responses = Response::all()->count();
		$count_unanswered_questions = Question::where('active', '=', '1')->whereNotIn('id', Response::distinct()->get(['question_id'])->toArray() )->count();

		return View::make('dashboard', [ 'count_users' => $count_users, 'count_questions'  => $count_questions, 'count_responses'  => $count_responses, 'count_unanswered_questions'  => $count_unanswered_questions]);
	}//dashboard

}//class