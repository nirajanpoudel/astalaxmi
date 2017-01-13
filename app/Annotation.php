<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Annotation extends Model
{
	protected $fillable = ['receive_money','receive_date','receive_by'];
    public function annotaionable()
    {
        return $this->morphTo();
    }
}
