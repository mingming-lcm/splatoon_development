@extends('layouts.app')

@section('title', __('主頁'))

@section('description', __('面面的花枝工房'))

@section('content')

<div class="welcome_message">
	～歡迎歡迎～
</div>


<!-- <div>
	<div class="player_stats"> 個人資料：</div>
	</div>
</div> -->
<div>
	<div class="section">
		<div class="section_title"><i class="fas fa-bread-slice"></i>面面簡介：</div>
		<div>
			遊戲名稱： {{ $player_general_status->nickname }}
		</div>
		<div>
			遊戲等級： {{ $player_general_status->player_rank }} (星數： {{ $player_general_status->star_rank }})
		</div>
		<div>
			遊戲角色： {{ $player_general_status->player_gender }} {{ $player_general_status->player_type }}
		</div>
		<div>
			面面轉生時間： {{ date('Y-m-d H:i:s',$player_general_status->start_time) }} 
		</div>
	</div>

	<div class="section">
		<div class="section_title"> 總戰績：</div>
		<div class="total_win">
			總勝數： <span class="total_win_count">{{ number_format($player_general_status->win_count) }}</span>
		</div>
		<div class="total_lose">
			總敗數： <span class="total_lose_count">{{ number_format($player_general_status->lose_count) }}</span>
		</div>
		<div class="total_paint">
			總油地量： <span class="total_paint_count">{{ number_format($player_general_status->total_paint_point) }} p</span>
		</div>
	</div>

	<div class="section">
		<div class="section_title"> 戰績：</div>
		<div class="league_stats_table row">
			<div class="league_stats_type col-xs-12 col-sm-6">
				<div class="league_stats">四排</div>
				<div class="league_stats_best">最高分： <span class="league_stats_highest">{{ $player_general_status->max_league_point_team }}</span></div>

				<?php foreach ($player_medals_statuses_team as $medal){ ?>
					<div class="league_stats_{{$medal->medals_type}}">{{ __('splatoon.'.$medal->medals_type) }}： <span class="league_stats_{{$medal->medals_type}}_number">{{ $medal->medals_count }}</span></div>

				<?php } ?>
			</div>
			<div class="league_stats_type col-xs-12 col-sm-6">
				<div class="league_stats">雙排</div>
				<div class="league_stats_best">最高分： <span class="league_stats_highest">{{ $player_general_status->max_league_point_pair }}</span></div>
				<?php foreach ($player_medals_statuses_pair as $medal){ ?>
					<div class="league_stats_{{$medal->medals_type}}">{{ __('splatoon.'.$medal->medals_type) }}： <span class="league_stats_{{$medal->medals_type}}_number">{{ $medal->medals_count }}</span></div>

				<?php } ?>
			</div>
		</div>
	</div>

	<div class="section">
		<div class="section_title"> 斷線次數（？？？）： {{ $player_general_status->recent_disconnect_count }}</div>
	</div>
</div>
@endsection