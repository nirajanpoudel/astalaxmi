<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Account;
class AccountController extends Controller
{
	public function __construct(Account $account){
		$this->account = $account;
	}

    public function index(){
    	$accounts = Account::parent()->get();
    	return view('account.index',compact('accounts'));
    }

    public function parents(){
       return Account::parent()->get(); 
    }

    public function create(){
    	$parents = Account::parent()->get(['id','name']);
    	return view('account.create',compact('parents'));
        
    }
    public function store($account_id,Request $request){
    	
    }
    public function edit($fiscal_id,$account_id,Request $request){
        $account = $this->account->find($account_id);
        $parents = Account::parent()->get(['id','name']);
    	return view('account.edit',compact('account','parents'));
    }
    public function update($fiscal_id,$account_id,Request $request){
    	$this->account->find($account_id)->update($request->all());
        return redirect($fiscal_id.'/accounts');
    }

    
    public function childCreate($fiscal_id,$account_id){
    	
    	return view('account.child',compact('account_id'));
    }
    public function childStore($fiscal_id,$account_id,Request $request){
    $this->validate($request,[
        'name'=>'required'
        ]);
    	$this->account->find($account_id)->childs()->create($request->all());
    	return redirect($fiscal_id.'/accounts');
    	
    }
}
