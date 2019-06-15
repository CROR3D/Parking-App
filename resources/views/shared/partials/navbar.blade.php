<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand text-danger" href="#">{{ config('app.name') }}</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('/dashboard') ? 'active' : '' }}" href="#">Dashboard</a>
            </li>
            @if (Sentinel::check() && !Sentinel::inRole('administrator'))
            <li class="{{ Request::is('/view') ? 'active' : '' }}"><a href="{{ route('view') }}">View Parking</a></li>
            @endif
            @if (Sentinel::check() && Sentinel::inRole('administrator'))
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="parkingsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Parkings
                </a>
                <div class="dropdown-menu" aria-labelledby="parkingsDropdown">
                    <a class="dropdown-item {{ Request::is('/view') ? 'active' : '' }}" href="{{ route('view') }}">View</a>
                    <a class="dropdown-item {{ Request::is('/create*') ? 'active' : '' }}" href="{{ route('create') }}">Create</a>
                    <a class="dropdown-item {{ Request::is('/update*') ? 'active' : '' }}" href="{{ route('update') }}">Update</a>
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
                <li class="nav-item"><p class="navbar-text">Welcome, <span class="text-warning">{{ (Sentinel::getUser()->username) ? Sentinel::getUser()->username : Sentinel::getUser()->email }}</span></p></li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('auth.logout') }}">Log Out</a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('auth.login.form') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('auth.register.form') }}">Register</a>
                </li>
            @endif
        </ul>
    </div>
</nav>
