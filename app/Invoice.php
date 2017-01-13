<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $morphClass = 'invoice';
    protected $fillable = ['invoice_number','invoice_data','status','date','total','vendor_id','tax'];
    protected $casts = [
 		'invoice_data'=>'array'
 	];
 	public function vendor(){
    	return $this->belongsTo(Vendor::class);
    }
 	public function annotations()
    {
        return $this->morphMany(Annotation::class, 'annotaionable');
    }
    public function journalTransactions()
    {
        return $this->morphMany(JournalTransaction::class, 'journalable');
    }
    public function nofications(){
        return $this->morphMany(Notification::class, 'notificationable');
    }

}
