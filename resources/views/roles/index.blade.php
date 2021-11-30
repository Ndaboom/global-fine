@extends('base')
@section('content')
<div class="uk-card">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="uk-text-center" style="padding-top: 10px;">
                <h3 class="uk-card-header uk-text-uppercase" style="padding-left: 25px;">Role Management</h3>
            </div>
            @can('role-create')
            <div class="uk-text-right">
                <a class="uk-button uk-button-primary uk-button-large" href="{{ route('roles.create') }}" style="padding-left: 25px;"> Create
                    New
                    Role</a>
            </div>
            @endcan
        </div>
    </div>


    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif


    <table class="uk-table uk-table-striped roles_table">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
        @foreach ($roles as $key => $role)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $role->name }}</td>
            <td>
                <div class="uk-button-group">
                    <a class="uk-button uk-button-default uk-button-mini" href="{{ route('roles.show', $role->id) }}">Show</a>
                    @can('role-create')
                    <a class="uk-button uk-button-primary uk-button-miniG" href="{{ route('roles.edit', $role->id) }}">Edit</a>

                    {{ Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'style' => 'display:inline-block']) }}
                    {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) }}
                    {{ Form::close() }}
                    @endcan
                </div>
            </td>
        </tr>
        @endforeach
    </table>


    {{ $roles->render() }}
</div>
@endsection