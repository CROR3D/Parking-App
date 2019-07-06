<?php $isSimulator = Request::is('simulator'); ?>

@extends('shared.layout')

@section('sub-title', ' - Select Parking')

@section('content')
    @if($isSimulator)
        <div class="track-slider"></div>
    @endif
    <div class="{{ ($isSimulator) ? 'content-slider' : 'content-section mb-3 p-5' }}">
        <h2 class="text-center my-4">{{ $page_data->page_title }}</h2>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                @include('shared.partials.parkings.select_form')
            </div>
            @if($isSimulator)
                @include('shared.partials.parkings.helper_form')
            @endif
        </div>
    </div>
@stop

@push('script')
    <script src="{{ URL::asset('js/content.js') }}"></script>
@endpush
