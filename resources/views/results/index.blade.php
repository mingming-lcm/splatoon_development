@extends('layouts.app')

@section('title', __('Splatoon2 50場紀錄'))

@section('content')

<div class="title">
	Splatoon2 50場紀錄
</div>

<a href="{{ route('update_api') }}" id="instance_update" class="btn">即時更新</a>
<div class="results_table">
	<div class="results_column">
		
			<?php for($i=0;$i < count($data);$i++){ ?>

				<a class="row result_box" href="{{ route('result.detail',['battle_number' => $data[$i]->battle_number]) }}">
					<div class="results_item col-xs-12 col-sm-6">
						<div class="results_mode">
							{{ $modes::getModeByCode($data[$i]->mode)->name }}
							<span style="color:{{ $rules::getRuleByCode($data[$i]->rule)->color }}">
							{{ $rules::getRuleByCode($data[$i]->rule)->name }}
							</span>
						</div>

						<div class="results_result">
							<div class="<?=$data[$i]->my_team_result === "victory"?'results_result_victory':'results_result_lose';?>">
								<?php echo $data[$i]->my_team_result;?>
							</div>
						</div>

						<?php if($data[$i]->mode === "league"){ ?>
							<div class="league_point" style="color:lightgreen;">
								<?php 
									if ($data[$i]->league_point == null) { 
										echo "未開分";
									}else { 
										echo "聯盟分數：".$data[$i]->league_point;
									} 
								?> 
							</div>

						<?php } ?>

						<?php  if($data[$i]->mode == "regular"){ ?>
							<div class="results_result">
								<div class="results_maps_a">
									<span style="color: red;"><?php echo $data[$i]->my_team_percentage;?>%</span>  (我們)
								 vs
									<span style="color: red;"><?php echo $data[$i]->other_team_percentage;?>%</span> (對面)
								</div>
								
							</div>
						<?php }else if($data[$i]->mode == "gachi"){ ?>
							<div class="results_result">
								<div class="results_play_time">

									時間：<?=date("i:s",$data[$i]->elapsed_time);?>
								</div>

								<div class="results_power">
									推定戰力：<span style="color: red;"><?=$data[$i]->estimate_gachi_power?$data[$i]->estimate_gachi_power:$data[$i]->estimate_x_power;?></span>
								</div>
								<div class="results_current_power">
									X power：<span style="color: red;"><?=$data[$i]->x_power?$data[$i]->x_power:"未開分";?></span>
								</div>

								<div class="results_maps_a">
									<span style="color: IndianRed;"><?php echo $data[$i]->my_team_count;?></span> count (我們)

								vs
									<span style="color: green;"><?php echo $data[$i]->other_team_count;?></span> count (對面)
								</div>
							</div>
						<?php }else{ ?>


							<div class="results_result">
								<div class="results_play_time">

									時間：<?=date("i:s",$data[$i]->elapsed_time);?>
								</div>
								<div class="results_maps_a">
									<span style="color: IndianRed;"><?php echo $data[$i]->my_team_count;?></span> count (我們) （推定戰力：<span style="color: IndianRed;"><?php echo $data[$i]->my_estimate_league_point;?></span>）
								</div>
								<div>
								vs	
								</div>
								
								<div class="results_maps_a">
									<span style="color: green;"><?php echo $data[$i]->other_team_count;?></span> count (對面)（推定戰力：<span style="color: green;"><?php echo $data[$i]->other_estimate_league_point;?></span>）
								</div>
							</div>
						<?php } ?>

						<div class="results_detail">
						</br>個人戰續：</br>
							殺數（助攻）：<?php echo $data[$i]->teammatesResults[0]->kill_count+$data[$i]->teammatesResults[0]->assist_count;?>（<?php echo $data[$i]->teammatesResults[0]->assist_count;?>）</br>
							死數：<?php echo $data[$i]->teammatesResults[0]->death_count?></br>
							大技：<?php echo $data[$i]->teammatesResults[0]->special_count?></br>
							油地量：<?php echo $data[$i]->teammatesResults[0]->game_paint_point?>p
						</div>
					</div>

					<div class="results_item col-xs-12 col-sm-6">
						
						<div class="maps_image">
							<div class="maps_name">
								<?=$maps[$data[$i]->map_id]['name']?>
							</div>
							<img src="{{URL::asset('/images/splatoon2/')}}/<?=$maps[$data[$i]->map_id]['image']?>" />
						</div>
					</div>
					<?php  
						if($data[$i]->mode == "regular"){
							$my_count_percentage =  $data[$i]->my_team_percentage == 0 ? 0 : ($data[$i]->my_team_percentage)/($data[$i]->my_team_percentage + $data[$i]->other_team_percentage) * 100;
							$other_count_percentage = $data[$i]->other_team_percentage == 0 ? 0 : ($data[$i]->other_team_percentage) / ($data[$i]->my_team_percentage + $data[$i]->other_team_percentage) * 100;
						}else {
							$my_count_percentage =  $data[$i]->my_team_count == 0 ? 0 : ($data[$i]->my_team_count)/($data[$i]->my_team_count + $data[$i]->other_team_count) * 100;
							$other_count_percentage = $data[$i]->other_team_count == 0 ? 0 : ($data[$i]->other_team_count) / ($data[$i]->my_team_count + $data[$i]->other_team_count) * 100;
						} 
					?>

					<div class="result_bar col-xs-12"> 
						<div class="row">
							<div class="point_result our_team_result" style="width:<?php echo $my_count_percentage;?>%;"></div>
							<div class="point_result other_team_result" style="width:<?php echo $other_count_percentage;?>%;"></div>
						</div>
					</div>
				</a>

			<?php } ?>
	</div>
</div>

@endsection
