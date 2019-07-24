@extends('shared.layout')

@section('sub-title')
     - {{ $parking->name }}
@stop

@section('content')
<div class="content-section p-5">
    <div class="text-center">
        <div>
            <h3>Parking lot: <span class="text-warning">{{ $parking->name }}, {{ $parking->city }}</span></h3>
            <h4>Address: <span class="text-warning">{{ $parking->address }}</span></h4>
            <h4>Working time: <span class="text-warning">{{ $parking->working_time }}</span></h4>
            <h4>Number of parking spots: <span class="text-warning">{{ $parking->spots }}</span></h4>
            <h4>Price per hour: <span class="text-warning">{{ $parking->price_per_hour }} kn/h</span></h4>
        </div>
        <div>
            @include('shared.partials.parkings.reservation')
        </div>
    </div>
</div>
@stop

@push('script')

@endpush
