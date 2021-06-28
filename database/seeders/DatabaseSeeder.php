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

		foreach ($maps as $key => $value) {
			DB::table('maps')->insert([
	    		'name' => $value["name"],
	            'image_path' => $value["image"],
	            
	        ]);
		}

    	
        // \App\Models\User::factory(10)->create();
    }
}
