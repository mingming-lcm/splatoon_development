@extends('layouts.app')


@section('content')
<div class="title">
	Splatoon2 Summary
</div>

<div>
	總場次：<?=$data->battle_number?>
	<?php 
		foreach ($data as $key => $value) {
	?>
		<div class="">
			<?php
				dump($value);
			?>
		</div>
	<?php }
	dump($data);
	?>
	</div>

@endsection