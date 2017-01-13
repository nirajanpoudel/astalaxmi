<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = ['name','parent_id'];

    public function scopeParent($q){
    	return $q->where('parent_id',NULL);
    }

    public function scopeIncome($q){
        return $q->where(['name'=>'Income'])->orWhere(['name'=>'Expense']);
    }
    public function scopeBalance($q){
        return $q->where(['name'=>'Liability'])->orWhere(['name'=>'asset'])
        ->orWhere(['name'=>'Equity']);
    }

    public function childs(){
    	return $this->hasMany(Account::class,'parent_id');
    }

    public function journalTransctions(){
    	return $this->hasMany(JournalTransaction::class);
    }
}
