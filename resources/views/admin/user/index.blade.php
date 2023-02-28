@extends('admin.layouts.app')
@section('content')
<x-forms.filter :search_placeholder="'Name, Email'" />
<div class="card">
    <div class="card-header">
        <strong>List User</strong>
        <div class="card-header-actions">
            <a class="card-header-action btn-setting" href="{{ route('users.create') }}">
                <i class="fa fa-plus"></i>
                Create User
            </a>
        </div>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Registered</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="@if($user->is_admin === 1) text-danger @endif">
                            {{ $user->name }}
                        </td>
                        <td>
                            {{ $user->email }}
                        </td>
                        <td>
                            {{ $user->created_at->format('Y-m-d') }}
                        </td>
                        <td>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning mb-1">Edit</a>
                            <form method="post" action="{{ route('users.destroy', $user->id) }}" class="d-inline mb-1">
                                @csrf
                                <button type="button" class="btn btn-danger" onclick="confirmSwalAlert(this)">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $users->withQueryString()->links() }}
    </div>
</div>
@endsection