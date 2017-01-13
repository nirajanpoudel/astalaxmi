<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
 	protected $table = 'clients';

 	protected $fillable = ['first_name','last_name','phone','mobile','email'];
 	
 	public function getNameAttrribute($value){
 		
 	}
 	public function annotations()
    {
        return $this->morphMany(Annotation::class, 'annotaionable');
    }
    public function journalTransactions()
    {
        return $this->morphMany(JournalTransaction::class, 'journalable');
    }

 	public function bills(){
 		return $this->hasMany(Bill::class,'client_id');
 	}
 	
    //
}
