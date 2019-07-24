<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand text-primary" href="/">{{ config('app.name') }}</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li id="content" class="nav-item">
                    <a class="nav-link {{ Request::is('/simulator') ? 'active' : '' }}" href="{{ route('simulator') }}">Simulator</a>
                </li>
                @if (Sentinel::check())
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                @endif
                @if (Sentinel::check() && !Sentinel::inRole('administrator'))
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/view') ? 'active' : '' }}" href="{{ route('view_parking') }}">View Parking</a>
                </li>
                @endif
                @if (Sentinel::check() && Sentinel::inRole('administrator'))
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="parkingsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Parkings
                    </a>
                    <div class="dropdown-menu" aria-labelledby="parkingsDropdown">
                        <a class="dropdown-item {{ Request::is('/view') ? 'active' : '' }}" href="{{ route('view_parking') }}">View</a>
                        <a class="dropdown-item {{ Request::is('/register*') ? 'active' : '' }}" href="{{ route('register_edit_parking') }}">Register</a>
                        <a class="dropdown-item {{ Request::is('/update*') ? 'active' : '' }}" href="{{ route('edit_parking') }}">Update</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="usersDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Users
                    </a>
                    <div class="dropdown-menu" aria-labelledby="usersDropdown">
                        <a class="dropdown-item {{ Request::is('users*') ? 'active' : '' }}" href="{{ route('users.index') }}">Users</a>
                        <a class="dropdown-item {{ Request::is('roles*') ? 'active' : '' }}" href="{{ route('roles.index') }}">Roles</a>
                    </div>
                </li>
                @endif
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if(Sentinel::check())
                    <li class="nav-item notification-item">
                        @include('Centaur::notifications')
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('auth.logout') }}">Log Out</a>
                    </li>
                @else
                    <li class="dropdown nav-item">
                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">Login <span class="caret"></span></a>
                        <ul id="login-dp" class="dropdown-menu">
                            <li>
                                <div class="row">
                                    <div class="col-md-12">
                                        <form accept-charset="UTF-8" role="form" method="post" action="{{ route('auth.login.attempt') }}">
                                        <fieldset>
                                            <div class="form-group {{ ($errors->has('email')) ? 'has-error' : '' }}">
                                                <input class="form-control" placeholder="E-mail" name="email" type="text" value="{{ old('email') }}">
                                                {!! ($errors->has('email') ? $errors->first('email', '<p class="text-danger">:message</p>') : '') !!}
                                            </div>
                                            <div class="form-group  {{ ($errors->has('password')) ? 'has-error' : '' }}">
                                                <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                                {!! ($errors->has('password') ? $errors->first('password', '<p class="text-danger">:message</p>') : '') !!}
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input name="remember" type="checkbox" value="true" {{ old('remember') == 'true' ? 'checked' : ''}}> Remember Me
                                                </label>
                                            </div>
                                            <input name="_token" value="{{ csrf_token() }}" type="hidden">
                                            <input class="btn btn-md btn-primary btn-block" type="submit" value="Login">
                                            <p style="margin-top:5px; margin-bottom:0"><a class="forgot-password" href="{{ route('auth.password.request.form') }}" type="submit">Forgot your password?</a></p>
                                        </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('auth.register.form') }}">Register</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
