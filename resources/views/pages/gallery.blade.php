@extends('layouts.app')

@section('title', __('面面圖庫'))

@section('description', __('面面的花枝圖庫'))

@section('content')


<div class="title">
    面面圖庫
</div>

<div id="gallery-slider">
    <?php foreach ($data as $image_item) { ?>
        <div class="gallery-item">
            <div class="item-image">
                <img src="{{URL::asset('/images/splatoon2/gallery/')}}/<?= $image_item->filename; ?>" />
            </div>
            <div class="item-content">
                <div class="item-title">
                    <?= $image_item->title; ?>
                </div>
                <div class="item-description">
                    <?= $image_item->description; ?>
                </div>
                <div class="item-credit">
                    Credit By: <?= $image_item->credit; ?> <?php if ($image_item->credit_content) { ?>(<a href="<?= $image_item->credit_content; ?>" target="_blank"><?= $image_item->credit_content; ?></a>)<?php } ?>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<div class="slider-control">
    <div class="slider-next">Next</div>
    <div class="slider-prev">Prev</div>
</div>



@endsection