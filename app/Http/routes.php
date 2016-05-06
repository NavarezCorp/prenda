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

Route::group(['middleware' => ['web']], function(){
    //
    Route::get('/search/{filter}', function($filter){
        $data = '';
        $filter_arr = explode(':', $filter);
        
        $data['filter_ps'] = '';
        $data['filter'] = '';
        $result_ = null;
        $data['items'] = null;
        $perPage = 6;
        
        $provinces = DB::table('provinces')->orderBy('name', 'asc')->get();
        $data['pawnshops'] = DB::table('pawnshops')->lists('name', 'id');
        
        foreach($provinces as $value){
            $res = DB::table('cities')->where('description', 'like', '%' . strtolower($value->name) . '%')->get();
            
            if($res){
                foreach($res as $val) $data['provinces'][strtolower($value->name)][] = $val->name;
            }
            else $data['provinces'][strtolower($value->name)][] = '';
        }
        
        switch($filter_arr[0]){
            case 'province':
                $province = DB::table('provinces')->where('id', $filter_arr[1])->first();
                $data['cities'] = DB::table('cities')->where('description', 'like', '%' . strtolower($province->name) . '%')->get();
                echo json_encode($data);
                break;
            
            case 'branches':
                $data['branches'] = DB::table('users')
                    ->select('branch')
                    ->where('branch', '!=', 'null')
                    ->where('branch', '!=', '')
                    ->groupBy('branch')
                    ->orderBy('branch', 'asc')
                    ->get();
                echo json_encode($data);
                break;
            
            case 'p':
                $res = DB::select("
                    select i.* 
                    from 
                        items i,
                        users u,
                        provinces p 
                    where 
                        p.name = '$filter_arr[1]' and 
                        u.province_id = p.id and 
                        i.users_id = u.id and 
                        i.is_sold = 0 
                    order by i.ticket_no desc
                ");
                
                foreach($res as $value) $result_[] = $value;
                
                $data['items'] = new Illuminate\Pagination\LengthAwarePaginator($result_, count($result_), $perPage);
                $data['filter'] = $filter_arr[1];
                
                return view('welcome', ['data'=>$data]);
                
                break;
            
            case 'c':
                $res = DB::select("
                    select i.* 
                    from 
                        items i,
                        users u,
                        cities c 
                    where 
                        c.name = '$filter_arr[1]' and 
                        u.city_id = c.id and 
                        i.users_id = u.id and 
                        i.is_sold = 0 
                    order by i.ticket_no desc
                ");
                
                foreach($res as $value) $result_[] = $value;
                
                $data['items'] = new Illuminate\Pagination\LengthAwarePaginator($result_, count($result_), $perPage);
                $data['filter'] = $filter_arr[1];
                
                return view('welcome', ['data'=>$data]);
                
                break;
                
            case 'ps':
                if($filter_arr[1]){
                    $res = DB::select("
                        select i.* 
                        from 
                            items i,
                            users u 
                        where 
                            u.pawnshop_id = '$filter_arr[1]' and 
                            i.users_id = u.id and 
                            i.is_sold = 0 
                        order by i.ticket_no desc
                    ");

                    foreach($res as $value) $result_[] = $value;

                    $data['items'] = new Illuminate\Pagination\LengthAwarePaginator($result_, count($result_), $perPage);
                    $data['filter_ps'] = $filter_arr[1];
                }
                else{
                    $data['items'] = DB::table('items')->where(['is_sold'=>0])->orderBy('ticket_no', 'desc')->paginate(6);
                    $provinces = DB::table('provinces')->orderBy('name', 'asc')->get();
                    $data['pawnshops'] = DB::table('pawnshops')->lists('name', 'id');

                    foreach($provinces as $value){
                        $res = DB::table('cities')->where('description', 'like', '%' . strtolower($value->name) . '%')->get();

                        if($res) foreach($res as $val) $data['provinces'][strtolower($value->name)][] = $val->name;
                        else $data['provinces'][strtolower($value->name)][] = '';
                    }
                }
                
                return view('welcome', ['data'=>$data]);
                
                break;
                
            case 'ap':
                $data['items'] = DB::table('items')->where(['is_sold'=>0])->orderBy('ticket_no', 'desc')->paginate(6);
                $provinces = DB::table('provinces')->orderBy('name', 'asc')->get();
                $data['pawnshops'] = DB::table('pawnshops')->lists('name', 'id');

                foreach($provinces as $value){
                    $res = DB::table('cities')->where('description', 'like', '%' . strtolower($value->name) . '%')->get();

                    if($res) foreach($res as $val) $data['provinces'][strtolower($value->name)][] = $val->name;
                    else $data['provinces'][strtolower($value->name)][] = '';
                }
                
                return view('welcome', ['data'=>$data]);
                
                break;
        }
    });
    
    Route::get('/update', function(){
        switch($_GET['type']){
            case 'tag':
                $data = App\Item::find($_GET['id']);
                $data->is_sold = 1;
                $data->save();
                break;
        }
        
        echo json_encode($data);
    });
    
    Route::get('/', function(){
        $data['items'] = DB::table('items')->where(['is_sold'=>0])->orderBy('ticket_no', 'desc')->paginate(6);
        $provinces = DB::table('provinces')->orderBy('name', 'asc')->get();
        $data['pawnshops'] = DB::table('pawnshops')->lists('name', 'id');
        
        foreach($provinces as $value){
            $res = DB::table('cities')->where('description', 'like', '%' . strtolower($value->name) . '%')->get();
            
            if($res) foreach($res as $val) $data['provinces'][strtolower($value->name)][] = $val->name;
            else $data['provinces'][strtolower($value->name)][] = '';
        }
        
        return view('welcome', ['data'=>$data]);
    });

    Route::resource('contact', 'ContactController');
    Route::resource('pricing', 'PricingController');
    Route::resource('about', 'AboutController');
    Route::resource('branch', 'BranchController');
    
    Route::get('/view/{id}', function($id){
        $data['items'] = DB::table('items')->where(['id'=>$id])->get();
        $data['images'] = DB::table('images')->where('items_id', $id)->where('url', 'like', '%173x126%')->get();
        
        return view('pages.item.view', ['data'=>$data]);
    });
    
    Route::get('/schedules', function(){
        if(Auth::guest()) $data = DB::table('auctions')->orderBy('id', 'desc')->paginate(15);
        else $data = DB::table('auctions')->where('users_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(15);
        
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
    Route::resource('auction', 'AuctionController');
    Route::resource('admin', 'AdminController');
    Route::resource('registration', 'RegistrationController');
});
