<form accept-charset="UTF-8" role="form" method="post" action="{{ route($page_data->form_action) }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="select1">Select City</label>
            <select class="form-control" name="select_city" id="select1">
                <option>---</option>
                @foreach($city_list as $city)
                      <option class="dropdown-item" value="{{ $city_values[$city->city] }}">
                          {{ $city->city }}
                      </option>
                @endforeach
            </select>
    </div>
    <div class="form-group">
        <label for="select2">Select Parking</label>
            <select class="form-control" name="select_parking" id="select2" disabled>
                <option></option>
                @foreach($parking_list as $parking)
                      <option class="dropdown-item" name="{{ $parking->id }}" value="{{ $parking_values[$parking->slug] }}">
                          {{ $parking->name }}
                      </option>
                @endforeach
            </select>
    </div>
    <button class="btn btn-block btn-info my-5" name="selected" value="" type="submit">
        {{ $page_data->button_text }}
    </button>
</form>
