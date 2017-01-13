<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
	protected $fillable = ['visit','action'];

    public function notificationable()
    {
        return $this->morphTo();
    }

    public $timestamps = false;
}
