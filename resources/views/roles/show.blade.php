@extends('base')
@section('content')
<div class="uk-card-body uk-margin uk-margin-auto-right uk-margin-auto@s uk-width-2-3@s">
    <h2> Show Role</h2>

    <div class="uk-margin">
        <strong>Name:</strong><br>
        <span class="">{{ $role->name }}</span>
    </div>
    <div class="uk-margin">
        <strong>Permissions:</strong><br>
        @if (!empty($rolePermissions))
        @foreach ($rolePermissions as $v)
        <label class="">{{ $v->name }}</label><br>
        @endforeach
        @endif
    </div>
    <a class="uk-btn uk-margin-top uk-display-block" href="{{ route('roles.edit', ['role' => $role->id]) }}"> Edit</a>
    <a class="uk-btn uk-margin-top uk-display-block" href="{{ route('roles.index') }}"> Back</a>
</div>
@endsection