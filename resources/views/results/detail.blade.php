@extends('layouts.app')

@section('title', __($modes_translate[$data->mode]['name']. '詳細紀錄'))


@section('content')

<?php
function urlsafe_b64encode($val) {
  $val = base64_encode($val);
  return str_replace(["/","+","="], ["_","-",""], $val);
}
// $auth_state = urlsafe_b64encode(random_bytes(36));
// $auth_state = "L5bjEkl1rgC4ASIK8ut2LRQL84zEpg-MMxZrPMoQMwyW_qnM";
// // $auth_code_verifier = urlsafe_b64encode(random_bytes(32));
// $auth_code_verifier = "Cor2PmOlGq1trB3uqWouVG7QPQHprPTGVhGRbTF-9DU";
// $auth_cv_hash = hash("sha256", $auth_code_verifier);
// // $auth_code_challenge = urlsafe_b64encode(hex2bin($auth_cv_hash));
// $auth_code_challenge = "ZYVT7hgxHpTgmJy4nM9yTbF5tMJPJY2zkJQidXegAdk";

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


// echo "npf71b963c1b7b6d119://auth#session_state=497847fd397d44129c9d77d9fbf1a1edd8bad231dc25e928086263f9cb452a2c&session_token_code=eyJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2FjY291bnRzLm5pbnRlbmRvLmNvbSIsInN1YiI6IjY5MTQ2M2RiMjYyM2JjNTciLCJ0eXAiOiJzZXNzaW9uX3Rva2VuX2NvZGUiLCJzdGM6c2NwIjpbMCw4LDksMTcsMjNdLCJleHAiOjE2MjA1OTA4MzYsInN0YzpjIjoiWllWVDdoZ3hIcFRnbUp5NG5NOXlUYkY1dE1KUEpZMnprSlFpZFhlZ0FkayIsInN0YzptIjoiUzI1NiIsImp0aSI6IjM2MzA3MjI0ODA2IiwiaWF0IjoxNjIwNTkwMjM2LCJhdWQiOiI3MWI5NjNjMWI3YjZkMTE5In0.H9uUeRV5V0JZyCbF2DKNFeCi3XjAKtgYB2D8BV_L5CQ&state=L5bjEkl1rgC4ASIK8ut2LRQL84zEpg-MMxZrPMoQMwyW_qnM";




// $url = "https://accounts.nintendo.com/connect/1.0.0/api/session_token";
//         $session_token_code_verifier = $auth_code_verifier;
//         $parameters = [
//             "client_id":                    "71b963c1b7b6d119",
//             "session_token_code":           session_token_code,
//             "session_token_code_verifier":  session_token_code_verifier,
//         ];
//         $header = [
//             "User-Agent":      f"Salmonia/{version} @tkgling",
//             "Accept":          "application/json",
//             "Content-Type":    "application/x-www-form-urlencoded",
//             "Content-Length":  str(len(urllib.parse.urlencode(parameters))),
//             "Host":            "accounts.nintendo.com",
//         ];

//         $response = array(
//     "auth_code_verifier" => $auth_code_verifier,
//     "auth_url" => $auth_url);
//         echo(json_encode($response["session_token"], JSON_UNESCAPED_SLASHES));

?>




<div class="title">
	<?=$modes_translate[$data->mode]['name'];?> 詳細紀錄 #<?php echo $data->battle_number;?>
