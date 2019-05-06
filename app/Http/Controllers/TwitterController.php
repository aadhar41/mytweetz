<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use \Twitter;
use \File;


class TwitterController extends Controller
{
	private $count  = 10;
	private $format = 'array';

    public function TwitterUserTimeline()
    {
    	$data = Twitter::getUserTimeline(['count' => $this->count, 'format' => $this->format]);
    	return view('twitter')->with('data', $data);
    }


    public function tweet(Request $request)
    {

    	$this->validate($request, [
    		'tweet' => 'required'
    	]);

    	$newTweet = ['status' => $request->tweet];
    	$file = $request->file('images');
    
    	// print_r($file); die();

    	if (!empty($request->images)) {
    		foreach ($request->images as $key => $value) {
    			$uploadMedia = Twitter::uploadMedia( ['media' => File::get($value->getRealPath())] );
    			if (!empty($uploadMedia)) {
    				$newTweet['media_ids'][$uploadMedia->media_id_string] = $uploadMedia->media_id_string;
    			}
    		}
    	}

    	$twitter = Twitter::postTweet($newTweet);
    	return back();

    }


}
