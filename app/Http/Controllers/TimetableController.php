<?php

namespace App\Http\Controllers;

//use App\Models\EmailTemplate;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Map;


class TimetableController extends Controller
{
    public function index(){

    	// dd(Map::getMap());

    	
		//api links https://app.splatoon2.nintendo.net/api/records
		//api links https://app.splatoon2.nintendo.net/api/festivals/active
		//api links https://app.splatoon2.nintendo.net/api/schedules
		//api links https://app.splatoon2.nintendo.net/api/records
		//api links https://app.splatoon2.nintendo.net/api/timeline
		//api links https://app.splatoon2.nintendo.net/api/onlineshop/merchandises
		//api links https://app.splatoon2.nintendo.net/api/results


		$data = $this->squidFishing("https://app.splatoon2.nintendo.net/api/schedules");

		$modes_translate = [
			"gachi"=>[
				"name"=>"Rank（單排）",
				"color"=>"orange",
			] ,
			"league" => [
				"name"=>"League（雙/四排）",
				"color"=>"pink",
			] ,
			"regular" => [
				"name"=>"Normal（油地）",
				"color"=>"green",
			] ,
		];

		$rank_modes_translate = [
			"splat_zones"=>[
				"name"=>"ガチエリア（搶地）",
				"color"=>"red",
			] ,
			"tower_control" => [
				"name"=>"ガチヤグラ（搶塔）",
				"color"=>"lightblue",
			] ,
			"rainmaker" => [
				"name"=>"ガチホコバトル（搶魚）",
				"color"=>"yellow",
			] ,
			"clam_blitz" => [
				"name"=>"ガチアサリ（搶蜆）",
				"color"=>"Salmon",
			] ,
			"turf_war" => [
				"name"=>"ナワバリバトル（油地）",
				"color"=>"green",
			] ,
		];


		$instant_maps = Map::getAllMaps();
		$maps = [];

		foreach ($instant_maps as $key => $value) {
			$maps[$key]['name'] = $value->name;
			$maps[$key]['image'] = $value->image_path;
		}


    	return view('timetable')->with(['data'=>$data,'modes_translate'=>$modes_translate,'rank_modes_translate'=>$rank_modes_translate,'maps'=>$maps]);
    }


	function squidFishing($url){
	    $iksm = "1ebf39b6f941f0f9504fa1853e991c08451e46e0";
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