<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Vendor;
use App\Invoice;
use App\Journal;
use App\Setting;
use App\Config;

class InvoiceController extends NewController
{
    private $config;
    public function __construct(Vendor $vendor,Invoice $invoice,Journal $journal,invoice $invoice,Request $request, Setting $setting,Config $config){
        $this->vendor = $vendor;
        $this->invoice = $invoice;
        $this->journal = $journal;
        $this->config = $config;
        parent::__construct($request,$setting);
       
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $invoices = $this->setting->invoices()->get();
        return view('invoices.index',compact('invoices'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function create(){
        $invoice_number = \DB::select('SELECT MAX(id) as id from invoices');
         $vendors = $this->vendor->all();
        return view('invoices.create',compact('vendors','invoice_number'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getId($name){
        return $this->config->getIdByName($name)->first()->meta_value;
    }
     public function store($fiscalId,Request $request){
        // return $request->all();
        $data = $request->all();
        // return $data;
        $invoice_number = \DB::table('invoices')->select(\DB::raw('MAX(id) as id'))->first();
        if(!$invoice_number->id){
            $invoice_number->id = 1;
        }
        $data['invoice_number'] = $invoice_number->id;
        $invoice = $this->setting->invoices()->create($data);
        /*$journal = $this->journal->create([
                'description'=>'being sales',
                'date'=>$request->get('date')
            ]);*/
        $invoice->journalTransactions()->create([
                'description'=>'purchase',
                'debit_amount'=>$request->get('total'),
                'account_id'=>$this->getId('purchase'),
                'date'=>$request->get('date')
            ]);
        $invoice->journalTransactions()->create([
                'description'=>'purchase',
                'credit_amount'=>$request->get('total'),
                'account_id'=>$this->getId('payable'),
                'date'=>$request->get('date')
            ]);
        $invoice->nofications()->create(['action'=>'create']);
        
        return redirect($fiscalId."/invoices");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($fiscal_id,$id)
    {   
        $invoice = $this->invoice->find($id);
        return view('invoices.show',compact('invoice'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($fiscal_id,$id)
    {
        $invoice_number = \DB::select('SELECT MAX(id) as id from bills');
         $vendors = $this->vendor->all();
         $invoice = $this->invoice->find($id);
        return view('invoices.edit',compact('vendors','invoice_number','invoice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $fiscalId,$id)
    {
        $data = $request->all();

        $invoice = $this->invoice->find($id)->update($data);
        /*$journal = $this->journal->create([
                'description'=>'being sales',
                'date'=>$request->get('date')
            ]);*/
        $this->invoice->find($id)->journalTransactions()->delete();
         $this->invoice->find($id)->journalTransactions()->create([
                'description'=>'purchase',
                'debit_amount'=>$request->get('total'),
                'account_id'=>$this->getId('purchase'),
                'date'=>$request->get('date')
            ]);
         $this->invoice->find($id)->journalTransactions()->create([
                'description'=>'purchase',
                'credit_amount'=>$request->get('total'),
                'account_id'=>$this->getId('payable'),
                'date'=>$request->get('date')
            ]);
         $this->invoice->find($id)->nofications()->create(['action'=>'create']);
        
        return redirect($fiscalId."/invoices");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function Payment($settingId,$id){
        
        $invoice = $this->invoice->find($id);
        return view('invoices.partials',compact('invoice'));
    }

    public function PartialPayment($settingId,$id,Request $request){
        // return $request->all();
        $invoice =  $this->invoice->find($id);
        $invoice->annotations()->create($request->all());
        $invoice->journalTransactions()->create([
                'description'=>'',
                'debit_amount'=>$request->get('receive_money'),
                'account_id'=>$this->getId('payable')
            ]);
        $invoice->journalTransactions()->create([
                'description'=>'sales',
                'credit_amount'=>$request->get('receive_money'),
                'account_id'=>$this->getId('cash')
            ]);
        return redirect($settingId.'/invoices');
    }

    public function Detail($settingId,$id){
         $invoice = $this->invoice->find($id);
        return view('invoices.detail',compact('invoice'));
    }
}
