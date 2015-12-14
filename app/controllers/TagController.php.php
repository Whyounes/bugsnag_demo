<?php
use \Neoos\Foto\Models\Tag;

class TagController extends \BaseController {

	public function json(){
		$q = Input::get('term', '');
		$tags= Tag::where('name', 'like', $q . '%')->get([ 'id', 'name as value', 'name as label' ]);
		
		return $tags;
	}//json

}//class