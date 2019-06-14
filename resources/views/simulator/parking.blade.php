@extends('shared.layout')

@section('sub-title', ' - Simulator')

@section('content')
    <div id="root"></div>
@stop

@push('script')
    <script src="/js/app.js" type="text/javascript"></script>
@endpush
