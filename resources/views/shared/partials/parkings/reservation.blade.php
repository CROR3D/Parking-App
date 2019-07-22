<form accept-charset="UTF-8" role="form" method="post" action="{{ route('reservation_parking', ['id' => $parking->id]) }}">
    <button class="btn btn-primary btn-lg" name="reservation" type="submit" >
        Make reservation
    </button>
    {{ csrf_field() }}
</form>
