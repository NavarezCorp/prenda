<?php

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
        $data['items'] = DB::table('items')->orderBy('ticket_no', 'desc')->paginate(6);
        $data['provinces'] = DB::table('provinces')->lists('name', 'id');
        $data['pawnshops'] = DB::table('pawnshops')->lists('name', 'id');

        return view('welcome', ['data'=>$data]);
    });

    Route::resource('contact', 'ContactController');
    Route::resource('pricing', 'PricingController');
    
    Route::get('/view/{id}', function($id){
        $data['items'] = DB::table('items')->where(['id'=>$id])->get();
        
        return view('pages.item.view', ['data'=>$data]);
    });
    
    Route::get('/schedules', function(){
        $data = DB::table('auctions')->orderBy('id', 'desc')->paginate(15);
        
        return view('pages.auction.schedules', ['data'=>$data]);
    });
    
    Route::get('/phpinfo', function(){
        phpinfo();
    });
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    
    Route::resource('home', 'HomeController');
    Route::resource('item', 'ItemController');
    Route::resource('city', 'CityController');
    Route::resource('province', 'ProvinceController');
    Route::resource('category', 'CategoryController');
    Route::resource('type', 'TypeController');
    Route::resource('pawnshop', 'PawnshopController');
    Route::resource('branch', 'BranchController');
    Route::resource('auction', 'AuctionController');
    Route::resource('admin', 'AdminController');
});
