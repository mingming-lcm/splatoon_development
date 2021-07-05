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
$data = new ArrayObject($data);
$data->uksort("modesCompare");


?>
<div class="title">
	Splatoon2 時間表
</div>
<div class="schedules_table" id="schedules_table" >
<?php foreach($data as $modes=>$modes_data){ ?>
	<!-- <div class="d-none d-lg-block"> -->
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

					<div class="schedules_maps">
						<div class="schedules_maps_a">
							<?php echo nl2br($maps[$modes_data[$i]->stage_a->id]['name']);?>

						</div>
						<div class="schedules_maps_image">
							<img src="{{URL::asset('/images/splatoon2')}}/<?=$maps[$modes_data[$i]->stage_a->id]['image']?>" />
							
						</div>
						<div class="schedules_maps_b">
							<?php echo nl2br($maps[$modes_data[$i]->stage_b->id]['name']);?>
						</div>
						<div class="schedules_maps_image">
							<img src="{{URL::asset('/images/splatoon2/')}}/<?=$maps[$modes_data[$i]->stage_b->id]['image']?>" />

						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	<!-- </div> -->

	<!-- <div class="d-lg-none">
	  	<div class="card">
		    <div class="card-header" id="heading_<?=$modes;?>">
		      <h5 class="mb-0">
		        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse_<?=$modes;?>" aria-expanded="true" aria-controls="collapse_<?=$modes;?>">
		          <?=$modes_translate[$modes]['name'];?>
		        </button>
		      </h5>
		    </div>

		    <div id="collapse_<?=$modes;?>" class="collapse" aria-labelledby="heading_<?=$modes;?>" data-parent="#schedules_table">
			    <div class="card-body">
			        <?php for($i=0;$i < count($modes_data);$i++){ ?>
						<div class="schedules_item">
							<div class="schedules_time">
								<?php echo date("H:i", $modes_data[$i]->start_time);?> - <?php echo date("H:i", $modes_data[$i]->end_time);?>  
							</div>
							<div class="schedules_rules" style="color:<?=$rank_modes_translate[$modes_data[$i]->rule->key]['color'];?>">
								<?php echo $rank_modes_translate[$modes_data[$i]->rule->key]['name'];?>
							</div>

							<div class="schedules_maps">
								<div class="schedules_maps_a">
									<?php echo nl2br($maps[$modes_data[$i]->stage_a->id]['name']);?>

								</div>
								<div class="schedules_maps_image">
									<img src="{{URL::asset('/images/splatoon2')}}/<?=$maps[$modes_data[$i]->stage_a->id]['image']?>" />
									
								</div>
								<div class="schedules_maps_b">
									<?php echo nl2br($maps[$modes_data[$i]->stage_b->id]['name']);?>
								</div>
								<div class="schedules_maps_image">
									<img src="{{URL::asset('/images/splatoon2/')}}/<?=$maps[$modes_data[$i]->stage_b->id]['image']?>" />

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
