<?php

namespace App\Http\Controllers;

//use App\Models\EmailTemplate;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Map;
use App\Models\Result;
use App\Models\Modes;
use App\Models\Rules;
use App\Models\TeammatesResult;

class ResultController extends Controller
{
    public function index(){
		//api links https://app.splatoon2.nintendo.net/api/records
		//api links https://app.splatoon2.nintendo.net/api/festivals/active
		//api links https://app.splatoon2.nintendo.net/api/schedules
		//api links https://app.splatoon2.nintendo.net/api/records
		//api links https://app.splatoon2.nintendo.net/api/timeline
		//api links https://app.splatoon2.nintendo.net/api/onlineshop/merchandises
		//api links https://app.splatoon2.nintendo.net/api/results

		$data = Result::get50Result();
		$instant_maps = Map::getAllMaps();
		$maps = [];

		foreach ($instant_maps as $key => $value) {
			$maps[$key]['name'] = $value->name;
			$maps[$key]['image'] = $value->image_path;
		}

		$modes = Modes::class;
		$rules = Rules::class;

    	return view('results.index')->with(['data'=>$data,'modes'=>$modes,'rules'=>$rules,'maps'=>$maps]);
    }

    public function detail($battle_number){
		$data = Result::getResultByBattleNumber($battle_number);
    	
		$instant_maps = Map::getAllMaps();
		$maps = [];

		foreach ($instant_maps as $key => $value) {
			$maps[$key]['name'] = $value->name;
			$maps[$key]['image'] = $value->image_path;
		}

		$modes = Modes::class;
		$rules = Rules::class;

    	return view('results.detail')->with(['data'=>$data,'modes'=>$modes,'rules'=>$rules,'maps'=>$maps]);
    }


}