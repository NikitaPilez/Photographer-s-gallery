<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;
use Session;
use App;
use Cache;
use App\Reviews;
use App\Models;
use App\Services;
use App\Settings;


class StaticController extends Controller
{
    public function getWelcome(Request $request){
        $settings = Settings::find(1);
    	return view('welcome',compact('$settings'));
    }

    public function getContacts(){
        $settings = Settings::find(1);
        return view('mycontacts',compact('settings'));
    }

    public function getModels(){
        $models = Models::where('display','show')->paginate(12);
        $settings = Settings::find(1);
    	return view('mymodels',compact('models','settings'));
    }

    public function getServices(){
        $services = Services::where('display','show')->get();
        $settings = Settings::find(1);
    	return view('myservices',compact('services','settings'));
    }

    public function getReviews(){
        $reviews = Reviews::where('display','show')->paginate(2);
        $settings = Settings::find(1);
    	return view('myreviews',compact('reviews','settings'));
    }

    public function getLocale(Request $request,$locale){
        
    session_start();
    $_SESSION['locale'] = $locale;
    session_write_close();

    return redirect()->back();
    }
}
