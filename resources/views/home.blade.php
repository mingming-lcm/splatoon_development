@extends('layouts.app')

@section('description', __('面面的花枝工房'))

@section('content')

<div class="welcome_message">
	Welcome:)
</div>


<!-- <div>
	<div class="player_stats"> 個人資料：</div>
	</div>
</div> -->
<div>
	
	<div class="league_stats"> 戰績：</div>
	<div>
		總勝數：{{ $player_general_status->win_count }}
	</div>

	<div class="league_stats"> 戰績：</div>
	<div class="league_stats_table">
		<div class="league_stats_type">
			<div class="league_stats_4">四排</div>
			<div class="league_stats_4_gold">金：<span class="league_stats_4_gold_number">{{ $records->league_stats->team->gold_count }}</span></div>
			<div class="league_stats_4_silver">銀：<span class="league_stats_4_silver_number">{{ $records->league_stats->team->silver_count }}</span></div>
			<div class="league_stats_4_bronze">銅：<span class="league_stats_4_bronze_number">{{ $records->league_stats->team->bronze_count }}</span></div>
			<div class="league_stats_4_none">空空如也：<span class="league_stats_4_none_number">{{ $records->league_stats->team->no_medal_count }}</span></div>
		</div>
		<div class="league_stats_type">
			<div class="league_stats_2">雙排</div>
			<div class="league_stats_2_gold">金：<span class="league_stats_2_gold_number">{{ $records->league_stats->pair->gold_count }}</span></div>
			<div class="league_stats_2_silver">銀：<span class="league_stats_2_silver_number">{{ $records->league_stats->pair->silver_count }}</span></div>
			<div class="league_stats_2_bronze">銅：<span class="league_stats_2_bronze_number">{{ $records->league_stats->pair->bronze_count }}</span></div>
			<div class="league_stats_2_none">空空如也：<span class="league_stats_2_none_number">{{ $records->league_stats->pair->no_medal_count }}</span></div>
		</div>
	</div>
</div>
@endsection