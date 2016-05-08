<?php 
namespace App\Http\Controllers;

use Auth;
use View;
use App\User;
use App\NewsItem;
use Response;
use Redirect;
use Request;
use Validator;
use Hash;
use Image;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;


class NewsItemController extends Controller {

    public function store( ){
    	if( !User::is_admin( ) ){
    		return Redirect::to('/');
    	}

    	$data = Request::only([
    						'title',
    						'author',
    						'url',
    						'excerpt',
    						'image',
    						'sponsored'
    			]);


    	$validator = Validator::make(
            $data,
            [
                'title' => 'required',
                'author' => 'required',
                'excerpt' => 'required',
                'url' => 'required|url',
                'image' => 'image',
            ]
        );

        if($validator->fails()){
            // If the validator fails, redirect them back
            return Redirect::route('add_news')->withErrors($validator)->withInput();
        }

        if (Request::hasFile('image')){
            $file = Request::file('image');
            $destination_path = storage_path() .'/uploads/news_items/';
            $file_name = hash('ripemd160', $data['title'] ) .'.'. $file->getClientOriginalExtension();
            $movement = Request::file('image')->move($destination_path, $file_name);

            $image = Image::make( $destination_path . $file_name);
            $image->fit( 500, 500 );
            $image->save( $destination_path . $file_name);

            try{

            	$image_path = (string) "/images/news-items/". $file_name;
               	$data['image'] = $image_path;

            } catch( ModelNotFoundException $e ){
                $data['image'] = '/img/default.jpg';
            }
        }

    	$newItem = NewsItem::create($data);

    	return Redirect::route('add_news');
    }

    public function update( ){
        if( !User::is_admin( ) ){
            return Redirect::to('/');
        }

        $data = Request::only([
                            'title',
                            'author',
                            'url',
                            'excerpt',
                            'image',
                            'sponsored',
                            'news_id'
                ]);


        $validator = Validator::make(
            $data,
            [
                'title' => 'required',
                'author' => 'required',
                'excerpt' => 'required',
                'url' => 'required|url',
                'image' => 'image',
            ]
        );

        $news_id = $data['news_id'];

        if($validator->fails()){
            // If the validator fails, redirect them back
            return Redirect::route('update_news')->withErrors($validator)->withInput();
        }

        $news_item = NewsItem::find( $news_id );
        $news_item->title = $data['title'];
        $news_item->author = $data['author'];
        $news_item->url = $data['url'];
        $news_item->excerpt = $data['excerpt'];
        $news_item->sponsored = $data['sponsored'];

        if (Request::hasFile('image')){
            $file = Request::file('image');
            $destination_path = storage_path() .'/uploads/news_items/';
            $file_name = hash('ripemd160', $data['title'] ) .'.'. $file->getClientOriginalExtension();
            $movement = Request::file('image')->move($destination_path, $file_name);

            $image = Image::make( $destination_path . $file_name);
            $image->fit( 500, 500 );
            $image->save( $destination_path . $file_name);

            try{

                $image_path = (string) "/images/news-items/". $file_name;
                $data['image'] = $image_path;
                $news_item->image = $data['image'];
            } catch( ModelNotFoundException $e ){
            }
        } 

        $news_item->save();

        return Redirect::route('update_news')->withInput();

    }

    public function add_news( ){
        if( !User::is_admin( ) ){
            return Redirect::to('/');
        }

        return View::make( 'news.add_news' );
    }

    public function update_news( $news_id ){
        if( !User::is_admin( ) ){
            return Redirect::to('/');
        }
    

        try {
            $news_item = NewsItem::findOrFail( $news_id );
            return View::make( 'news.update_news' )->with( 'news_item', $news_item );            
        } catch (ModelNotFoundException $e) {
            return Response::make('Not Found', 404);
        }

    }

    public function delete( $news_id ){
        if( !User::is_admin( ) ){
            return Redirect::to('/');
        }

        $news_item = NewsItem::find( $news_id );

        $news_item->delete();

        return Redirect::route('home');
    }


    public function show( ){
        $newsItems = NewsItem::orderBy( 'id', 'desc' )->get();

        $iterator = 0;
        foreach ($newsItems as $item) {
            $newsItems[$iterator]->iterator = $iterator;
            $iterator++;
        }

        return View::make( 'news.newsfeed' )->with('news_items', $newsItems);
        // return Redirect::route('users');
    }

}