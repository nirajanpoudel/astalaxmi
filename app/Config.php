<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $fillable = ['meta_key','meta_value'];

    public function scopeGetIdByName($q,$name){
    	// return $q->where('meta_key',$name);
    	 return $q->where('meta_key',$name);
    }
}
