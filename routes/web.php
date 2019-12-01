<?php

use \Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if(Auth::guest())
    return view('auth/login');
    elseif (Auth::check())
        return view('admin');
});



Auth::routes();



    Route::get('/admin', 'HomeController@index')->name('home');



    Route::group(['middleware' => ['auth']], function () {
                        //admin routes
            Route::group(['prefix'=>'admin'],function (){

                Route::resource('post','Posts\postController');
                Route::resource('category','Posts\categoryController');

                Route::resource('governorate','Governorate\governorateController');

                Route::resource('city','City\cityController',['except'=>['show']]);

                Route::group(['prefix'=>'client'],function () {
                    Route::get('/','Client\clientController@index');
                    Route::put('status/{id}','Client\clientController@status');
                    Route::delete('delete/{id}','Client\clientController@destroy');
                    Route::get('search','Client\clientController@filter');

                });
                Route::group(['prefix'=>'contact'],function () {
                    Route::get('/','Contact\contactController@index');
                    Route::delete('delete/{id}','Contact\contactController@destroy');
                    Route::get('search','Contact\contactController@filter');

                });
                Route::group(['prefix'=>'donation'],function () {
                    Route::get('/','Donation\donationController@index');
                    Route::get('search','Donation\donationController@filter');
                    Route::delete('delete/{id}','Donation\donationController@destroy');
                    Route::get('/{id}','Donation\donationController@show');



                });
                Route::get('setting','setting\settingController@index');
                Route::put('setting/{id}','setting\settingController@update');





            });

    });




//front routes

