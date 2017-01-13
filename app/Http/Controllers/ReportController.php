<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Accounts\Income;
use App\Http\Requests;
use App\Account;
use App\JournalTransaction;
use App\Accounts\Report;
class ReportController extends Controller
{
	public function __construct(Account $account){
		$this->account  = $account;
	}
	public function report(){
		return view('report.report');
	}

    public function dashboard($settingId,Request $request){

        $request->session()->put('fiscal_id',$settingId);
        return view('report.dashboard');
    }

    public function cashBook(Request $request,Report $report){
        $range['from'] = $request->get('from');
        $range['to'] = $request->get('to');
        $account = $this->account->find(31);
        $balance = $report->balanceCash($request->get('from'));
        
        $journalTransctions = $account
                ->journalTransctions()
                ->rangeDate($range)
                ->latest()
                ->paginate(25);
        return view('report.cash-book',compact('account','journalTransctions','balance'));
    }

    public function balanceSheet(Income $income){
        $income =  $income->makeIncome();
    	$accounts = $this->account->balance()->get();
    	return view('report.balance',compact('accounts','income'));
    }

    public function createLedger($fiscalId,$accountId){
    	$account = $this->account->find($accountId);
    	$transctions = $account->journalTransctions()
        ->latest()
        ->get();
    	 return view('report.ledger',compact('transctions','account'));
    }

     public function createTrialBalance(Request $request){
       $range['from'] = $request->get('from');
        $range['to'] = $request->get('to');
     	$accounts = $this->account->parent()->get();
	 	$transctions = JournalTransaction::rangeDate($range)->get();
	 	return view('report.trial',compact('transctions','accounts','range'));
    }
    public function createIncome(){
     	$accounts = $this->account->income()->get();
	 	$transctions = JournalTransaction::all();
	 	return view('report.income',compact('transctions','accounts'));
    }
    
}
