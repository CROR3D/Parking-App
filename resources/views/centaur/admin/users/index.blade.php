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
            @foreach ($users as $user)
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 p-3 d-inline-block">
                    <div>
                        @if (!empty($user->first_name . $user->last_name))
                            <h4>{{ $user->first_name . ' ' . $user->last_name}}</h4>
                            <p>{{ $user->email }}</p>
                        @else
                            <h4>{{ $user->email }}</h4>
                        @endif
                    </div>
                    <h4>
                        @if ($user->roles->count() > 0)
                            {{ $user->roles->implode('name', ', ') }}
                        @else
                            <em>No Assigned Role</em>
                        @endif
                    </h4>
                    <div>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-dashboard-info">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                            Edit
                        </a>
                        <a href="{{ route('users.destroy', $user->id) }}" class="btn btn-dashboard-yellow" data-method="delete" data-token="{{ csrf_token() }}">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                            Delete
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {!! $users->render() !!}
</div>
@stop
