@extends('base')
@section('title', __('Update User'))
@section('content')
@if (count($errors) > 0)
<div class="uk-margin uk-text-warning">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

{{ Form::model($user, ['method' => 'PATCH', 'route' => ['users.update', $user->id], 'class' => 'max-w-7xl mx-auto py-10 sm:px-6 lg:px-8']) }}
<div class="md:grid md:grid-cols-3 md:gap-6">
    <div class="md:col-span-1">
        <div class="px-4 sm:px-0">
            <h3 class="text-lg font-medium text-gray-900">@yield('title')</h3>

            <p class="mt-1 text-sm text-gray-600">
                Update And Configure User.
            </p>
        </div>
    </div>
    <div class="px-4 py-5 bg-white border-left sm:p-6 sm:rounded-tl-md sm:rounded-tr-md md:col-span-1">
        <div class="col-span-6 sm:col-span-4 uk-margin-bottom">
            <label class="block font-medium text-sm text-gray-700" for="name">
                {{ __('Name') }}
            </label>
            {{ Form::text('name', null, ['placeholder' => 'Name', 'class' => 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full']) }}
        </div>
        <div class="col-span-6 sm:col-span-4 uk-margin-bottom">
            <label class="block font-medium text-sm text-gray-700" for="name">
                {{ __('Email') }}
            </label>
            {{ Form::text('email', null, ['placeholder' => 'Email', 'class' => 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full']) }}
        </div>
        <div class="col-span-6 sm:col-span-4 uk-margin-bottom">
            <label class="block font-medium text-sm text-gray-700" for="name">
                {{ __('Password') }}
            </label>
            {{ Form::password('password', ['placeholder' => 'Password', 'class' => 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full']) }}
        </div>
        <div class="col-span-6 sm:col-span-4 uk-margin-bottom">
            <label class="block font-medium text-sm text-gray-700" for="name">
                {{ __('Confirm Password') }}
            </label>
            {{ Form::password('confirm-password', ['placeholder' => 'Confirm Password', 'class' => 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full']) }}
        </div>
        <div class="col-span-6 sm:col-span-4 uk-margin-bottom">
            <label class="block font-medium text-sm text-gray-700" for="name">
                {{ __('Roles') }}
            </label>
            {{ Form::select('roles', $roles, $userRole, ['class' => 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full']) }}
        </div>
    </div>

    <div class="flex items-center md:col-span-3 justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">{{ __('Update User') }}</button>
    </div>
</div>
{{ Form::close() }}
@push('styles')
<style>
    .border-left {
        border-left: 1px solid #eee;
    }
</style>
@endpush
@endsection