<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'StaticController@home')->before('guest');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

// Login/Register
Route::get('login', array('as' => 'login', 'uses' => 'UsersController@login'))->before('guest');
Route::post('login', array('as' => 'login', 'uses' => 'UsersController@handleLogin'))->before('guest');
Route::get( 'register', ['as' => 'register', 'uses' => 'UsersController@create'] );
Route::post( '/user/store', ['as' => 'user/store', 'uses' => 'UsersController@store'] );
Route::get('/logout', array('as' => 'logout', 'uses' => 'UsersController@logout'));


Route::group(['middleware' => 'auth'], function(){

	// Public Profiles
	Route::match( ['get', 'post'], '/profile', array('as' => 'profile', 'uses' => 'UsersController@profile'));
	Route::match( ['get', 'post'], '/profile/{username}', ['as' => 'profile/username', 'uses'=>'UsersController@profile_username']);

	// User detail editing
	Route::match( ['get'], '/edit/{username}', ['as' => 'edit_profile', 'uses'=>'UsersController@edit_profile']);
	Route::post('/user/update', ['as' => 'user/update', 'uses' => 'UsersController@update']);

	// User search
	Route::match( ['get'], '/search/{college?}/{skill?}/{country?}/{intention?}/{main_skill?}', ['as' => 'search', 'uses'=>'UsersController@search']);
	Route::post('search/post', ['as' => 'search/post', 'uses' => 'UsersController@search_form_translation']);

	// Passwords
	Route::get('password', ['as'=>'password', 'uses'=>'UsersController@search']);

	// All user controls
	Route::resource('user', 'UsersController'); 

	// Default users view
	Route::get('users', ['as' => 'users', 'uses'=>'UsersController@search']);

	// News views
	Route::get('/home', ['as' => 'home', 'uses' => 'NewsItemController@show']);
	Route::get('/news/add', ['as' => 'add_news', 'uses' => 'NewsItemController@add_news']);
	Route::post('/news/create', ['as' => 'news/store', 'uses' => 'NewsItemController@store']);
	Route::get('/news/update/{news_id}', ['as' => 'update_news', 'uses' => 'NewsItemController@update_news']);
	Route::post('/news/update', ['as' => 'news/update', 'uses' => 'NewsItemController@update']);
	Route::post('/news/delete/{news_id}', ['as' => 'news/delete', 'uses' => 'NewsItemController@delete']);

	///////////////
	// Messages //
	///////////////
	Route::get( '/messages', [ 'as' => 'messages', 'uses' => 'MessagesController@index' ] );
	Route::get( '/messages/{user_id}', [ 'as' => 'messages/user_id', 'uses' => 'MessagesController@show_message_thread' ] );
	Route::post( '/messages/send', [ 'as' => 'messages/send', 'uses' => 'MessagesController@store' ] );


	////////////
	// Admin //
	////////////
	Route::get( '/admin', 'AdminController@index' );
	Route::get( '/admin/compute_user_scores', 'AdminController@compute_user_scores' );
});

// Getting files via a public url
Route::get('images/{image}', function($image = null)
{
    $path = storage_path().'/uploads/' . $image;
    if (file_exists($path)) { 
        return Response::download($path);
    }
});
Route::get('images/news-items/{image}', function($image = null)
{
    $path = storage_path().'/uploads/news_items/' . $image;
    if (file_exists($path)) { 
        return Response::download($path);
    }
});


// Static pages
Route::get('about', ['as'=>'about', 'uses'=>'StaticController@about']);
Route::get('faq', ['as'=>'faq', 'uses'=>'StaticController@faq']);
Route::get('founding-team', ['as'=>'founding_team', 'uses'=>'StaticController@founding_team']);
Route::get('how-it-works', ['as'=>'how_it_works', 'uses'=>'StaticController@how_it_works']);
Route::get('privacy-policy', ['as'=>'privacy_policy', 'uses'=>'StaticController@privacy_policy']);
Route::get('terms-of-service', ['as'=>'terms_of_service', 'uses'=>'StaticController@terms_of_service']);
Route::get('internships', ['as'=>'internships', 'uses'=>'StaticController@internships']);


//Redirects to other url
Route::get('enter-idea-competition',function(){
    return redirect()->away("http://app-competition.foundersmarketapp.com/");
});

