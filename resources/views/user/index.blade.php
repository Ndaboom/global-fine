@extends('base')
@section('content')
<div class="uk-card">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="uk-text-center text-center" style="padding-top: 10px;">
                <h3 class="uk-card-header uk-text-uppercase" style="padding-left: 25px;">{{ __('User Management') }}</h3>
            </div>
            @can('user-create')
            <div class="uk-text-right text-right">
                <a class="uk-button uk-button-primary uk-button-large" style="margin-right: 25px;" href="{{ route('users.create') }}"> {{ __('Create New User') }}</a>
            </div>
            @endcan
        </div>
    </div>


    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <table class="uk-table uk-table-striped users_table">
        <tr>
            <th>{{ __('No') }}</th>
            <th>{{ __('Name') }}</th>
            <th>{{ __('Email') }}</th>
            <th>{{ __('Roles') }}</th>
            <th width="280px">{{ __('Action') }}</th>
        </tr>
        @foreach ($data as $key=>$user)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                @if (!empty($user->getRoleNames()))
                @foreach ($user->getRoleNames() as $v)
                <label class="badge badge-success">{{ $v }}{{ $loop->last ? '' : ' | ' }}</label>
                @endforeach
                @endif
            </td>
            <td>
                <div class="uk-button-group">
                    <a class="uk-button uk-button-default uk-button-mini" href="{{ route('users.show', $user->id) }}">Show</a>
                    <a class="uk-button uk-button-primary uk-button-mini" href="{{ route('users.edit', $user->id) }}">Edit</a>
                    {{ Form::open(['method'=>'DELETE', 'route'=>['users.destroy', $user->id], 'style'=>'display:inline-block']) }}
                    {{ Form::submit('Delete', ['class'=>'uk-button uk-button-danger uk-button-mini']) }}
                    {{ Form::close() }}
                </div>
            </td>
        </tr>
        @endforeach
    </table>


    {{ $data->render() }}
</div>
@endsection