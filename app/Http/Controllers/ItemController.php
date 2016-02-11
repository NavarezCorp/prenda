<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Item;
use Session;
use Auth;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = DB::table('items')->where(['users_id'=>Auth::user()->id])->orderBy('ticket_no', 'desc')->paginate(15);
        return view('pages.item.index', ['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['categories'] = DB::table('categories')->lists('name', 'id');
        $data['types'] = DB::table('types')->lists('name', 'id');
        $data['auctions'] = DB::table('auctions')->where(['users_id'=>Auth::user()->id])->orderBy('id', 'desc')->lists('schedule', 'id');
        return view('pages.item.create', ['data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'schedule'=>'required',
            'category'=>'required',
            'type'=>'required',
        ]);
        
        $data = new Item();
        $data->auction_schedule_id = $request->schedule;
        $data->users_id = Auth::user()->id;
        $data->ticket_no = $request->ticket_no;
        $data->category_id = $request->category;
        $data->type_id = $request->type;
        $data->price = $request->price;
        $data->description = $request->description;
        $data->save();
        
        Session::flash('message', 'Item with ticket #' . $request->ticket_no . ' was successfully created');
        return redirect('/item');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data = Item::find($id);
        
        return view('pages.item.show', ['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data['item'] = Item::find($id);
        $data['categories'] = DB::table('categories')->lists('name', 'id');
        $data['types'] = DB::table('types')->lists('name', 'id');
        $data['auctions'] = DB::table('auctions')->where(['users_id'=>Auth::user()->id])->orderBy('id', 'desc')->lists('schedule', 'id');
        
        return view('pages.item.edit', ['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = Item::find($id);
        $data->ticket_no = $request->ticket_no;
        $data->category_id = $request->category_id;
        $data->type_id = $request->type_id;
        $data->price = $request->price;
        $data->description = $request->description;
        $data->save();
        
        Session::flash('message', 'Item with ticket #' . $request->ticket_no . ' was successfully updated');
        return redirect('/item');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
