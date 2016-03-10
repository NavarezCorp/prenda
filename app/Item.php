<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    public function pawnshop(){
        var_dump($this->hasOne('App\Pawnshop', 'id', 'pawnshop_id'));
    }
}
