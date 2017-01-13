<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $morphClass = 'bill';
	protected $fillable = ['bill_data','bill_number','client_id','user_id','paid','date','status','total'];
	protected $casts = [
 		'bill_data'=>'json',
        'status'=>'bool'
 	];
    public function getNameAttribute()
    {
        return $this->first_name.$this->last_name;
    }

    public function scopeCustomerId($q,$customer_id){
        if($customer_id)
        return $q->where('client_id',$customer_id);
    }
     public function scopeDate($q,$date){
        if($date)
        return $q->where('date',$date);
    }
    public function scopeBillNumber($q,$billNumber){
        if($billNumber)
        return $q->where('bill_number',$billNumber);
    }
    public function customer(){
    	return $this->belongsTo(Customer::class,'client_id');
    }
    public function annotations()
    {
        return $this->morphMany(Annotation::class, 'annotaionable');
    }

    public function nofications(){
        return $this->morphMany(Notification::class, 'notificationable');
    }

    public function journalTransactions()
    {
        return $this->morphMany(JournalTransaction::class, 'journalable');
    }
}
