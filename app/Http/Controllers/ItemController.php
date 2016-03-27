<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Item;
use App\Image;
use Session;
use Auth;
//use Storage;
use Intervention\Image\ImageManagerStatic as Image_;
use App\Http\PrendaHelpers as ph;
use Illuminate\Support\Facades\File as File;

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
        
        $item_id = $data->id;
        $destinationPath = 'images/' . Auth::user()->id . '/' . $request->ticket_no;
        File::makeDirectory($destinationPath, 0777, TRUE, TRUE);
        
        foreach($request->file('image') as $key => $photo){
            if($photo){
                if($photo->isValid()){
                    // original
                    $filename_original = 'image_' . $key . '_original.jpg';
                    Image_::make($photo->getRealPath())->save($destinationPath . '/' . $filename_original);
                    $data = new Image();
                    $data->items_id = $item_id;
                    $data->url = $destinationPath . '/' . $filename_original;
                    $data->save();
                    
                    // for grid view
                    $filename = $destinationPath . '/' . 'image_' . $key . '_349x200.jpg';
                    ph::resize_image($destinationPath . '/' . $filename_original, 349, 200, $filename);
                    $data = new Image();
                    $data->items_id = $item_id;
                    $data->url = $filename;
                    $data->save();
                    
                    // for view page (big)
                    $filename = $destinationPath . '/' . 'image_' . $key . '_725x483.jpg';
                    ph::resize_image($destinationPath . '/' . $filename_original, 725, 483, $filename);
                    $data = new Image();
                    $data->items_id = $item_id;
                    $data->url = $filename;
                    $data->save();
                    
                    // for view page (thumbnail)
                    $filename = $destinationPath . '/' . 'image_' . $key . '_173x126.jpg';
                    ph::resize_image($destinationPath . '/' . $filename_original, 173, 126, $filename);
                    $data = new Image();
                    $data->items_id = $item_id;
                    $data->url = $filename;
                    $data->save();
                }
                else{
                    Session::flash('message', 'uploaded file is not valid');
                    return redirect('/item');
                }
            }
        }
        
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
        $data['items'] = Item::find($id);
        $data['images'] = DB::table('images')->where('url', 'like', '%173x126%')->get();
        
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
        $this->validate($request, [
            'schedule'=>'required',
            'category'=>'required',
            'type'=>'required',
        ]);
        
        $data = Item::find($id);
        $data->ticket_no = $request->ticket_no;
        $data->category_id = $request->category;
        $data->type_id = $request->type;
        $data->price = $request->price;
        $data->description = $request->description;
        $data->save();
        
        $destinationPath = 'images/' . Auth::user()->id . '/' . $request->ticket_no;
        
        foreach($request->file('image') as $key => $photo){
            if($photo){
                if($photo->isValid()){
                    // original
                    $filename_original = 'image_' . $key . '_original.jpg';
                    Image_::make($photo->getRealPath())->save($destinationPath . '/' . $filename_original);
                    
                    // for grid view
                    $filename = $destinationPath . '/' . 'image_' . $key . '_349x200.jpg';
                    ph::resize_image($destinationPath . '/' . $filename_original, 349, 200, $filename);
                    
                    // for view page (big)
                    $filename = $destinationPath . '/' . 'image_' . $key . '_725x483.jpg';
                    ph::resize_image($destinationPath . '/' . $filename_original, 725, 483, $filename);
                    
                    // for view page (thumbnail)
                    $filename = $destinationPath . '/' . 'image_' . $key . '_173x126.jpg';
                    ph::resize_image($destinationPath . '/' . $filename_original, 173, 126, $filename);
                }
                else{
                    Session::flash('message', 'uploaded file is not valid');
                    return redirect('/item');
                }
            }
        }
        
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
