<?php

/*

*/

//Laravel authentication routes
Auth::routes();
Route::get('register/verify/{token}','Auth\RegisterController@verify');

//Social authentication routes
Route::get('login/{provider}', 'Auth\SocialLoginController@redirectToProvider');
Route::get('{provider}/callback', 'Auth\SocialLoginController@handleProviderCallback');


Route::get('/', 'HomeController@index');


Route::get('/{catchall?}', function () {
    return response()->view('home');
})->where('catchall', '(.*)');
