<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
	protected $fillable = ['fiscal_year_start','fiscal_year_end','opening_balance','closing_balance'];
    public function bills(){
    	return $this->hasMany(Bill::class);
    }

    public function journals(){
    	return $this->hasMany(Journal::class);
    }

    public function invoices(){
    	return $this->hasMany(Invoice::class);
    }
}
