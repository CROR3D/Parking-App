<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }} - Register</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/app.css') }}" />
    </head>

<body>
    <div class="container text-center">
        <div class="mt-5 text-left">
            <h3><a class="text-primary" href="/">Go Back</a></h3>
        </div>
        <div class="mt-5">
            <h3 class="text-primary">CityParking</h3>
            <p class="lead">Modern parking solutions</p>
        </div>
        <div class="mt-5">
            <div class="row">
                <div class="col-md-12">
                    <h3>Register</h3>
                </div>
                <div class="col-md-6 offset-md-3">
                    <form accept-charset="UTF-8" role="form" method="post" action="{{ route('auth.register.attempt') }}">
                    <fieldset>
                        <div class="form-group {{ ($errors->has('email')) ? 'has-error' : '' }}">
                            <input class="form-control" placeholder="E-mail" name="email" type="text" value="{{ old('email') }}">
                            {!! ($errors->has('email') ? $errors->first('email', '<p class="text-danger">:message</p>') : '') !!}
                        </div>
                        <div class="form-group  {{ ($errors->has('password')) ? 'has-error' : '' }}">
                            <input class="form-control" placeholder="Password" name="password" type="password">
                            {!! ($errors->has('password') ? $errors->first('password', '<p class="text-danger">:message</p>') : '') !!}
                        </div>
                        <div class="form-group  {{ ($errors->has('password_confirmation')) ? 'has-error' : '' }}">
                            <input class="form-control" placeholder="Confirm Password" name="password_confirmation" type="password">
                            {!! ($errors->has('password_confirmation') ? $errors->first('password_confirmation', '<p class="text-danger">:message</p>') : '') !!}
                        </div>
                        <input name="_token" value="{{ csrf_token() }}" type="hidden">
                        <input class="btn btn-lg btn-primary btn-block" type="submit" value="Sign Me Up!">
                    </fieldset>
                    </form>
                </div>
            </div>
        </div>
        <div class="mt-5">
            <h3 class="text-info">Terms of service</h3>
        </div>
    </div>
</body>
