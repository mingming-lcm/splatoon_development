@extends('layouts.app')

@section('title', __('Splatoon2 時間表'))


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
<div class="schedules_table" id="schedules_table" >
<?php foreach($modes_translate as $mode_key => $mode){ ?>
	<!-- <div class="d-none d-lg-block"> -->
		<div class="schedules_column">
			<div class="schedules_mode">
				<?=$mode['name'];?>
			</div>
			<?php foreach(${$mode_key."_data"} as $key=>$slot){ ?>
				<div class="schedules_item">
					<div class="schedules_time">
						<?php echo date("H:i", $slot->start_time);?> - <?php echo date("H:i", $slot->end_time);?>  
					</div>
					<div class="schedules_rules" style="color:<?=$rank_modes_translate[$slot->rule]['color'];?>">
						<?php echo $rank_modes_translate[$slot->rule]['name'];?>
					</div>

					<div class="schedules_maps">
						<div class="schedules_maps_a">
							<?php echo nl2br($maps[$slot->stage_a]['name']);?>

						</div>
						<div class="schedules_maps_image">
							<img src="{{URL::asset('/images/splatoon2')}}/<?=$maps[$slot->stage_a]['image']?>" />
							
						</div>
						<div class="schedules_maps_b">
							<?php echo nl2br($maps[$slot->stage_b]['name']);?>
						</div>
						<div class="schedules_maps_image">
							<img src="{{URL::asset('/images/splatoon2/')}}/<?=$maps[$slot->stage_b]['image']?>" />

						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	<!-- </div> -->

	<!-- <div class="d-lg-none">
	  	<div class="card">
		    <div class="card-header" id="heading_<?=$mode_key;?>">
		      <h5 class="mb-0">
		        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse_<?=$mode_key;?>" aria-expanded="true" aria-controls="collapse_<?=$mode_key;?>">
		          <?=$mode['name'];?>
		        </button>
		      </h5>
		    </div>

		    <div id="collapse_<?=$mode_key;?>" class="collapse" aria-labelledby="heading_<?=$mode_key;?>" data-parent="#schedules_table">
			    <div class="card-body">
				<?php foreach(${$mode_key."_data"} as $key=>$slot){ ?>
						<div class="schedules_item">
							<div class="schedules_time">
								<?php echo date("H:i", $slot->start_time);?> - <?php echo date("H:i", $slot->end_time);?>  
							</div>
							<div class="schedules_rules" style="color:<?=$rank_modes_translate[$slot->rule]['color'];?>">
								<?php echo $rank_modes_translate[$slot->rule]['name'];?>
							</div>

							<div class="schedules_maps">
								<div class="schedules_maps_a">
									<?php echo nl2br($maps[$slot->stage_a]['name']);?>

								</div>
								<div class="schedules_maps_image">
									<img src="{{URL::asset('/images/splatoon2')}}/<?=$maps[$slot->stage_a]['image']?>" />
									
								</div>
								<div class="schedules_maps_b">
									<?php echo nl2br($maps[$slot->stage_b]['name']);?>
								</div>
								<div class="schedules_maps_image">
									<img src="{{URL::asset('/images/splatoon2/')}}/<?=$maps[$slot->stage_b]['image']?>" />

								</div>
							</div>
						</div>
					<?php } ?>
			    </div>
		    </div>
	  	</div>
  	</div> -->

	<?php } ?> 
</div>

@endsection
