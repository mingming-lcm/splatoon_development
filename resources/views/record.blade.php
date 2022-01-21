@extends('layouts.app')


@section('content')
				
<?php
function modesCompare($a, $b){
	if ($a === 'regular') {
		return -1;
	}else if($b === 'regular'){
		return 1;
	}else if($a === 'gachi'){
		return -1;
	}else{
		return 1;
	}
}
$data = new ArrayObject($data);
$data->uksort("modesCompare");

?>
<div class="title">
	Splatoon2 時間表
</div>
<div class="schedules-table">
<?php foreach($data as $modes=>$modes_data){ ?>
	<div class="schedules_column">
		<div class="schedules_mode">
			<?=$modes_translate[$modes]['name'];?>
		</div>
			<?php for($i=0;$i < count($modes_data);$i++){ ?>
				<div class="schedules_item">
					<div class="schedules_time">
						<?php echo date("H:i", $modes_data[$i]->start_time);?> - <?php echo date("H:i", $modes_data[$i]->end_time);?>  
					</div>
					<div class="schedules_rules" style="color:<?=$rank_modes_translate[$modes_data[$i]->rule->key]['color'];?>">
						<?php echo $rank_modes_translate[$modes_data[$i]->rule->key]['name'];?>
					</div>

					<div class="maps">
						<div class="maps_image">
							<div class="maps_name">
								<?php echo nl2br($maps[$modes_data[$i]->stage_a->id]['name']);?>
							</div>
							<img src="{{URL::asset('/images/splatoon2')}}/<?=$maps[$modes_data[$i]->stage_a->id]['image']?>" />
						</div>

						<div class="maps_image">
							<div class="maps_name">
								<?php echo nl2br($maps[$modes_data[$i]->stage_b->id]['name']);?>
							</div>
							<img src="{{URL::asset('/images/splatoon2/')}}/<?=$maps[$modes_data[$i]->stage_b->id]['image']?>" />
						</div>
					</div>
				</div>
			<?php } ?>
	</div>
	<?php } ?> 
</div>

@endsection
