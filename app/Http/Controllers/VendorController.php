<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Vendor;
use App\Config;
class VendorController extends Controller
{
    public function __construct(Vendor $vendor,Config $config){
        $this->vendor = $vendor;
        $this->config = $config;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($fiscalId,Request $request)
    {   
        $vendors = $this->vendor->all();
        return view('vendors.index',compact('vendors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($fiscal_id,Request $request)
    {
        $this->vendor->create($request->all());
        return redirect($fiscal_id.'/vendors');
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
       $vendor = $this->vendor->find($id); 
       return view('vendors.edit',compact('vendor'));
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
        $this->vendor->find($id)->update($request->all());
        return redirect($fiscal_id.'/vendors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($fiscal_id,$id)
    {
        //
    }
    public function getId($name){
        return $this->config->getIdByName($name)->first()->meta_value;
    }
    public function Payment($settingId,$id){
        $vendor = $this->vendor->find($id);
        return view('vendors.partials',compact('vendor'));
    }
    public function PartialPayment($settingId,$id,Request $request){
        // return $request->all();
        $vendor =  $this->vendor->find($id);
        $description = 'sales';
        $vendor->annotations()->create($request->all());
        $vendor->journalTransactions()->create([
                'description'=> $description,
                'debit_amount'=>$request->get('receive_money'),
                'account_id'=>$this->getId('payable')
            ]);
        $vendor->journalTransactions()->create([
                'description'=> $description,
                'credit_amount'=>$request->get('receive_money'),
                'account_id'=>$this->getId('cash')
            ]);
        return redirect($settingId.'/invoices');
    }
     public function Detail($settingId,$id){
         $vendor = $this->vendor->find($id);
        return view('vendors.detail',compact('vendor'));
    }

}
