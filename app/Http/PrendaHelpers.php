<?php

namespace App\Http;

use Intervention\Image\ImageManagerStatic as Image;
use Response;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class PrendaHelpers {
    public static function process_image($url, $width, $height){
        return (string)Image::make($url)->resize($width, $height)->encode('data-url');
        
        /*
        $img = Image::make($url)->fit($width, $height, function($constraint){
            $constraint->upsize();
        });
        
        return (string)$img->encode('data-url');
        */
    }
}