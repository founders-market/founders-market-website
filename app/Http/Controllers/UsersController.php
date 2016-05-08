<?php 
namespace App\Http\Controllers;

use App\User;
use App\Colleges;
use App\Countries;
use App\Meta;
use Auth;
use View;
use Response;
use Redirect;
use Request;
use Validator;
use Hash;
use Image;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller {

    /**
     * Supply a default view for the controller
     * @return Redirect
     */
    public function index( ){
        if( Auth::check() ){
            return Redirect::route('profile/username', [ 'username' => Auth::user()->username ]);
        } else {
            return Redirect::to( '/login' );
        }
    }

    /**
     * Login view
     */
	public function login( ){
        if( Auth::check() ){
            return Redirect::route('home');
        }
		return View::make('login');
	}

    /**
     * User profile for the user logged in
     */
	public function profile( ){
        if(Auth::check()){
          return Response::make('Not Found', 404);
        }

        $user = Auth::user();

		return View::make('users.profile')->with('user', $user);
	}

    /**
     * The registration page
     */
    public function create( ){
        $data = $this->get_hardcoded_options( );
                        
        return View::make('users.create')->with( 'data', $data );
    }

    /**
     * Logs the current user out and redirects them to login
     */
    public function logout( ){
        if(Auth::check()){
          Auth::logout();
        }
        return Redirect::route('login');

    }

    /**
     * Render a profile view for a given username
     * @param  string $username The username of the user being viewed
     */
    public function profile_username( $username ){
        
        // Try to get the user, if it fails, throw a 404 error
        try{
            $user = User::where('username', '=', $username )->firstOrFail();
        } catch( ModelNotFoundException $e ){
            return Response::make('Not Found', 404);
        }

        // Get a list of all the colleges and hardcoded_options
        $user->colleges = $this->colleges_list( );
        $hardcoded_options = $this->get_hardcoded_options( );

        // Insert hardcoded options into the user object
        foreach ($hardcoded_options as $option_key => $option_value) {
            $user->$option_key = $option_value;
        }
        
        // Get a list of all the meta values
        $meta_list = $this->full_meta_list();

        foreach ($meta_list as $meta_key) {
            // For every meta_key
            
            // Try to get its value otherwise ignore it
            try{
                $meta = Meta::where( 'user_id', '=', $user->id )
                          ->where( 'meta_key', '=', $meta_key )
                          ->firstOrFail();
                $user->$meta_key = $meta->meta_value;
            } catch( ModelNotFoundException $e ){
            }
        }

        // If user has skills, separate them into different values based on commas
        if( isset( $user->skills ) ){
            $user->skills = explode(',', str_replace(', ', ',', $user->skills) );
        }

        // Render the view
        return View::make('users.profile')->with('user', $user);
    }

    /**
     * The profile management/editing view
     * @param  string $username Current user's username
     */
    public function edit_profile( $username ){
        // This auth check may be redundant
        // TODO: Investigate when I have more time
        if( Auth::check() ){

            // Try to get the user's data, else throw a 404 error
            try{
                $user = User::where('username', '=', $username )->firstOrFail();
            } catch( ModelNotFoundException $e ){
                return Response::make('Not Found', 404);
            }

            // If the username supplied is not the current user, throw 404
            if( Auth::user()->username != $user->username ){
                return Response::make('Not Found', 404);
            }

            // Get list of colleges and hardcoded options
            $user->colleges = $this->colleges_list( );
            $hardcoded_options = $this->get_hardcoded_options( );

            foreach ($hardcoded_options as $option_key => $option_value) {
                $user->$option_key = $option_value;
            }
            
            // Get a list of all the meta fields for users
            $meta_list = $this->full_meta_list();

            foreach ($meta_list as $meta_key) {
                // Try to get the meta data for a user
                try{
                    $meta = Meta::where( 'user_id', '=', Auth::user()->id )
                              ->where( 'meta_key', '=', $meta_key )
                              ->firstOrFail();
                    $user->$meta_key = $meta->meta_value;
                } catch( ModelNotFoundException $e ){
                }
            }

            return View::make('users.profile_management')->with('user', $user);
        } else {
            // If not logged in, redirect to login
            return Redirect::to( 'login' );
        }
    }

    /**
     * The main user viewing/search page
     * @param  string $college 
     * @param  string $skill   
     * @param  string $country 
     */
    public function search( $college = null, $skill = null, $country = null, $intention = null, $main_skill = null ){

        // FOR PREMIUM FUNCTION
        if( !$this->is_premium( ) ){
            $userMetaCountry = Meta::where('meta_key', '=', 'country')
                                     ->where('user_id', '=', Auth::user()->id)
                                     ->first();

            $country = $userMetaCountry->meta_value;
        }

        $allNull = false;
        // // When someone isn't explicitly searching, we ignore users with no
        // // profile picture so as to make things look prettier
        // $allNull = true;
        // // If the user is searching, include users with no profile picture
        // if( ( $college != null && $college != 'null' )
        //         || ( $country != null && $country != 'null' ) 
        //         || ( $skill != null && $skill != 'null' )
        //         || ( $main_skill != null && $main_skill != 'null' )
        //         || ( $intention != null && $intention != 'null' ) ){
        //     $allNull = false;
        // }

        // Get a list of all the rows that match the criteria
        $meta_ids = Meta::college( $college )
                            ->skill( $skill )
                            ->intention( $intention )
                            ->mainSkill( $main_skill )
                            ->hasProfilePicture( $allNull )
                            ->where( function( $query ) use ( &$country ){
                                $query->country( $country );
                            })
                            ->get();

        // Extract all the user IDs from the returned rows
        $user_ids = [];
        foreach ($meta_ids as $user_id) {
            $user_ids[] = $user_id->user_id;
        }

        $hardcoded_options = $this->get_hardcoded_options( );

        // Get all the users
        $users = User::whereIn('id', $user_ids)->orderBy('id', 'desc')->get();

        // Set a display name for each input and merge in the select options
        $users->colleges['null'] = 'College';
        $users->colleges = array_merge( $users->colleges, $this->colleges_list() );

        $users->countries['null'] = 'Country';
        $users->countries = array_merge( $users->countries, $this->countries_list() );

        $users->skills['null'] = 'Skill';
        $this->skills_list();
        $users->skills = array_merge( $users->skills, $this->skills_list() );

        $users->main_skills['null'] = 'Main Skill';
        $users->main_skills = array_merge( $users->main_skills, $hardcoded_options['main_skills'] );

        $users->intents['null'] = 'Intention';
        $users->intents = array_merge( $users->intents, $hardcoded_options['intents'] );

        // Return info about current options selected
        $users->current_college = $college;
        $users->current_skill = $skill;
        $users->current_country = $country;
        $users->current_intent = $intention;
        $users->current_main_skill = $main_skill;

        // The iterator allows us to do rows of ~4 users sanely with
        // modulus when in the view
        $iterator = 0;
        foreach ($users as $user) {
            $meta_list = ['profile_picture','tagline','country','main_skill','college'];
            // Get the above meta info for all the users
            foreach ($meta_list as $meta_key) {
                
                try{
                    $meta = Meta::where( 'user_id', '=', $user->id )
                              ->where( 'meta_key', '=', $meta_key )
                              ->firstOrFail();
                    $users[$iterator]->$meta_key = $meta->meta_value;
                } catch( ModelNotFoundException $e ){
                }
            }

            $users[$iterator]->iterator = $iterator;
            $iterator++;
        }

        return View::make( 'users.users' )->with( 'users', $users );
    }

    /**
     * Transforms input data from the search form into a proper route URL
     */
    public function search_form_translation( ){
        $data = Request::only([
                        'college',
                        'skill',
                        'country',
                        'main_skill',
                        'intention'
                    ]);

        $data['college'] = $data['college'] != "" ? $data['college'] : 'null';
        $data['skill'] = $data['skill'] != "" ? $data['skill'] : 'null';
        $data['country'] = $data['country'] != "" ? $data['country'] : 'null';
        $data['main_skill'] = $data['main_skill'] != "" ? $data['main_skill'] : 'null';
        $data['intention'] = $data['intention'] != "" ? $data['intention'] : 'null';

        return Redirect::route('search', [ 
                'college' => $data['college'], 
                'skill' => $data['skill'], 
                'country' => $data['country'] ,
                'intention' => $data['intention'],
                'main_skill' => $data['main_skill']
            ] );
    }

    /**
     * A list of all the colleges
     * @return Array List of all colleges in Ireland
     */
    public function colleges_list( ){
        if( Auth::check( ) ){
            $userMetaCountry = Meta::where('meta_key', '=', 'country')
                                         ->where('user_id', '=', Auth::user()->id)
                                         ->first();
            // Only get colleges for user's country
            $colleges = Colleges::where( 'county', 'like', $userMetaCountry->meta_value )
                                  ->orderBy( 'name' )
                                  ->get();
        } else {
            $colleges = Colleges::orderBy( 'name' )->get( );
        }


        $college_array = [];
        foreach ($colleges as $college) {
            $college_array[ $college->name ] = $college->name;
        }

        return $college_array;
    }

    /**
     * Get list of all countries
     * @return Array List of all countries in the world
     */
    public function countries_list( ){
        $countries = Countries::all( );

        $country_array = [];
        foreach ($countries as $country) {
            $country_array[ $country->name ] = $country->name;
        }

        return $country_array;
    }

    /**
     * Returns a list of all the skills in the database
     * WARNING: THIS WILL NOT SCALE. COME UP WITH ALTERNATIVES.
     * @return  Array All the skills in our database
     */
    public function skills_list(){
        // Get every user's skills
        $skills = Meta::where( 'meta_key', '=', 'skills' )->get();

        $skills_array = [];

        foreach ($skills as $row) {
            // Split the skills up into individual entries
            // for the array
            $skills_in_row = explode(',', $row->meta_value);
            foreach ($skills_in_row as $skill) {
                $skills_array[ $skill ] = trim( $skill );
            }
        }

        return $skills_array;
    }

    /**
     * Check if user is a premium user
     * @return boolean Currently false until implemented
     */
    public static function is_premium( ){
        return false;
    }

    /**
     * Creates a new user
     * @return Redirect Redirects to a user's profile if successful
     */
	public function store( ){
		$data = Request::only([
                                'first_name',
                                'last_name',
                                'email',
                                'password', 
                                'password_confirmation',
                                'username',
                                'intention',
                                'main_skill',
                                'country'
                            ]);

        // A list of meta fields we're processing as a key/value pair
        $user_meta_fields = ['intention', 'main_skill', 'country'];

        // Couple user errors caused on phones by erroneous spaces at the end
        $data['username'] = trim( $data['username'] );
        $data['email'] = trim( $data['email'] );
		
		$validator = Validator::make(
            $data,
            [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:5|confirmed',
                'password_confirmation'=> 'required|min:5',
                'username' => 'required|min:4|unique:users|alpha_dash',
                'intention' => 'required',
                'main_skill' => 'required',
                'country' => 'required'
            ]
        );

		if($validator->fails()){
            // If the validator fails, redirect them back to registration
            // form with errors and input
            return Redirect::route('register')->withErrors($validator)->withInput();
        }

        // Hash the password
        $data['password'] = Hash::make($data['password']);

        // Create a user with the provided data
        $newUser = User::create($data);

        if( $newUser ){
            // If creation successful,
            // Put in all the meta data supplied as well
            foreach ($user_meta_fields as $meta_field_key) {
                if( $data[ $meta_field_key ] != ''){
                    $meta_data = Meta::create([
                                        'meta_key' => $meta_field_key, 
                                        'meta_value' => $data[ $meta_field_key ],
                                        'user_id' => $newUser->id
                                ]);
                }
            }

            // Login user
            Auth::login($newUser);
            return Redirect::route('edit_profile', [ 'username' => Auth::user()->username ]);
        }


        return Redirect::route('register')->withInput();
	}

    /**
     * Update user info
     */
    public function update( ){
        $data = Request::only([
                                'first_name',
                                'last_name',
                                'intention',
                                'main_skill',
                                'country',
                                'profile_picture',
                                'tagline',
                                'college',
                                'skills',
                                'past_experience',
                                'looking_for'
                            ]);


        // A list of meta fields we're processing as a key/value pair
        $user_meta_fields = $this->full_meta_list();

        $validator = Validator::make(
            $data,
            [
                'first_name' => 'required',
                'last_name' => 'required',
                'intention' => 'required',
                'main_skill' => 'required',
                'country' => 'required',
                'profile_picture' => 'image',
            ]
        );


        if($validator->fails()){
            // If the validator fails, redirect them back to registration
            // form with errors and input
            return Redirect::route('edit_profile', [ 'username' => Auth::user()->username ])->withErrors($validator)->withInput();
        }

        // Update core information
        $user = User::where('username', '=', Auth::user()->username)->first();
        $user->first_name = $data['first_name'];
        $user->last_name = $data['last_name'];
        $user->past_experience = $data['past_experience'];
        $user->looking_for = $data['looking_for'];
        $user->save();

        // Handle profile picture
        if (Request::hasFile('profile_picture')){
            // Get the file from the request
            $file = Request::file('profile_picture');
            $destination_path = storage_path() .'/uploads/';
            // Create a filename by hashing the user's username. This
            // will mean each user only has one profile picture residing
            // on our filesystem
            $file_name = hash('ripemd160', Auth::user()->username ) .'.'. $file->getClientOriginalExtension();
            // Move the file to our server
            $movement = Request::file('profile_picture')->move($destination_path, $file_name);

            // Perform an image intervention, getting best fit from image
            // and saving it again
            $image = Image::make( storage_path(). '/uploads/'. $file_name);
            $image->fit( 500, 500 );
            $image->save(storage_path(). '/uploads/'. $file_name);

            // Put the profile picture's URL into the user's meta data
            try{
                $meta_data = Meta::where( 'meta_key', '=', 'profile_picture')
                                   ->where('user_id', '=', Auth::user()->id )
                                   ->firstOrFail();

                $string = (string) "/images/". $file_name;
                $meta_data->meta_value = $string;
                $meta_data->save();
            } catch( ModelNotFoundException $e ){

                if( $data[ 'profile_picture' ] != ''){
                     $meta_data = Meta::create([
                                'meta_key' => 'profile_picture', 
                                'meta_value' => '/images/' . $file_name,
                                'user_id' => Auth::user()->id
                        ]);
                }

            }
        }

        // Update the user's meta information
        foreach ($user_meta_fields as $meta_field_key ) {
            if( $meta_field_key != 'profile_picture' ){
                try{
                    $meta_data = Meta::where( 'meta_key', '=', $meta_field_key)->where('user_id', '=', Auth::user()->id )->firstOrFail();

                    $meta_data->meta_value = $data[ $meta_field_key ];

                    $meta_data->save();
                } catch( ModelNotFoundException $e ){
                    // If a meta key doesn't exist, create it
                    if( $data[ $meta_field_key ] != ''){
                         $meta_data = Meta::create([
                                    'meta_key' => $meta_field_key, 
                                    'meta_value' => $data[ $meta_field_key ],
                                    'user_id' => Auth::user()->id
                            ]);
                    }

                }
            }

        }

        $this->compute_user_score( Auth::user( )->id );

        return Redirect::route('edit_profile', 
                            [ 'username' => Auth::user()->username ]
                         )->withInput();

    }

    /**
     * Calculate a user's profile score based on how much of their
     * profile they've filled out
     * @param  integer $user_id
     */
    public static function compute_user_score( $user_id ){
        $user_score = 0;

        // Increase user's score if past experience and what they're looking
        // for is filled out
        $user = User::find( $user_id );
        ( $user->past_experience != '' ) ? $user_score++ : '';
        ( $user->looking_for != '' ) ? $user_score++ : '';

        $user_meta_fields = UsersController::full_meta_list( );

        foreach ($user_meta_fields as $meta_field_key ) {
            try{
                $meta_data = Meta::where( 'meta_key', '=', $meta_field_key)
                                   ->where('user_id', '=', $user_id )
                                   ->firstOrFail();

                if( $meta_data->meta_value != '' ){
                    // Increase their score by 1 for every meta_value they
                    // have filled in
                    $user_score++;
                }
            } catch( ModelNotFoundException $e ){
            }
        }

        $user->user_score = $user_score;
        $user->save( );
    }

    /**
     * Get list of all meta fields for users
     * @return Array User meta fields
     */
    public static function full_meta_list( ){
        return [    'intention', 
                    'main_skill', 
                    'country', 
                    'profile_picture',
                    'tagline',
                    'college',
                    'skills',
                ];
    }

    /**
     * Handle login for a user
     */
	public function handleLogin( ){
		$data = Request::only(['email', 'password']);

		$validator = Validator::make(
            $data,
            [
                'email' => 'required|email|min:8',
                'password' => 'required',
            ]
        );

        if($validator->fails()){
            return Redirect::route('login')->withErrors($validator)->withInput();
        }

        if( Auth::attempt(['email' => $data['email'], 'password' => $data['password']], true) ){

            try{
                $user_details = User::where( 'email', '=', $data['email'] )->firstOrFail();
            } catch( ModelNotFoundException $e ){
                return Redirect::route('login')->withErrors(['msg'=>'That user doesn\'t exist, please register.']);
            }
            return Redirect::route('home');
        } else {
            return Redirect::route('login')->withErrors(['msg'=>'I\'m sorry, that username and password aren\'t correct.' ]);
        }

        return Redirect::route('login')->withInput();
	}

    /**
     * Get all the hardcoded options for user forms
     * @return Array 
     */
    public function get_hardcoded_options( ){
        $intents = [ 
                        'Looking for someone to join me' => 'Looking for someone to join me',
                        'To join someone' => 'To join someone',
                        'I\'m open to joining someone and being joined' => 'I\'m open to joining someone and being joined'
                    ];

        $countries = $this->countries_list( );

        $main_skills = [
                            "Business Developer" => "Business Developer",
                            "Engineer" => "Engineer",
                            "Marketer" => "Marketer",
                            "Product Manager" => "Product Manager",
                            "Programmer" => "Programmer"
                        ];

        $data['intents'] = $intents;
        $data['countries'] = $countries;
        $data['main_skills'] = $main_skills;

        return $data;
    }


}