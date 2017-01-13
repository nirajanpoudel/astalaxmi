<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use App\Setting;

class NewController extends Controller
{
    protected $setting;
    protected $settingId;

    public function __construct(Request $request,Setting $setting){
    	// $this->setDefaults();
    	$this->settingId = $request->segment(1);
    	$this->setting = $setting->find($this->settingId);
    }
   
}
