<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;

class ProductController extends Controller
{
	public function __construct(Product $product)
	{
		$this->product = $product;
	}
	public function index()
	{	
		$products = $this->product->all();
		return view('products.index',compact('products'));
	}
    public function create($fiscal_id){
    	return view('products.create');
    }
   public function edit($fiscal_id,$id){
   		$product = $this->product->find($id);
    	return view('products.edit',compact('product'));
    }

    public function store($fiscal_id,Request $request){
    	$this->product->create($request->all());
    	return redirect($fiscal_id.'/products');
    }

    public function update($fiscal_id,$id,Request $request){
    	$this->product->find($id)->update($request->all());
    	return redirect($fiscal_id.'/products');
    }
}
