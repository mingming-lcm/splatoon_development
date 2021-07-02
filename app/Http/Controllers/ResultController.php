<?php

namespace App\Http\Controllers;

//use App\Models\EmailTemplate;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Map;
use App\Models\Result;
use App\Models\TeammatesResult;
use App\Models\IksmSession;

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


		$data = IksmSession::squidFishing("https://app.splatoon2.nintendo.net/api/results");

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



// dd($data->results);



    	return view('results.index')->with(['data'=>$data,'modes_translate'=>$modes_translate,'rank_modes_translate'=>$rank_modes_translate,'maps'=>$maps]);
    }

    function urlsafe_b64encode($val) {
	  $val = base64_encode($val);
	  return str_replace(["/","+","="], ["_","-",""], $val);
	}



    public function detail($battle_number){

// $auth_state = "V4XUmfKmAo-o82SuzghAqcwH9bTROGaLiEzebHFToKCyy0fC";
// // $auth_code_verifier = urlsafe_b64encode(random_bytes(32));
// $auth_code_verifier = "8-TY8Gg-FOppmFvNb_r0svaTNd2cEJWZi6EAlRkM9oM";
// $auth_cv_hash = hash("sha256", $auth_code_verifier);
// // $auth_code_challenge = urlsafe_b64encode(hex2bin($auth_cv_hash));
// $auth_code_challenge = "8eSbtl2WOvX5-nVbIZacG3m5CIA6ZknEUCNujJQiKIo";

// $base_url = "https://accounts.nintendo.com/connect/1.0.0/authorize?";

// $param = array( 
//     "state" => $auth_state,
//     "redirect_uri" => "npf71b963c1b7b6d119://auth",
//     "client_id" => "71b963c1b7b6d119",
//     "scope" => "openid user user.birthday user.mii user.screenName",
//     "response_type" => "session_token_code",
//     "session_token_code_challenge" => $auth_code_challenge,
//     "session_token_code_challenge_method" => "S256",
//     "theme" => "login_form"
// );
// $auth_url = $base_url . http_build_query($param);
// $response = array(
//     "auth_code_verifier" => $auth_code_verifier,
//     "auth_url" => $auth_url);

// header('content-type: application/json; charset=utf-8');
// echo(json_encode($response, JSON_UNESCAPED_SLASHES));

// // dd();



    	
    	$data = IksmSession::squidFishing("https://app.splatoon2.nintendo.net/api/results/".$battle_number);

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

		$result = Result::getResult($battle_number);
		$teammate_results = TeammatesResult::getTeammatesResult($battle_number);



// dd($result);



    	return view('results.detail')->with(['data'=>$data,'modes_translate'=>$modes_translate,'rank_modes_translate'=>$rank_modes_translate,'maps'=>$maps,'result'=>$result,'teammate_results'=>$teammate_results]);
    }


}