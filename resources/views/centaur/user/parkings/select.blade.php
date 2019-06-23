@extends('shared.layout')

@section('sub-title', ' - Select Parking')

@section('content')
<div class="content-slider-left">
    <h2 class="title">Parking Simulator</h2>
    <div class="row select-form">
        <div class="col-md-12">
            <form accept-charset="UTF-8" role="form" method="post" action="{{ route('post_simulator', ['slug' => 'parking']) }}">
                {{ csrf_field() }}

                @include('shared.partials.parkings.select_form')

                <button class="btn btn-lg btn-primary btn-ticket" name="select" value="" type="submit">
                    Enter Parking
                </button>
            </form>
        </div>
    </div>
</div>
<div class="content-slider-right">
    <div>
        <h4>Check helper for parking simulator</h4>
        <a class="btn btn-block btn-info" href="{{ route('simulator_help') }}">HELP-HR</a>
    </div>
</div>
@stop

@push('script')
    <script src="{{ URL::asset('js/contentSlider.js') }}"></script>
@endpush
