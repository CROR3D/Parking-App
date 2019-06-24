@extends('shared.layout')

@section('sub-title', ' - Select Parking')

@section('content')
<div class="track-slider"></div>
<div class="content-slider">
    <h2 class="text-center mb-4">Parking Simulator</h2>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form accept-charset="UTF-8" role="form" method="post" action="{{ route('post_simulator', ['slug' => 'parking']) }}">
                {{ csrf_field() }}

                @include('shared.partials.parkings.select_form')

                <button class="btn btn-block btn-info mt-5" name="select" value="" type="submit">
                    ENTER PARKING
                </button>
            </form>
        </div>
        <div class="col-md-6 offset-md-3 my-5">
            <h4 class="text-center mb-4">Language helpers for parking simulator</h4>
            <select class="form-control mb-5" name="select_helper" id="select3">
                <option class="dropdown-item" value="">ENGLISH (EN)</option>
                <option class="dropdown-item" value="">HRVATSKI (CRO)</option>
            </select>
            <a class="btn btn-block btn-info" href="{{ route('simulator_help') }}">CHECK HELPER</a>
        </div>
    </div>
</div>
@stop

@push('script')
    <script src="{{ URL::asset('js/content.js') }}"></script>
@endpush
