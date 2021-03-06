@extends('layouts.app')

@section('title', __('Splatoon2 50場紀錄'))


@section('content')

<div class="title">
	Splatoon2 50場紀錄
</div>
<div class="results_table">
	<div class="results_column">
		
			<?php for($i=0;$i < count($data);$i++){ ?>

				<div class="row">
					<a href="{{ route('result.detail') }}">
					<div class="results_item col-xs-12 col-sm-6">
						<div class="results_mode">
							<?=$modes_translate[$data[$i]->type]['name'];?>
						</div>

						<div class="results_result">
							<div class="<?=$data[$i]->my_team_result->key === "victory"?'results_result_victory':'results_result_lose';?>">
								<?php echo $data[$i]->my_team_result->name;?>
							</div>
						</div>

						<?php if($data[$i]->type === "league"){ ?>
							<div class="league_point" style="color:<?=$rank_modes_translate[$data[$i]->rule->key]['color'];?>">
								<?php 
									if ($data[$i]->league_point == null) { 
										echo "未開分";
									}else { 
										echo "聯盟分數：".$data[$i]->league_point;
									} 
								?> 
							</div>

						<?php } ?>

						<?php  if($data[$i]->type == "regular"){ ?>
							<div class="results_result">
								<div class="results_maps_a">
									<span style="color: red;"><?php echo $data[$i]->my_team_percentage;?>%</span>  (我地隊)
								 vs
									<span style="color: red;"><?php echo $data[$i]->other_team_percentage;?>%</span> (對面隊)
								</div>
								
							</div>
						<?php }else if($data[$i]->type == "gachi"){ ?>
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
									<span style="color: red;"><?php echo $data[$i]->my_team_count;?></span> count (我地隊)

								vs
									<span style="color: red;"><?php echo $data[$i]->other_team_count;?></span> count (對面隊)
								</div>
							</div>
						<?php }else{ ?>


							<div class="results_result">
								<div class="results_play_time">

									時間：<?=date("i:s",$data[$i]->elapsed_time);?>
								</div>
								<div class="results_maps_a">
									<span style="color: red;"><?php echo $data[$i]->my_team_count;?></span> count (我地隊) （推定戰力：<span style="color: red;"><?php echo $data[$i]->my_estimate_league_point;?></span>）
								</div>
								<div>
								vs	
								</div>
								
								<div class="results_maps_a">
									<span style="color: red;"><?php echo $data[$i]->other_team_count;?></span> count (對面隊)（推定戰力：<span style="color: red;"><?php echo $data[$i]->other_estimate_league_point;?></span>）
								</div>
							</div>
						<?php } ?>

						<div class="results_detail">
						</br>個人戰力：</br>
							擊殺：<?php echo $data[$i]->player_result->kill_count?></br>
							助攻：<?php echo $data[$i]->player_result->assist_count?></br>
							死數：<?php echo $data[$i]->player_result->death_count?></br>
							大技：<?php echo $data[$i]->player_result->special_count?></br>
							油地量：<?php echo $data[$i]->player_result->game_paint_point?>p
						</div>
					</div>

					<div class="results_item col-xs-12 col-sm-6">
						<div class="results_maps_name">
							<?=$maps[$data[$i]->stage->id]['name']?>
						</div>
						<div class="results_maps_image">
							<img src="{{URL::asset('/images/splatoon2/')}}/<?=$maps[$data[$i]->stage->id]['image']?>" />

						</div>
					</div>
				</a>

				</div>
			<?php } ?>
	</div>
</div>

@endsection
