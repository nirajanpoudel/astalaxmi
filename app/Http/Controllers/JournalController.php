<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\JournalRequest;
use App\Http\Requests;
use App\Http\Controllers\NewController;
use App\Account;
use App\Journal;
use App\Setting;
class JournalController extends NewController
{
    public function __construct(Request $request,Setting $setting,Journal $journal,Account $account)
    {
        $this->account = $account;
        $this->journal = $journal;
        parent::__construct($request,$setting);
    }
	
    public function index(Request $request){
 $accounts = $this->account->parent()->get();
    	 $journals = $this->setting->journals()->lf($request->get('lf'))->orderBy('date','desc')->get();
    	return view('journal.index',compact('journals','accounts'));
    }
	


    public function create(){
    	$accounts = $this->account->parent()->get();
    	return view('journal.create',compact('accounts','fiscalId'));
        
    }
    public function edit($fiscal_id,$id){
        $accounts = $this->account->parent()->get();
        $journal = $this->journal->find($id);
        return view('journal.edit',compact('accounts','journal'));
        
    }

    public function store(JournalRequest $request){
    	$data = $request->get('transctions');
    	$journal = $this->setting->journals()->create($request->all());
    	// $journal->create();
    	
       
        foreach($data as $t){
            $t['date'] = $request->get('date');
            $journal->journalTransactions()->create($t);
  
        }
    		
        return redirect($this->settingId.'/journal');
    	
    }
    public function status($fiscal_id,$journal_id){
        $msg = 'Verified successfully';
        $status = $this->journal->find($journal_id)->status;
        $this->journal->find($journal_id)->journalTransactions()->update(['status'=>!$status]);
        if($status){
            $msg = 'UnVerified successfully';
        }
        $this->journal->find($journal_id)->update(['status'=>!$status]);
        
        return back()->with('message',$msg);
    }
    public function update($fiscal_id,$id,Request $request){
        $data = $request->get('transctions');
        if(!$request->user()->role){
                return back()->with('message','Please Inform Main User');
        }
        $journal = $this->journal->find($id);
        $journal->update($request->all());
        // return $journal->journalTransactions;
        $journal->journalTransactions()->delete();
        
        foreach($data as $t){
            $t['date'] = $request->get('date');
            $journal->journalTransactions()->create($t);
  
        }
            
         return redirect($this->settingId.'/journal');
    }   
}
