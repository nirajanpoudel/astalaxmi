<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Vendor extends Model
{
    protected $fillable = ['first_name','last_name','phone','mobile','email'];
    public function invoices(){
    	return $this->hasMany(Invoice::class);
    }
    public function annotations()
    {
        return $this->morphMany(Annotation::class, 'annotaionable');
    }
    public function journalTransactions()
    {
        return $this->morphMany(JournalTransaction::class, 'journalable');
    }

}
