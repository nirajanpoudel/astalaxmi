<?php
namespace App\Accounts;

use App\Account;
use App\JournalTransaction;

class Report {
	public $journalTransaction;
	public function __construct(JournalTransaction $journalTransaction,Account $account){
		$this->journalTransaction = $journalTransaction;
		$this->account = $account;
	}

	public function balanceCash($from){
		$balance= 0;
		if(!$from){
			return $balance;
		}
		$account = $this->account->find(12);
		$journalTransctions = $account
                ->journalTransctions()
                ->where('date','<',$from)
                ->get();
        
        foreach($journalTransctions as $transaction):
        	$balance = $balance + $transaction->debit_amount- $transaction->credit_amount;
        endforeach;
        return $balance;
	}

}