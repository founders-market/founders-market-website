<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Auth;

class Meta extends Model{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users_meta';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['meta_key','meta_value','user_id'];

	public function scopeCollege($query, $college){
        if( $college != null && $college != 'null' ){
            return $query->orWhere('meta_value', 'like', '%'.$college.'%')
                         ->where('meta_key', '=', 'college');
        } else {
            return $query;
        }
    }

    public function scopeSkill($query, $skill){
        if( $skill != null && $skill != 'null' ){
            return $query->orWhere('meta_value', 'like', '%'.$skill.'%')
                         ->where('meta_key', '=', 'skills');
        } else {
            return $query;
        }
    }

    public function scopeIntention($query, $intention){
        if( $intention != null && $intention != 'null' ){
            return $query->orWhere('meta_value', 'like', '%'.$intention.'%')
            			 ->where('meta_key', '=', 'intention');
        } else {
            return $query;
        }
    }

    public function scopeMainSkill($query, $main_skill){
        if( $main_skill != null && $main_skill != 'null' ){
            return $query->orWhere('meta_value', 'like', '%'.$main_skill.'%')
                         ->where('meta_key', '=', 'main_skill');
        } else {
            return $query;
        }
    }

    public function scopeCountry($query, $country){
        if( $country != null && $country != 'null' ){

            $users = Meta::where('meta_value', 'like', '%'.$country.'%')
                              ->where('meta_key', '=', 'country')
                              ->get( );

            $user_ids = array( );
            foreach ($users as $user) {
                $user_ids[] = $user->user_id;
            }

            return $query->whereIn('user_id', $user_ids);
        } else {
            return $query;
        }
    }

    public function scopeHasProfilePicture( $query, $allNull ){
        if( $allNull ){
            return $query->where('meta_key', '=', 'profile_picture')
                     ->where('meta_value', '<>', '');
        } else {
            return $query;
        }
    }

}
