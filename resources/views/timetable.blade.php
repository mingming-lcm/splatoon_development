@extends('layouts.app')

@section('title', __('Splatoon2 時間表'))
@section('description', __('每隔兩小時更新～'))


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
//$data = new ArrayObject($data);
//$data->uksort("modesCompare");


?>
<div class="title">
	Splatoon2 時間表
</div>
<div class="schedules_table">
<?php foreach($modes_translate as $mode_key => $mode){ ?>
	<div class="d-none d-lg-block">
		<div class="schedules_column">
			<div class="schedules_mode">
				<?=$mode['name'];?>
			</div>
			<?php foreach(${$mode_key."_data"} as $key=>$slot){ ?>
				<div class="schedules_item">
					<div class="schedules_time">
						<?php echo date("H:i", $slot->start_time);?> - <?php echo date("H:i ( j/n )", $slot->end_time);?>  
					</div>
					<div class="schedules_rules" style="color:<?=$rank_modes_translate[$slot->rule]['color'];?>">
						<?php echo $rank_modes_translate[$slot->rule]['name'];?>
					</div>

					<div class="maps">
						<div class="maps_image">
							<div class="maps_name">
								<?php echo nl2br($maps[$slot->stage_a]['name']);?>
							</div>
							<img src="{{URL::asset('/images/splatoon2')}}/<?=$maps[$slot->stage_a]['image']?>" />
						</div>

						<div class="maps_image">
							<div class="maps_name">
								<?php echo nl2br($maps[$slot->stage_b]['name']);?>
							</div>
							<img src="{{URL::asset('/images/splatoon2/')}}/<?=$maps[$slot->stage_b]['image']?>" />
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
	<?php } ?>

	<div class="d-lg-none accordion" id="schedules_table">
		<?php foreach($modes_translate as $mode_key => $mode){ ?>
		<div class="accordion-item">
			<h2 class="accordion-header" id="heading_<?=$mode_key;?>">
				<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_<?=$mode_key;?>" aria-expanded="false" aria-controls="collapse_<?=$mode_key;?>">
					<?=$mode['name'];?>
				</button>
			</h2>
			<div id="collapse_<?=$mode_key;?>" class="accordion-collapse collapse" aria-labelledby="heading_<?=$mode_key;?>" data-bs-parent="#schedules_table">
				<div class="accordion-body">
					<?php foreach(${$mode_key."_data"} as $key=>$slot){ ?>
						<div class="schedules_item">
							<div class="schedules_time">
								<?php echo date("H:i", $slot->start_time);?> - <?php echo date("H:i ( j/n )", $slot->end_time);?>  
							</div>
							<div class="schedules_rules" style="color:<?=$rank_modes_translate[$slot->rule]['color'];?>">
								<?php echo $rank_modes_translate[$slot->rule]['name'];?>
							</div>

							<div class="maps">
								<div class="maps_image">
									<div class="maps_name">
										<?php echo nl2br($maps[$slot->stage_a]['name']);?>
									</div>
									<img src="{{URL::asset('/images/splatoon2')}}/<?=$maps[$slot->stage_a]['image']?>" />
								</div>

								<div class="maps_image">
									<div class="maps_name">
										<?php echo nl2br($maps[$slot->stage_b]['name']);?>
									</div>
									<img src="{{URL::asset('/images/splatoon2/')}}/<?=$maps[$slot->stage_b]['image']?>" />
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
</div>

@endsection
