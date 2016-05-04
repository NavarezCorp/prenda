<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use App\User;
use Session;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        echo 'registration page...';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        echo 'user id: ' . $id;
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
        $data['pawnshops'] = DB::table('pawnshops')->orderBy('name', 'asc')->lists('name', 'id');
        
        $provinces = DB::table('provinces')->orderBy('name', 'asc')->first();
        $data['cities'] = DB::table('cities')->orderBy('name', 'asc')->lists('name', 'id');
        
        $data['provinces'] = DB::table('provinces')->orderBy('name', 'asc')->lists('name', 'id');
        $data['user'] = DB::table('users')->where('id', $id)->get();
        
        return view('pages.registration.edit')->with(['data'=>$data]);
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
        //var_dump($request); die();
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        
        if($request->password) $data->password = bcrypt($request->password);
        
        $data->complete_address = $request->complete_address;
        $data->pawnshop_id = (int) $request->pawnshop;
        $data->province_id = (int) $request->province;
        $data->city_id = (int) $request->city;
        $data->branch = $request->branch;
        $data->telephone_no = $request->telephone_no;
        $data->mobile_no = $request->mobile_no;
        $data->save();
        
        Session::flash('message', 'User information was successfully updated');
        return redirect('/home');
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
