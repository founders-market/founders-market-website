<?php
namespace App\Http\Controllers;

use Auth;
use View;
use App\Meta;
use App\User;
use App\NewsItem;
use App\Message;
use App\Friends;
use Mail;
use Response;
use Redirect;
use Request;
use Validator;
use Hash;
use Image;
use URL;
use App\Http\Controllers\UsersController;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller {

	public function index( ){
		// $meta_ids = Meta::college( $college )
  //                           ->skill( $skill )
  //                           ->intention( $intention )
  //                           ->mainSkill( $main_skill )
  //                           ->hasProfilePicture( $allNull )
  //                           ->where( function( $query ) use ( &$country ){
  //                               $query->country( $country );
  //                           })
  //                           ->get();

		$country = 'Ireland';
		$intention = '';
		$main_skill = '';
		$skill = '';
		$college = '';

		DB::connection( )->enableQueryLog( );
        $meta_ids = DB::table( 'users' )
        			  ->select( 
        			  		DB::raw( 
        			  			'*, 
        			  			users.id AS id, 
        			  			u1.meta_value AS intention,
        			  			u2.meta_value AS college,
        			  			u3.meta_value AS main_skill,
        			  			u4.meta_value AS country' 
        			  		) 
        			  	)
        			  ->leftJoin( 'users_meta AS u1', function( $join ) use ( &$intention ){
        			  	$join->on( 'users.id', '=', 'u1.user_id' )
        			  		 ->where( 'u1.meta_key', '=', 'intention' );

        			  })
        			  ->leftJoin( 'users_meta AS u2', function( $join )  use ( &$college ){
        			  	$join->on( 'users.id', '=', 'u2.user_id' )
        			  		 ->where( 'u2.meta_key', '=', 'college' );

        			  })
        			  ->leftJoin( 'users_meta AS u3', function( $join )  use ( &$main_skill ){
        			  	$join->on( 'users.id', '=', 'u3.user_id' )
        			  		 ->where( 'u3.meta_key', '=', 'main_skill' );
        			  })
        			  ->leftJoin( 'users_meta AS u4', function( $join )  use ( &$country ){
        			  	$join->on( 'users.id', '=', 'u4.user_id' )
        			  		 ->where( 'u4.meta_key', '=', 'country' );

        			  	if( $country != null && $country != 'null' ){
	        			  		$join->where( 'u4.meta_value', '=', '%'.$country.'%' );
	        			  	}
        			  })
        			  ->where( function( $query ) use ( &$intention, &$college, &$main_skill, &$country ){


	        			  	if( $main_skill != null && $main_skill != 'null' ){
	        			  		$query->where( 'u3.meta_value', '=', '%'.$main_skill.'%' );
	        			  	}

	        			  	if( $college != null && $college != 'null' ){
	        			  		$query->where( 'u2.meta_value', '=', '%'.$college.'%' );
	        			  	}

	        			  	if( $intention != null && $intention != 'null' ){
	        			  		$query->where( 'u1.meta_value', '=', '%'.$intention.'%' );
	        			  	}
        			  } )
        			  ->orderBy( 'user_score' )
        			  ->get( );

        dd( $meta_ids );
        dd( DB::getQueryLog( ) );
		return View::make( 'admin.index' );
	}

	public function compute_user_scores( ){
		$users = User::all( );

		foreach ($users as $user) {
			UsersController::compute_user_score( $user->id );
		}

		return Redirect::route('home');
	}
	

}