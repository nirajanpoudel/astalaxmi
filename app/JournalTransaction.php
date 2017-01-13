<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JournalTransaction extends Model
{
	protected $table = 'journal_transctions';
    protected $fillable = ['description','debit_amount','credit_amount','account_id','date'];

    // public $timestamps = false;

    public function scopeRangeDate($q,$range)
    {

        if(isset($range['from']) && isset($range['to']))
        return $q->whereBetween('date', [$range['from'], $range['to']]);
    }
    public function scopeLatest($q)
    {
        return $q->orderBy('date','asc');
    }

    public function journal(){
    	return $this->belongsTo(Journal::class);
    }
    public function journalable()
    {
        return $this->morphTo();
    }
}
