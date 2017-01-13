<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\JournalTransaction;

class Journal extends Model
{
    protected $fillable = ['description','date','lf','status'];

    public function journalTransctions(){
    	return $this->hasMany(JournalTransaction::class);
    }
    protected $casts = [
        'status'=>'bool'
    ];
    public function scopeLf($q,$lf){
    	if($lf)
    	return $this->where('lf',$lf);
    }
    public function journalTransactions()
    {
        return $this->morphMany(JournalTransaction::class, 'journalable');
    }
}
