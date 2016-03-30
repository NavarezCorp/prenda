<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Province;
use Session;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = DB::table('provinces')->orderBy('id', 'desc')->paginate(15);
        
        return view('pages.province.index', ['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.province.create');
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
        $data = new Province();
        $data->name = $request->name;
        $data->description = $request->description;
        $data->save();
        
        Session::flash('message', 'Province named "' . $request->name . '" was successfully created');
        return redirect('/province');
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
        $data = Province::find($id);
        
        return view('pages.province.show', ['data'=>$data]);
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
        $data = Province::find($id);
        
        return view('pages.province.edit', ['data'=>$data]);
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
        $data = Province::find($id);
        $data->name = $request->name;
        $data->description = $request->description;
        $data->save();
        
        Session::flash('message', 'Province named "' . $request->name . '" was successfully updated');
        return redirect('/province');
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
        $data = Province::find($id);
        
        Session::flash('message', 'Province name "' . $data->name . '" was successfully deleted');
        
        $data->delete();
        
        return redirect('/province');
    }
}
