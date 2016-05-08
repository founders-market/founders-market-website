<?php namespace App\Http\Controllers;

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


class MessagesController extends Controller {

	/**
	 * Show all the friends of a user and unread messages
	 */
	public function index( ){
		$user_id = Auth::user( )->id;

		$friends = $this->get_friends( $user_id );

		$friends_info = array();
		foreach ($friends as $friend_id ) {
			$user = User::find( $friend_id );

			$meta_list = ['tagline', 'profile_picture', 'intention', 'main_skill'];
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
	        $unread_messages = Message::unread( $user_id, $friend_id )->get( );
	        $user->unread_count = count( $unread_messages );
	        $friends_info[] = $user;
		}

		return View::make( 'messages.overview' )->with( 'contacts', $friends_info );
	}

	/**
	 * Get all the messages between two users
	 * @param  integer $user_id   
	 * @param  integer $friend_id
	 * @return array   All the messages
	 */
	public function get_messages( $user_id, $friend_id ){
		try {
			// DB::connection()->enableQueryLog();
			$messages = Message::where( function( $query ) use( &$user_id, &$friend_id ){
									$query->where( 'sender', '=', $user_id )
					                      ->where( 'receiver', '=', $friend_id );
								})	
					            ->orWhere( function( $query ) use( &$user_id, &$friend_id ){ 
					            	$query->where( 'sender', '=', $friend_id )
					            		  ->where( 'receiver', '=', $user_id );
					            })
					            ->orderBy( 'created_at', 'desc' )
					            ->get( );
			// dd( DB::getQueryLog( ) );
			return $messages;
		} catch (ModelNotFoundException $e) {
			return array( );
		}
	}

	/**
	 * Get a certain user's friends
	 * @param  integer $user_id 
	 * @return array   IDs of the friends
	 */
	public function get_friends( $user_id ){

		$friends = Friends::where('user_id', '=', $user_id )->get( );

		if( $friends ){
			$friend_ids = [];
			foreach ($friends as $friend) {
				$friend_ids[] = $friend->friend_id;
			}

			return $friend_ids;
		} else {
			return array( );
		}

	}

	/**
	 * Send a message
	 */
	public function store( ){
		$data = Request::only(['message', 'receiver']);

		$data['sender'] = Auth::user( )->id;
		$data['status'] = 'unread';
		Message::create( $data );

		$sender = User::find( $data['sender'] );
		$receiver = User::find( $data['receiver'] );


		try {
			$friend_exists = Friends::where( 'user_id', '=', $data['sender'] )
		                         ->where( 'friend_id', '=', $data['receiver'] )
		                         ->firstOrFail( );

		} catch (ModelNotFoundException $e) {
			// Add a friend when the first message is sent
			$friend_details = [
				'user_id' => $data['sender'],
				'friend_id' => $data['receiver']
			];
			Friends::create( $friend_details );

			// Friends are a two-way relationship
			// Add the friend going the other way as well
			$friend_details = [
				'friend_id' => $data['sender'],
				'user_id' => $data['receiver']
			];
			Friends::create( $friend_details );
		}


		// Set up info for the email
		$info['message'] = $data['message'];
		$info['url'] = URL::route( 'messages/user_id', ['user_id' => $sender->id]);
		$info['sender_name'] = $sender->first_name;

		// Send a notification email to users
		Mail::send( 'emails.new_message', 
			['info' => $info], 
			function($message) use( &$receiver, &$sender ){
			    $message->to( $receiver->email, $receiver->first_name )
			            ->subject( 'You\'ve received a message from '.$sender->first_name ); 
			}
		);

		return Redirect::route( 'messages/user_id', ['user_id' => $receiver->id]);
	}

	/**
	 * Display the message thread between logged in user and a friend
	 * @param  integer $friend_id The other person in the conversation
	 */
	public function show_message_thread( $friend_id ){
		$user_id = Auth::user( )->id;

		$user = User::find( $friend_id );
		$sender_info = User::find( $user_id );

		$meta_list = UsersController::full_meta_list( );
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

            // We also need to get all the meta info for the sender
            try{
                $meta = Meta::where( 'user_id', '=', $sender_info->id )
                          ->where( 'meta_key', '=', $meta_key )
                          ->firstOrFail();
                $sender_info->$meta_key = $meta->meta_value;
            } catch( ModelNotFoundException $e ){
            }
        }

        // Mark all unread messages as read
		Message::unread( $sender_info->id, $user->id )
		         ->update( array( 'status' => 'read' ) );

		$messages = $this->get_messages( $user_id, $friend_id );
		return View::make( 'messages.thread' )->with( [ 'messages' => $messages, 'user_id' => $friend_id, 'friend_info' => $user, 'sender_info' => $sender_info ] );
	}

}