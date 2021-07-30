<?php

namespace App\Http\Controllers;

//use App\Models\EmailTemplate;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Map;
use App\Models\IksmSession;
use App\Models\Timetable;


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


		$gachi_data = Timetable::getGachiTimetable();
		$league_data = Timetable::getLeagueTimetable();
		$regular_data = Timetable::getRegularTimetable();
		// $data = IksmSession::squidFishing("https://app.splatoon2.nintendo.net/api/schedules");

		$modes_translate = [
			"regular" => [
				"name"=>"Normal（油地）",
				"color"=>"green",
			] ,
			"gachi"=>[
				"name"=>"Rank（單排）",
				"color"=>"orange",
			] ,
			"league" => [
				"name"=>"League（雙/四排）",
				"color"=>"pink",
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

		// $schedules = Schedule::getSchedule();

    	return view('timetable')->with(['gachi_data'=>$gachi_data,'league_data'=>$league_data,'regular_data'=>$regular_data,'modes_translate'=>$modes_translate,'rank_modes_translate'=>$rank_modes_translate,'maps'=>$maps]);
    }

}