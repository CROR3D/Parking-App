@extends('shared.layout')

@section('sub-title', ' - Roles')

@section('content')
<div class="content-section p-5">
    <div class="text-right">
        <a class="btn btn-md btn-dashboard-yellow sw-content" href="{{ route('roles.create') }}">Create Role</a>
    </div>
    <h2 class="text-center mb-5">Roles</h2>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Permissions</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->slug }}</td>
                                <td>{{ implode(", ", array_keys($role->permissions)) }}</td>
                                <td>
                                    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-dashboard-info">
                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                        Edit
                                    </a>
                                    @if (! $userRoleIds->contains($role->id))
                                    <a href="{{ route('roles.destroy', $role->id) }}" class="btn btn-dashboard-yellow" data-method="delete" data-token="{{ csrf_token() }}">
                                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                        Delete
                                    </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop
