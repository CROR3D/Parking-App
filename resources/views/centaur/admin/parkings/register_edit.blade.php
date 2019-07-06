<?php
    $isEdit = (is_null($parking)) ? false : true;
?>

@extends('shared.layout')

@section('sub-title', ' - Register Parking Lot')

@section('content')
<div class="content-section p-5">
    <h2 class="text-center mb-5">Register Parking Lot</h2>
        <form accept-charset="UTF-8" role="form" method="post" action="{{ route('store_parking') }}">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        City:
                        <div class="p-1">
                            <input type="text" class="form-control" name="city" value="{{ ($isEdit) ? $parking->city : '' }}"/>
                        </div>
                        {!! ($errors->has('city')) ? $errors->first('city', '<p class="text-danger">:message</p>') : '' !!}
                    </div>
                    <div class="form-group">
                        Name:
                        <div class="p-1">
                            <input type="text" class="form-control" name="name" value="{{ ($isEdit) ? $parking->name : '' }}" />
                        </div>
                        {!! ($errors->has('name')) ? $errors->first('name', '<p class="text-danger">:message</p>') : '' !!}
                    </div>
                    <div class="form-group">
                        Address:
                        <div class="p-1">
                            <input type="text" class="form-control" name="address" value="{{ ($isEdit) ? $parking->address : '' }}" />
                        </div>
                        {!! ($errors->has('address')) ? $errors->first('address', '<p class="text-danger">:message</p>') : '' !!}
                    </div>
                    <div class="form-group">
                        Image name (with extension):
                        <div class="p-1">
                            <input type="text" class="form-control" name="image" value="{{ ($isEdit) ? $parking->image : '' }}" />
                            {!! ($errors->has('image')) ? $errors->first('image', '<p class="text-danger">:message</p>') : '' !!}
                        </div>
                    </div>
                  </div>
                  <div class="col-md-4 offset-md-2">
                      <div class="form-group">
                          Number of parking spots:
                          <div class="p-1">
                              <input type="text" class="form-control" name="spots" value="{{ ($isEdit) ? $parking->spots : '' }}" />
                          </div>
                          {!! ($errors->has('spots')) ? $errors->first('spots', '<p class="text-danger">:message</p>') : '' !!}
                      </div>
                      <div class="form-group">
                          Working time:
                          <div class="p-1">
                              <input type="text" class="form-control number-box" name="working_time" maxlength="2"/> : <input type="text" class="form-control number-box" name="working_time_two" maxlength="2"/>
                              h -
                              <input type="text" class="form-control number-box" name="working_time_three" maxlength="2"/> : <input type="text" class="form-control number-box" name="working_time_four" maxlength="2"/> h
                          </div>
                          {!! ($errors->has('working_time')) ? $errors->first('working_time', '<p class="text-danger">:message</p>') : '' !!}
                          {!! ($errors->has('working_time_two')) ? $errors->first('working_time_two', '<p class="text-danger">:message</p>') : '' !!}
                          {!! ($errors->has('working_time_three')) ? $errors->first('working_time_three', '<p class="text-danger">:message</p>') : '' !!}
                          {!! ($errors->has('working_time_four')) ? $errors->first('working_time_four', '<p class="text-danger">:message</p>') : '' !!}
                      </div>
                      <div class="form-group">
                          Price per hour:
                          <div class="p-1">
                              <input type="text" class="form-control number-box" name="price_per_hour" maxlength="2" /> . <input type="text" class="form-control number-box"  name="price_per_hour_two" maxlength="2" /> kn
                          </div>
                          {!! ($errors->has('price_per_hour')) ? $errors->first('price_per_hour', '<p class="text-danger">:message</p>') : '' !!}
                          {!! ($errors->has('price_per_hour_two')) ? $errors->first('price_per_hour_two', '<p class="text-danger">:message</p>') : '' !!}
                      </div>
                      <div class="form-group">
                          Price of reservation:
                          <div class="p-1">
                              <input type="text" class="form-control number-box" name="price_of_reservation" maxlength="2"/> . <input type="text" class="form-control number-box" name="price_of_reservation_two" maxlength="2" /> kn
                          </div>
                          {!! ($errors->has('price_of_reservation')) ? $errors->first('price_of_reservation', '<p class="text-danger">:message</p>') : '' !!}
                          {!! ($errors->has('price_of_reservation_two')) ? $errors->first('price_of_reservation_two', '<p class="text-danger">:message</p>') : '' !!}
                      </div>
                      <div class="form-group">
                          Price of reservation penalty:
                          <div class="p-1">
                              <input type="text" class="form-control number-box" name="price_of_reservation_penalty" maxlength="2" /> . <input type="text" class="form-control number-box" name="price_of_reservation_penalty_two" maxlength="2" /> kn
                          </div>
                          {!! ($errors->has('price_of_reservation_penalty')) ? $errors->first('price_of_reservation_penalty', '<p class="text-danger">:message</p>') : '' !!}
                          {!! ($errors->has('price_of_reservation_penalty_two')) ? $errors->first('price_of_reservation_penalty_two', '<p class="text-danger">:message</p>') : '' !!}
                      </div>
                  </div>
                  {{ csrf_field() }}
                  <div class="col-md-12 mt-5">
                      <div class="form-group">
                          <input class="btn btn-md btn-primary btn-block" type="submit" value="Register" />
                      </div>
                  </div>
              </div>
        </form>
    </div>
</div>
@stop

@push('script')

@endpush
