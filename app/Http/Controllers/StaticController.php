<?php 
namespace App\Http\Controllers;

use Auth;
use View;
use Redirect;


class StaticController extends Controller {

    public function about(){
    	return View::make( 'static.about' );
    }

    public function home( ){
        if( Auth::check( ) ){
            return Redirect::to('home');
        } else {
            return View::make( 'static.home' );
        }
    }

    public function faq( ){
    	return View::make( 'static.faq' );
    }

    public function founding_team( ){
    	return View::make( 'static.founding_team' );
    }

    public function join_our_team( ){
    	return View::make( 'static.join_our_team' );
    }

    public function how_it_works( ){
    	return View::make( 'static.how_it_works' );
    }

    public function privacy_policy( ){
        return View::make( 'static.privacy_policy' );
    }

    public function terms_of_service( ){
        return View::make( 'static.terms_of_service' );
    }

    public function internships( ){
        return View::make( 'static.internships' );
    }
    
}