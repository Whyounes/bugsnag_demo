<?php
namespace Neoos\Foto\Models;

class Notification extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'notifications';

	protected $fillable = [ 'description', 'user_id', 'sender_id', 'new' ];

	public function user(){
		return $this->belongsTo('User');
	}

	public function sender(){
		return $this->belongsTo('User', 'sender_id', 'id');
	}	
}