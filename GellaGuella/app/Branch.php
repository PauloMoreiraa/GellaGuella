<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model{

    protected $guarded = [];

    protected  $primaryKey = 'id';
    
    public function images(){
        return $this->hasMany('App\Image');
    }

}
