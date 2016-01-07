<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Item;
use Session;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $items = DB::table('items')->orderBy('ticket_no', 'desc')->paginate(15);
        
        return view('pages.item.index', ['items'=>$items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.item.create');
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
        $items = new Item();
        $items->ticket_no = $request->ticket_no;
        $items->category_id = $request->category_id;
        $items->type_id = $request->type_id;
        $items->price = $request->price;
        $items->description = $request->description;
        $items->save();
        
        Session::flash('message', 'Item with ticket #' . $request->ticket_no . ' successfully created');
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
        $item = Item::find($id);
        
        return view('pages.item.show', ['item'=>$item]);
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
        $item = Item::find($id);
        
        return view('pages.item.edit', ['item'=>$item]);
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
        $item = Item::find($id);
        
        $item->ticket_no = $request->ticket_no;
        $item->category_id = $request->category_id;
        $item->type_id = $request->type_id;
        $item->price = $request->price;
        $item->description = $request->description;
        $item->save();
        
        Session::flash('message', 'Item with ticket #' . $request->ticket_no . ' successfully updated');
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
