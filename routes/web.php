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

            // front pages
Route::group(['namespace'=>'Front','middleware'=>'auth:client'],function () { //,'middleware'=>'auth:client'

    Route::get('/','frontController@home')->name('front.home');
    Route::get('article/{id}','frontController@article');
    Route::post('toggle-favourite','frontController@toggleFavourite')->name('toggle-favourite');
    Route::get('donations','frontController@donations');
    Route::get('donation/{id}','frontController@showDonation');
    Route::post('donation-search','frontController@donationSearch');
    Route::get('articles','frontController@articles');
    Route::get('articles-fav','frontController@articlesFavourite');
    Route::get('contact-us','frontController@contact');
    Route::get('/about','frontController@about');
    Route::post('send-message','frontController@senMessage');
//    Route::get('donation','frontController@donation');
//    Route::post('create-donation','frontController@createDonation');
});

Route::get('show-loginForm','Auth\LoginController@showClientLoginFrom')->name('cLogin');
Route::get('show-sign-up','Auth\RegisterController@showClientRegisterFrom')->name('cRegister');
Route::post('login-system','Auth\LoginController@clientLogin');
Route::post('register-system','Auth\RegisterController@createClient');


Auth::routes();



                    // admin dashboard
    Route::group(['middleware' => ['auth:web','auto_check_permission']], function () {
                        //admin routes
            Route::group(['prefix'=>'admin'],function (){
                Route::get('/', 'HomeController@index')->name('home');
                Route::resource('post','Posts\postController');
                Route::resource('category','Posts\categoryController',['except'=>['show']]);

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

                Route::resource('role','Role\roleController',['except'=>['show']]);
                Route::resource('user','User\userController');



            });

    });




//front routes

