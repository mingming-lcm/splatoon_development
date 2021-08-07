@extends('layouts.app')

@section('title', __($modes_translate[$data->mode]['name']. '詳細紀錄'))


@section('content')


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
							<span style="color:<?=$rank_modes_translate[$data->rule]['color'];?>">
							<?=$rank_modes_translate[$data->rule]['name'];?></span>
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
							<div class="league_point" style="color:lightgreen;">
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
										<span style="color: red;"><?php echo $data->my_team_percentage;?>%</span>  (我們)
									</div>
									
								</div>
							<?php }else if($data->mode == "gachi"){ ?>

								<div class="results_detail_other_team_power">
									推定戰力：<span style="color: red;"><?=$data->estimate_gachi_power?$data->estimate_gachi_power:$data->estimate_x_power;?></span>
								</div>
							<?php }else{ ?>

								<div class="results_result">
									
									<div class="results_maps_a">
										<span style="color: red;"><?php echo $data->my_team_count;?></span> count (我們) （推定戰力：<span style="color: red;"><?php echo $data->my_estimate_league_point;?></span>）
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
										<span style="color: red;"><?php echo $data->other_team_percentage;?>%</span> (對面)
									</div>
									
								</div>
							<?php }else if($data->mode == "gachi"){ ?>

								<div class="results_detail_other_team_power">
									推定戰力：<span style="color: red;"><?=$data->estimate_gachi_power?$data->estimate_gachi_power:$data->estimate_x_power;?></span>
								</div>
							<?php }else{ ?>

								<div class="results_result">
									<div class="results_maps_a">
										<span style="color: red;"><?php echo $data->other_team_count;?></span> count (對面)（推定戰力：<span style="color: red;"><?php echo $data->other_estimate_league_point;?></span>）
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
