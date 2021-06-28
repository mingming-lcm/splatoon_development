<?php

namespace App\Http\Controllers;

//use App\Models\EmailTemplate;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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


		$data = $this->squidFishing("https://app.splatoon2.nintendo.net/api/results/19465");


dd($data);



    	return view('record')->with(['data'=>$data]);
    }


	function squidFishing($url){
	    $iksm = "e47a83fab78840bc8c6e211cf2ec9eeda9c7e914";
	    $header = array(
	        "Cookie: iksm_session=" . $iksm,
	        "User-Agent: Mozilla/5.0 (iPhone; CPU iPhone OS 14_4_2 like Mac OS X)  
	                    AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148"
	    );
	    $context = array(
	        "http" => array(
	            "method" => "GET",
	            "header" => implode("\r\n", $header)
	        )
	    );
	    return json_decode(file_get_contents($url, false, stream_context_create($context)));
	}



}