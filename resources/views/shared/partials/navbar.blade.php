<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">{{ config('app.name') }}</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="{{ Request::is('/dashboard') ? 'active' : '' }}"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                @if (Sentinel::check() && Sentinel::inRole('administrator'))
                <div class="dropdown nav-dropdown-link">
                    <li class="dropdown-toggle" type="button" id="parkingDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <a>Parking <span class="caret"></span></a>
                    </li>
                        <ul class="dropdown-menu" aria-labelledby="parkingDropdown">
                            <li class="{{ Request::is('/view') ? 'active' : '' }}"><a href="{{ route('view') }}">View</a></li>
                            <li class="{{ Request::is('/create*') ? 'active' : '' }}"><a href="{{ route('create') }}">Create</a></li>
                            <li class="{{ Request::is('/update*') ? 'active' : '' }}"><a href="{{ route('update') }}">Update</a></li>
                         </ul>
                    </li>
                </div>
                <div class="dropdown nav-dropdown-link">
                    <li class="dropdown-toggle" type="button" id="usersDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <a>Users <span class="caret"></span></a>
                    </li>
                        <ul class="dropdown-menu" aria-labelledby="usersDropdown">
                            <li class="{{ Request::is('users*') ? 'active' : '' }}"><a href="{{ route('users.index') }}">Users</a></li>
                            <li class="{{ Request::is('roles*') ? 'active' : '' }}"><a href="{{ route('roles.index') }}">Roles</a></li>
                         </ul>
                    </li>
                </div>
                @endif
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if (Sentinel::check())
                    <li><p class="navbar-text">{{ Sentinel::getUser()->email }}</p></li>
                    <li><a href="{{ route('auth.logout') }}">Log Out</a></li>
                @else
                    <li><a href="{{ route('auth.login.form') }}">Login</a></li>
                    <li><a href="{{ route('auth.register.form') }}">Register</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>
