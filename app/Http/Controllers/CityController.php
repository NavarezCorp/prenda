<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\City;
use Session;

class CityController extends Controller
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
        $data = DB::table('cities')->orderBy('id', 'desc')->paginate(15);
        
        return view('pages.city.index', ['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.city.create');
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
        $data = new City();
        $data->name = $request->name;
        $data->description = $request->description;
        $data->save();
        
        Session::flash('message', 'City named "' . $request->name . '" was successfully created');
        return redirect('/city');
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
        $data = City::find($id);
        
        return view('pages.city.show', ['data'=>$data]);
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
        $data = City::find($id);
        
        return view('pages.city.edit', ['data'=>$data]);
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
        $data = City::find($id);
        $data->name = $request->name;
        $data->description = $request->description;
        $data->save();
        
        Session::flash('message', 'City named "' . $request->name . '" was successfully updated');
        return redirect('/city');
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
        $data = City::find($id);
        
        Session::flash('message', 'City name "' . $data->name . '" successfully deleted');
        
        $data->delete();
        
        return redirect('/city');
    }
}
