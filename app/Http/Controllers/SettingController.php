<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Setting;
use App\Notification;

class SettingController extends Controller
{
    public function create(){
    	return view('settings.create');
    }
    public function store(Request $request){
    	$this->validate($request ,[
    		'fiscal_year_start'=>'required',
    		'fiscal_year_end'=>'required',
    		]);
    	Setting::create($request->all());
    	return redirect('fiscal-year');
    }

    public function visit($fiscal_id,$id){
        Notification::find($id)->delete();
    }
}
