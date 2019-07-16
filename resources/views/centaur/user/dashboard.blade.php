@extends('shared.layout')

@section('sub-title', ' - Dashboard')

@section('content')
<div id="dashboard" data-activity='{{ $currentActivity }}'></div>
@stop

@push('script')
    <script src="{{ URL::asset('js/app.js') }}"></script>
@endpush
