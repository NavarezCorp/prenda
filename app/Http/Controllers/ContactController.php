<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Ivory\GoogleMap\Map;
use Ivory\GoogleMap\Helper\MapHelper;
use Ivory\GoogleMap\Overlays\Marker;
use Ivory\GoogleMap\Services\Geocoding\Geocoder;
use Ivory\GoogleMap\Services\Geocoding\GeocoderProvider;
use Geocoder\HttpAdapter\CurlHttpAdapter;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $map = new Map();
        $mapHelper = new MapHelper();
        $geocoder = new Geocoder();
        
        $geocoder->registerProviders(array(
            new GeocoderProvider(new CurlHttpAdapter()),
        ));
        
        $response = $geocoder->geocode('23 Lapu-lapu Street, Agdao, Davao City, Philippines 8000');
        
        foreach($response->getResults() as $result){
            $marker = new Marker();
            $marker->setPosition($result->getGeometry()->getLocation());
            $map->setCenter($result->getGeometry()->getLocation());
            $map->addMarker($marker);
        }
        
        $map->setStylesheetOptions(array(
            'width'  => '100%',
            'height' => '300px',
        ));
        
        $map->setMapOption('zoom', 15);
        $map->setAsync(true);
        
        $data['map'] = $mapHelper->render($map);
        
        return view('pages.contact.index')->with(['data'=>$data]);
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
