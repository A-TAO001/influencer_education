@extends('layouts.user_common_header')

@section('content')
<div class="back-top">
     <a class="back-page" href="{{ route('user.top') }}">{{ __('←戻る') }}</a>
</div>
   <div class="delovery-container">  
       <div class="video-clear-btn">
        @forelse($curriculums as $curriculum)
            <div class="curriculums-video">
            <video id="video{{ $curriculum->id }}" data-alway-delivery-flg="{{ $alway_delivery_flg }}" width="550px" height="320px" controls
            @if ($curriculum->alway_delivery_flg == 1 || ($curriculum->deliveryTime && $curriculum->deliveryTime->isCurrentlyDelivering()))
                    data-delivery-from="{{ $deliveryTime->delivery_from }}"
                    data-delivery-to="{{ $deliveryTime->delivery_to }}"
                @endif
                data-url="{{ route('mark.as.completed', $curriculum->id) }}"
                @if ($clearFlag == 1)
                    data-clear-flag="{{ $clearFlag }}"
                @endif>
                    <source src="{{ asset('storage/videos/' . $curriculum->video_url) }}" type="video/mp4">
            </video>
            </div>
            <div class="clear-btn">
                 <button type="button" class="btn-clear" id="btn-clear-{{ $curriculum->id }}"
                 data-url="{{ route('mark.as.completed', $curriculum->id) }}" data-curriculum-id="{{ $curriculum->id }}" data-delivery-from="{{ $deliveryTime->delivery_from }}" data-delivery-to="{{ $deliveryTime->delivery_to }}" data-clear-flag="{{ $clearFlag }}" data-alway-delivery-flg="{{ $alway_delivery_flg }}">受講しました</button>
            </div>
       </div>
            <div class="class-display">{{ $curriculum->name }}</div>
            <div class="curriculums-title">{{ $curriculum->title }}</div>
            <div class="curriculums-description">{{ $curriculum->description }}</div>
        @empty
            <p>No curriculum videos available</p>
        @endforelse    
   </div>

   <meta name="csrf-token" content="{{ csrf_token() }}">

@endsection