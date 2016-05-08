<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Meta extends Model{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users_settings';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['setting_key','setting_value','user_id'];

}
