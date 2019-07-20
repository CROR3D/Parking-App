@extends('shared.layout')

@section('sub-title', ' - Dashboard')

@section('content')
<div id="dashboard" data-activity='{{ $currentActivity }}'></div>
@stop
