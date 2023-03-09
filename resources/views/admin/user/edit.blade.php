@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header"><strong>Edit User</strong></div>
            <div class="card-body">
                <form id="mainForm" method="post" action="{{ route('users.update', $user->id) }}">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control" required value="{{ $user->name }}">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <label class="form-control">{{ $user->email }}</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="password">New Password (Optional)</label>
                            <input type="password" id="password" name="password" class="form-control">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="password_confirmation">Confirm New Password (Optional)</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>mainFormSubmit();</script>
@endpush