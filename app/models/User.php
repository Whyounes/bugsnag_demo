<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;
use Illuminate\Auth\EloquentUserProvider;

class User extends \Eloquent implements UserInterface, RemindableInterface {
	
	use UserTrait, RemindableTrait, SoftDeletingTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	protected $fillable = [ 'username', 'password', 'active', 'role' ];

	protected $dates = ['deleted_at'];
	

	public function questions(){
		return $this->hasMany('Neoos\Foto\Models\Question');
	}//questions
	
	public function responses(){
		return $this->hasMany('Neoos\Foto\Models\Response');
	}//responses

	public function notifications(){
		return $this->hasMany('Neoos\Foto\Models\Notification');
	}//notifications
}