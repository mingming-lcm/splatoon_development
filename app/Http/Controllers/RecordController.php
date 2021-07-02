<?php

namespace App\Http\Controllers;

//use App\Models\EmailTemplate;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\IksmSession;

class RecordController extends Controller
{
    public function index(){
    	
		//api links https://app.splatoon2.nintendo.net/api/records
		//api links https://app.splatoon2.nintendo.net/api/festivals/active
		//api links https://app.splatoon2.nintendo.net/api/schedules
		//api links https://app.splatoon2.nintendo.net/api/records
		//api links https://app.splatoon2.nintendo.net/api/timeline
		//api links https://app.splatoon2.nintendo.net/api/onlineshop/merchandises
		//api links https://app.splatoon2.nintendo.net/api/results


		// $data = $this->squidFishing("https://app.splatoon2.nintendo.net/api/results/19465");

$helper = IksmSession::squidFishing("https://app.splatoon2.nintendo.net/api/result/");
dd($helper);



    	return view('record')->with(['data'=>$data]);
    }


}