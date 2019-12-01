<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

         /*
        auth cycle api  (notification setting  and profile)
        governorates - cities - setting - contactus - catigeries - blood_type
        posts - post - list faviourate  - toggle_faviorate
        donations - donation - create - include(push notification
        */


    Route::group(["prefix" => "v1" , "namespace" => "Api"] , function() {



            Route::post("register","authController@register");
            Route::post("login","authController@login");
            Route::get("posts","mainController@posts");

                  // authentication
            Route::group(["middleware" => "auth:api"],function(){
            //========================= post api
            Route::post("createPost","mainController@createPost");
            Route::post("favourite","mainController@favourite");
            Route::post("list-favourite","mainController@listFavourite");
            Route::get("profile","authController@profile");

             //========================  settings  api
            Route::get("setting","mainController@setting");
            Route::post("notification-settings","mainController@notificationSettings");
            Route::post("resetPassword","authController@resetPassword");
            Route::post("password","authController@password");
            Route::post("registerToken","authController@registerToken");
            Route::post("removeToken","authController@removeToken");

            //=======================================
            Route::get("governorates","mainController@governorates");
            Route::get("cities","mainController@cities");
            Route::get("categories","mainController@categories");
            Route::get("bloodType","mainController@bloodType");
            Route::post("contacts","mainController@contacts");
            Route::post("donation-Requestcreate","mainController@donationRequestCreate");





    });
});

