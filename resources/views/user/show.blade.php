@extends('base')
@section('content')
<div class="uk-card-body uk-margin uk-margin-auto-right uk-margin-auto@s uk-width-2-3@s">
    <h2> Show User</h2>

    <div class="uk-margin">
        <strong>Name:</strong><br>
        <span class="">{{ $user->name }}</span>
    </div>
    <div class="uk-margin">
        <strong>Telephone:</strong><br>
        <span class="">{{ $user->phone }}</span>
    </div>
    <div class="uk-margin">
        <strong>Email:</strong><br>
        <span class="">{{ $user->email }}</span>
    </div>
    <div class="uk-margin">
        <strong>Roles:</strong><br>
        @if (!empty($user->getRoleNames()))
        @foreach ($user->getRoleNames() as $v)
        <label class="">{{ $v }}</label><br>
        @endforeach
        @endif
    </div>

    <a class="uk-btn uk-margin-top uk-display-block" href="{{ route('users.edit', ['user' => $user->id]) }}"> Edit</a>
    <a class="uk-btn uk-margin-top uk-display-block" href="{{ route('users.index') }}"> Back</a>
</div>
@endsection