</div>
<div class="results_table">
	<div class="results_column">
		

				<?php

				//dd($data->my_team_result->key);

				?>
				

				<div class="row">
					<div class="results_detail_item col-xs-12">
						<div class="results_mode">
							<?=$modes_translate[$data->mode]['name'];?>
						</div>

						<div class="results_result">
							<div class="<?=$data->my_team_result === "victory"?'results_result_victory':'results_result_lose';?>">
								<?php echo $data->my_team_result;?>
							</div>
						</div>

						<div class="results_play_time">
							時間：<?=date("i:s",$data->elapsed_time).($data->elapsed_time<=300?"":" <span class='red'>(Overtime)</span>");?>
						</div>

						<?php if($data->mode === "league"){ ?>
							<div class="league_point" style="color:<?=$rank_modes_translate[$data->rule]['color'];?>">
								<?php 
									if ($data->league_point == null) { 
										echo "未開分";
									}else { 
										echo "聯盟分數：".$data->league_point;
									} 
								?> 
							</div>

						<?php } ?>

					</div>


					<div class="results_detail_item col-xs-12 col-sm-6">
						<div class="results_detail_my_team">
							<?php  if($data->mode == "regular"){ ?>
								<div class="results_result">
									<div class="results_maps_a">
										<!-- <span style="color: red;"><?php echo $data->my_team_percentage;?>%</span>  (我地隊) -->
									</div>
									
								</div>
							<?php }else if($data->mode == "gachi"){ ?>

								<div class="results_detail_other_team_power">
									<!-- 推定戰力：<span style="color: red;"><?=$data->estimate_gachi_power?$data->estimate_gachi_power:$data->estimate_x_power;?></span> -->
								</div>
							<?php }else{ ?>

								<div class="results_result">
									
									<div class="results_maps_a">
										<span style="color: red;"><?php echo $data->my_team_count;?></span> count (我地隊) （推定戰力：<span style="color: red;"><?php echo $data->my_estimate_league_point;?></span>）
									</div>
								</div>
							<?php } ?>
							<?php foreach($data->teammatesResults->where('team', 'my_team') as $key => $teammate) { ?>
								<div class="results_detail_my_team_<?=$key?>">
									</br>遊戲名稱：<span style="color: yellow;"><?php echo $teammate->player_name?></span></br>
									殺數（助攻）：<?php echo $teammate->kill_count+$teammate->assist_count;?>（<?php echo $teammate->assist_count;?>）</br>
									死數：<?php echo $teammate->death_count?></br>
									大技：<?php echo $teammate->special_count?></br>
									油地量：<?php echo $teammate->game_paint_point?>p
								</div>
							<?php } ?>

						
						</div>
					</div>
					<div class="results_detail_item col-xs-12 col-sm-6">
						<div class="results_detail">
							
							<?php  if($data->mode == "regular"){ ?>
								<div class="results_result">
									<div class="results_maps_a">
										<!-- <span style="color: red;"><?php echo $data->other_team_percentage;?>%</span> (對面隊) -->
									</div>
									
								</div>
							<?php }else if($data->mode == "gachi"){ ?>

								<div class="results_detail_other_team_power">
									<!-- 推定戰力：<span style="color: red;"><?=$data->estimate_gachi_power?$data->estimate_gachi_power:$data->estimate_x_power;?></span> -->
								</div>
							<?php }else{ ?>

								<div class="results_result">
									<div class="results_maps_a">
										<span style="color: red;"><?php echo $data->other_team_count;?></span> count (對面隊)（推定戰力：<span style="color: red;"><?php echo $data->other_estimate_league_point;?></span>）
									</div>
								</div>
							<?php } ?>

							<?php foreach($data->teammatesResults->where('team', 'other_team') as $key => $teammate) { ?>
							
							<div class="results_detail_other_team_<?=$key?>">
								</br>遊戲名稱：<span style="color: yellow;"><?php echo $teammate->player_name?></span></br>
								殺數（助攻）：<?php echo $teammate->kill_count+$teammate->assist_count;?>（<?php echo $teammate->assist_count;?>）</br>
								死數：<?php echo $teammate->death_count?></br>
								大技：<?php echo $teammate->special_count?></br>
								油地量：<?php echo $teammate->game_paint_point?>p
							</div>
							<?php } ?>

						</div>
					</div>
					
					<div class="results_detail_item col-xs-12">
						<div class="results_maps_name">
							<?=$maps[$data->map_id]['name']?>
						</div>
						<div class="results_maps_image">
							<img src="{{URL::asset('/images/splatoon2/')}}/<?=$maps[$data->map_id]['image']?>" />

						</div>
					</div>

				</div>

	</div>
</div>

@endsection
