<?php
namespace App\Accounts;

use App\Account;
use App\JournalTransaction;

class Income {
	public $account;
	public function __construct(Account $account){
		$this->account = $account;
	}
	public function makeIncome(){
		$p = 0;
		$accounts = $this->account->income()->get();
		foreach($accounts as $account){
			foreach($account->childs as $child){
				foreach($child->journalTransctions as $transction){
					$p += (int)$transction->debit_amount - (int)$transction->credit_amount;
				}
			}
		}
		return $p;
	}
	
}