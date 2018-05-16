<?php

Route::get('/', 'StaticController@getWelcome');

Route::get('reviews','StaticController@getReviews');

Route::get('services','StaticController@getServices');

Route::get('models','StaticController@getModels');

Route::get('contacts','StaticController@getContacts');

Route::get('sendmodel','SendController@sendModel');

Route::get('sendphoto','SendController@sendPhoto');

Route::get('sendorder','SendController@sendOrder');

Route::post('sendsms','SendController@sendSms');

Route::get('setlocale/{locale}','StaticController@getLocale');

Route::get('test',function(){
	return view('testview');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
