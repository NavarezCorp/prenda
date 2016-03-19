<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        $data['items'] = DB::table('items')->where(['users_id'=>Auth::user()->id, 'is_sold'=>0])->orderBy('ticket_no', 'desc')->paginate(6);
        $data['provinces'] = DB::table('provinces')->lists('name', 'id');
        $data['pawnshops'] = DB::table('pawnshops')->lists('name', 'id');
        
        return view('home', ['data'=>$data]);
    }
}
