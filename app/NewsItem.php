<?php namespace App;

use Illuminate\Database\Eloquent\Model;
class NewsItem extends Model{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'news_items';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['title','url','excerpt','author','sponsored','image'];

}
