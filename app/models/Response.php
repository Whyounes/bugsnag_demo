<?php

namespace Neoos\Foto\Models;

class Response extends \Eloquent{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'responses';

	public function user(){
		return $this->belongsTo('User');
	}

	public function question(){
		return $this->belongsTo('Neoos\Foto\Models\Question');
	}
}
