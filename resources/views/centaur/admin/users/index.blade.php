@extends('shared.layout')

@section('sub-title', ' - Users')

@section('content')
<div class="content-section p-5">
    <div class="text-right">
        <a class="btn btn-md btn-dashboard-yellow sw-content" href="{{ route('users.create') }}">Create User</a>
    </div>
    <h2 class="text-center mb-5">Users</h2>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            @foreach ($adminList as $admin)
                <h4 class="text-center text-warning p-1">- Administrators -</h4>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 px-3 py-5 d-inline-block">
                    <div>
                        @if (!empty($admin->first_name . $admin->last_name))
                            <h4>{{ $admin->first_name . ' ' . $admin->last_name}}</h4>
                            <p>{{ $admin->email }}</p>
                        @else
                            <h4>{{ $admin->email }}</h4>
                        @endif
                    </div>
                    <h4>
                        @if ($admin->roles->count() > 0)
                            {{ $admin->roles->implode('name', ', ') }}
                        @else
                            <em>No Assigned Role</em>
                        @endif
                    </h4>
                    <div>
                        <a href="{{ route('users.edit', $admin->id) }}" class="btn btn-dashboard-info">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                            Edit
                        </a>
                        <a href="{{ route('users.destroy', $admin->id) }}" class="btn btn-dashboard-yellow" data-method="delete" data-token="{{ csrf_token() }}">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                            Delete
                        </a>
                    </div>
                </div>
            @endforeach
            @foreach ($moderatorList as $moderator)
                <h4 class="text-center text-warning p-1">- Moderators -</h4>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 px-3 py-5 d-inline-block">
                    <div>
                        @if (!empty($moderator->first_name . $moderator->last_name))
                            <h4>{{ $moderator->first_name . ' ' . $moderator->last_name}}</h4>
                            <p>{{ $moderator->email }}</p>
                        @else
                            <h4>{{ $moderator->email }}</h4>
                        @endif
                    </div>
                    <h4>
                        @if ($moderator->roles->count() > 0)
                            {{ $moderator->roles->implode('name', ', ') }}
                        @else
                            <em>No Assigned Role</em>
                        @endif
                    </h4>
                    <div>
                        <a href="{{ route('users.edit', $moderator->id) }}" class="btn btn-dashboard-info">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                            Edit
                        </a>
                        <a href="{{ route('users.destroy', $moderator->id) }}" class="btn btn-dashboard-yellow" data-method="delete" data-token="{{ csrf_token() }}">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                            Delete
                        </a>
                    </div>
                </div>
            @endforeach
            @foreach ($subList as $subscriber)
                <h4 class="text-center text-warning p-1">- Subscribers -</h4>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 px-3 py-5 d-inline-block">
                    <div>
                        @if (!empty($subscriber->first_name . $subscriber->last_name))
                            <h4>{{ $subscriber->first_name . ' ' . $subscriber->last_name}}</h4>
                            <p>{{ $subscriber->email }}</p>
                        @else
                            <h4>{{ $subscriber->email }}</h4>
                        @endif
                    </div>
                    <h4>
                        @if ($subscriber->roles->count() > 0)
                            {{ $subscriber->roles->implode('name', ', ') }}
                        @else
                            <em>No Assigned Role</em>
                        @endif
                    </h4>
                    <div>
                        <a href="{{ route('users.edit', $subscriber->id) }}" class="btn btn-dashboard-info">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                            Edit
                        </a>
                        <a href="{{ route('users.destroy', $subscriber->id) }}" class="btn btn-dashboard-yellow" data-method="delete" data-token="{{ csrf_token() }}">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                            Delete
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@stop
