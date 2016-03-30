<?php

namespace App\Http;

use Intervention\Image\ImageManagerStatic as Image;
use Response;
use DB;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class PrendaHelpers {
    public static function process_image($url, $width, $height){
        return (string)Image::make($url)->resize($width, $height)->encode('data-url');
    }
    
    public static function resize_image($url, $width, $height, $new_filename){
        /*
        Image::make($url)->fit($width, $height, function($constraint){
            $constraint->upsize();
        })->save($new_filename);
        */
        
        Image::make($url)->resize($width, null, function($constraint){
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save($new_filename);
    }
    
    public static function get_pawnshop_name($user_id){
        $user = DB::table('users')->where(['id'=>$user_id])->get();
        foreach($user as $value) $pawnshop_id = $value->pawnshop_id;
        
        $pawnshop = DB::table('pawnshops')->where(['id'=>$pawnshop_id])->get();
        foreach($pawnshop as $value) $pawnshop_name = $value->name;
        
        return $pawnshop_name;
    }
}