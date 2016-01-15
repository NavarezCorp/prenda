<?php

//use DB;

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
    Route::get('/', function () {
        $data['items'] = DB::table('items')->orderBy('ticket_no', 'desc')->paginate(15);
        $data['provinces'] = DB::table('provinces')->lists('name', 'id');
        
        return view('welcome', ['data'=>$data]);
    });
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
    
    Route::resource('item', 'ItemController');
    
    Route::resource('city', 'CityController');
    
    Route::resource('province', 'ProvinceController');
    
    Route::resource('category', 'CategoryController');
    
    Route::resource('type', 'TypeController');
    
    Route::resource('pricing', 'PricingController');
});
