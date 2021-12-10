@extends('layouts.app')

@section('title', __('面面圖庫'))

@section('description', __('面面的花枝圖庫'))

@section('content')


<div class="title">
    面面圖庫
</div>

<div class="gallery">
    <?php foreach ($data as $image_item) { ?>
        <div class="gallery-item">
            <div class="item-image">
                <img src="{{URL::asset('/images/splatoon2/')}}/<?= $image_item->filename; ?>" />
            </div>
            <div class="item-content">
                <div class="item-title">
                    <?= $image_item->title; ?>
                </div>
                <div class="item-description">
                    <?= $image_item->description; ?>
                </div>
                <div class="item-credit">
                    Credit By: <?= $image_item->credit; ?>
                </div>
            </div>
        </div>
    <?php } ?>
</div>



@endsection