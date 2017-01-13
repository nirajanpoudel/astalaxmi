<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Config;
use App\Http\Requests;
use App\Customer;

class CustomerController extends Controller
{
    public function __construct(Customer $customer,Config $config){
        $this->customer = $customer;
        $this->config = $config;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $customers = $this->customer->all();
        return view('clients.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create',compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($fiscal_id,Request $request)
    {
        $this->customer->create($request->all());
        return redirect($fiscal_id.'/customers');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($fiscal_id,$id)
    {
        $customer = $this->customer->find($id);
        return view('clients.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($fiscal_id,Request $request, $id)
    {
        $this->customer->find($id)->update($request->all());
        return redirect($fiscal_id.'/customers');
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

    public function transactions($fiscal_id,$id){
        $bills =  $this->customer->find($id)->bills;
        return view('clients.transaction',compact('bills'));
    }
public function getId($name){
        return $this->config->getIdByName($name)->first()->meta_value;
    }

    public function PartialPayment($settingId,$id,Request $request){
        // return $request->all();
        $customer =  $this->customer->find($id);
        $customer->annotations()->create($request->all());
        $customer->journalTransactions()->create([
                'description'=>'sales',
                'debit_amount'=>$request->get('receive_money'),
                'account_id'=>$this->getId('cash')
            ]);
        $customer->journalTransactions()->create([
                'description'=>'sales',
                'credit_amount'=>$request->get('receive_money'),
                'account_id'=>$this->getId('receiveable')
            ]);
        return redirect($settingId.'/bills');
    }
    public function Payment($settingId,$id){
        $customer = $this->customer->find($id);
        return view('clients.partials',compact('customer'));
    }
     public function Detail($settingId,$id){
         $customer = $this->customer->find($id);
        return view('clients.detail',compact('customer'));
    }
}
