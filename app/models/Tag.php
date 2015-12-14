<?php
namespace Neoos\Foto\Models;

class Tag extends \Eloquent {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'tags';
	protected $fillable = ['name'];

	public function questions(){
		return $this->belongsToMany('Neoos\Foto\Models\Question', 'tags_questions');
	}//tags
}
