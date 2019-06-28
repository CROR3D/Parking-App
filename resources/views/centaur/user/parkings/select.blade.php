@extends('shared.layout')

@section('sub-title', ' - Select Parking')

@section('content')
<div class="track-slider"></div>
<div class="content-slider">
    <h2 class="text-center my-4">{{ $page_data['page_title'] }}</h2>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form accept-charset="UTF-8" role="form" method="post" action="{{ route($page_data['form_action'], ['slug' => 'parking']) }}">
                {{ csrf_field() }}

                @include('shared.partials.parkings.select_form')

                <button class="btn btn-block btn-info my-5" name="select" value="" type="submit">
                    {{ $page_data['button_text'] }}
                </button>
            </form>
        </div>
        @if(Request::is('simulator'))
            @include('shared.partials.parkings.helper_form')
        @endif
    </div>
</div>
@stop

@push('script')
    <script src="{{ URL::asset('js/content.js') }}"></script>
@endpush
