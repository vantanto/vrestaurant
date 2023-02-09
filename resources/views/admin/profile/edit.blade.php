@extends('admin.layouts.app')
@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Profile
        </h2>
    </x-slot>
    
    @include('admin.profile.partials.update-profile-information-form')

    @include('admin.profile.partials.update-password-form')

@endsection
