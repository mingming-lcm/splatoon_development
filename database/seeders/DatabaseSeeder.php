<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	$maps = [
			[
				"id" => "0",
				"name" => "バッテラストリート\n（街道）",
				"image" => "splatoon2_street.png",
			],
			[
				"id" => "1",
				"name" => "フジツボスポーツクラブ\n（攀石場）",
				"image" => "splatoon2_rock_climb.png",
			],
			[
				"id" => "2",
				"name" => "ガンガゼ野外音楽堂\n（音樂堂）",
				"image" => "splatoon2_concert_hall.png",
			],
			[
				"id" => "3",
				"name" => "チョウザメ造船\n（造船廠）",
				"image" => "splatoon2_ship_build.png",
			],
			[
				"id" => "4",
				"name" => "海女美術大学\n（海女）",
				"image" => "splatoon2_university.png",
			],
			[
				"id" => "5",
				"name" => "コンブトラック\n（單車場）",
				"image" => "splatoon2_bicycle.png",
			],
			[
				"id" => "6",
				"name" => "マンタマリア号\n（瑪利亞號）",
				"image" => "splatoon2_ship_maria.png",
			],
			[
				"id" => "7",
				"name" => "ホッケふ頭\n（碼頭）",
				"image" => "splatoon2_pier.png",
			],
			[
				"id" => "8",
				"name" => "タチウオパーキング\n（停車場）",
				"image" => "splatoon2_carpark.png",
			],
			[
				"id" => "9",
				"name" => "エンガワ河川敷\n（河川）",
				"image" => "splatoon2_river.png",
			],
			[
				"id" => "10",
				"name" => "モズク農園\n（農園）",
				"image" => "splatoon2_farm.png",
			],
			[
				"id" => "11",
				"name" => "Ｂバスパーク\n（B-park）",
				"image" => "splatoon2_bpark.png",
			],
			[
				"id" => "12",
				"name" => "デボン海洋博物館\n（博物館）",
				"image" => "splatoon2_museum.png",
			],
			[
				"id" => "13",
				"name" => "ザトウマーケット\n（超級巿場）",
				"image" => "splatoon2_supermarket.png",
			],
			[
				"id" => "14",
				"name" => "ハコフグ倉庫\n（倉庫）",
				"image" => "splatoon2_warehouse.png",
			],
			[
				"id" => "15",
				"name" => "アロワナモール\n（商場）",
				"image" => "splatoon2_mall.png",
			],
			[
				"id" => "16",
				"name" => "モンガラキャンプ場\n（Camp場）",
				"image" => "splatoon2_camp.png",
			],
			[
				"id" => "17",
				"name" => "ショッツル鉱山\n（礦山場）",
				"image" => "splatoon2_mine.png",
			],
			[
				"id" => "18",
				"name" => "アジフライスタジアム\n（籃球場）",
				"image" => "splatoon2_basketball.png",
			],
			[
				"id" => "19",
				"name" => "ホテルニューオートロ\n（酒店場）",
				"image" => "splatoon2_hotel.png",
			],
			[
				"id" => "20",
				"name" => "スメーシーワールド\n（遊樂場）",
				"image" => "splatoon2_playground.png",
			],
			[
				"id" => "21",
				"name" => "アンチョビットゲームズ\n（遊戲機場）",
				"image" => "splatoon2_game_station.png",
			],
			[
				"id" => "22",
				"name" => "ムツゴ楼\n（母湯樓）",
				"image" => "splatoon2_temple.png",
			],

		];

		$modes = [
			[
				"id" => "1",
				"code" => "regular",
				"name"=>"Regular（油地）",
				"color"=>"green",
			],
			[
				"id" => "2",
				"code" => "gachi",
				"name"=>"Rank（真劍）",
				"color"=>"orange",
			],
			[
				"id" => "3",
				"code" => "league",
				"name"=>"League（雙/四排）",
				"color"=>"pink",
			],	
		];

		$rules = [
			[
				"id" => "1",
				"code" => "splat_zones",
				"name"=>"ガチエリア（搶地）",
				"color"=>"red",
			] ,
			[
				"id" => "2",
				"code" => "tower_control",
				"name"=>"ガチヤグラ（搶塔）",
				"color"=>"lightblue",
			] ,
			[
				"id" => "3",
				"code" => "rainmaker",
				"name"=>"ガチホコバトル（搶魚）",
				"color"=>"pink",
			] ,
			[
				"id" => "4",
				"code" => "clam_blitz",
				"name"=>"ガチアサリ（搶蜆）",
				"color"=>"yellow",
			] ,
			[
				"id" => "5",
				"code" => "turf_war",
				"name"=>"ナワバリバトル（油地）",
				"color"=>"green",
			] ,
		];

		foreach ($maps as $key => $value) {
			DB::table('maps')->insert([
	    		'name' => $value["name"],
	            'image_path' => $value["image"],
	            
	        ]);
		}

		foreach ($modes as $key => $value) {
			DB::table('modes')->insert([
	    		'code' => $value["code"],
	    		'name' => $value["name"],
	            'color' => $value["color"],
	            
	        ]);
		}

		foreach ($rules as $key => $value) {
			DB::table('rules')->insert([
	    		'code' => $value["code"],
	    		'name' => $value["name"],
	            'color' => $value["color"],
	            
	        ]);
		}


		$galleries = [
			[
				"id" => "1",
				"title" => "面面（水手服草稿ver.）",
				"description"=>"枝生第一張被畫的圖～",
				"credit"=>"白白",
				"credit_content"=> null,
				"filename"=>"mingming_by_shiro.jpg",
				"likes"=>0,
			] ,
			[
				"id" => "2",
				"title" => "面面（高等身ver.）",
				"description"=>"第一張高等身大圖～",
				"credit"=>"Laser",
				"credit_content"=>"https://twitter.com/LWY69805700",
				"filename"=>"mingming_by_laser.jpg",
				"likes"=>0,
			] ,
			[
				"id" => "3",
				"title" => "面面（爆炸甜點班ver.）",
				"description"=>"被z醬加到甜點上辣～",
				"credit"=>"Z醬",
				"credit_content"=>"https://twitter.com/zx14996630",
				"filename"=>"mingming_by_z.jpg",
				"likes"=>0,
			] ,
			[
				"id" => "4",
				"title" => "面面 & 桃桃",
				"description"=>"第一張畫在一起的圖～",
				"credit"=>"Laser",
				"credit_content"=>"https://twitter.com/LWY69805700",
				"filename"=>"mingming&taltal_by_laser.jpg",
				"likes"=>0,
			] ,
			[
				"id" => "5",
				"title" => "面面（貓貓圍圈圈ver.）",
				"description"=>"第一張Mii畫我的圖～",
				"credit"=>"Mii",
				"credit_content"=>"https://twitter.com/mii28174050",
				"filename"=>"mingming_by_mii.png",
				"likes"=>0,
			] ,
			[
				"id" => "6",
				"title" => "面面（沒穿褲子ver.）",
				"description"=>"褲子只是藏起來而已！",
				"credit"=>"辣啦",
				"credit_content"=>"https://twitter.com/yunxd",
				"filename"=>"mingming_by_lala.png",
				"likes"=>0,
			] ,
		];

		foreach ($galleries as $key => $value) {
			DB::table('galleries')->insert([
	    		'title' => $value["title"],
	    		'description' => $value["description"],
	            'credit' => $value["credit"],
	            'credit_content' => $value["credit_content"],
	            'filename' => $value["filename"],
	            'likes' => $value["likes"],
	        ]);
		}


    }
}
