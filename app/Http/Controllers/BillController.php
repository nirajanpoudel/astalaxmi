<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BillRequest;

use App\Http\Requests;
use App\Customer;
use App\Bill;
use App\Journal;
use App\Setting;
use App\Config;

class BillController extends NewController
{
    private $config;
	public function __construct(Customer $customer,Bill $bill,Journal $journal,Request $request,Setting $setting,Config $config){
		$this->customer = $customer;
        $this->bill = $bill;
        $this->config = $config;
		$this->journal = $journal;
         parent::__construct($request,$setting);
	}
	public function index(Request $request){
        // $bill_number = $request->get('bill_number');
        $customers = $this->customer->get(['id','first_name']);
		$bills = $this->setting->bills()
                ->billNumber($request->get('bill_number'))
                ->customerId($request->get('customer_id'))
                ->date($request->get('date'))
                ->get();
        
		return view('bills.index',compact('bills','customers'));
	}

    public function create(){
    	$bill_number = \DB::select('SELECT MAX(id) as id from bills');
    	 $customers = $this->customer->all();
    	return view('bills.create',compact('customers','bill_number'));
    }

    public function getId($name){
        return $this->config->getIdByName($name)->first()->meta_value;
    }
    public function store($fiscal_id,BillRequest $request){
        // $request->get('bill_data');

        // return 
    	$bill = $this->setting->bills()->create($request->all());
        $payment_status = $request->get('paid');
        
            $bill->journalTransactions()->create([
                'description'=>'sales',
                'debit_amount'=>$request->total,
                'account_id'=>$this->getId('receiveable')
            ]);
            $bill->journalTransactions()->create([
                'description'=>'sales',
                'credit_amount'=>$request->total,
                'account_id'=>$this->getId('sales')
            ]);
        
        
        $bill->nofications()->create(['action'=>'create']);
        return redirect($this->settingId.'/bills');
    }

    public function edit($settingId,$id)
    {
        $bill_number = \DB::select('SELECT MAX(id) as id from bills');
         $customers = $this->customer->all();
         $bill = $this->bill->find($id);
        return view('bills.edit',compact('customers','bill_number','bill'));
    }
    public function show($settingId,$id){
    	$bill_number = \DB::select('SELECT MAX(id) as id from clients');
    	 $vendors = $this->vendor->all();
         $bill =  $this->bill->find($id);
    	return view('bills.show',compact('customers','bill_number','bill'));
    }

    public function Payment($settingId,$id){
        $bill = $this->bill->find($id);
        return view('bills.partials',compact('bill'));
    }
    public function Detail($settingId,$id){
         $bill = $this->bill->find($id);
        return view('bills.detail',compact('bill'));
    }

    public function PartialPayment($settingId,$id,Request $request){
        $bill =  $this->bill->find($id);
        $bill->annotations()->create($request->all());
        $bill->journalTransactions()->create([
                'description'=>'sales',
                'debit_amount'=>$request->get('receive_money'),
                'account_id'=>$this->getId('cash')
            ]);
        $bill->journalTransactions()->create([
                'description'=>'sales',
                'credit_amount'=>$request->get('receive_money'),
                'account_id'=>$this->getId('receiveable')
            ]);
        return redirect($this->settingId.'/bills');
    }

     public function status($fiscal_id,$bill_id){
        $msg = 'Verified successfully';
        $status = $this->bill->find($bill_id)->status;
        if($status){
            $msg = 'UnVerified successfully';
        }
        $this->bill->find($bill_id)->update(['status'=>!$status]);
        return back()->with('message',$msg);
    }
}
