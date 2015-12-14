<?php
namespace Neoos\Foto\Models;

class Question extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'questions';

	protected $fillable = [ 'title', 'description', 'active' ];

	public function user(){
		return $this->belongsTo('User');
	}

	public function tags(){
		return $this->belongsToMany('Neoos\Foto\Models\Tag', 'tags_questions');
	}//tags
	
	public function responses(){
		return $this->hasMany('Neoos\Foto\Models\Response');
	}//responses
}