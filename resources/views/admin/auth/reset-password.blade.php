@extends('admin.layouts.guest')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card mx-4">
                <div class="card-body p-4">
                    <h3 class="mb-3">Reset Password?</h3>

                    <x-auth-session-status :status="session('status')" class="mb-3" />

                    <x-input-error :messages="$errors->all()" class="mb-3" />

                    <form method="POST" action="{{ route('password.store') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <div class="input-group mb-3">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-envelope"></i></span></div>
                            <input class="form-control" type="email" name="email" placeholder="Email" 
                                value="{{ old('email', $request->email) }}" required autofocus>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-lock"></i></span></div>
                            <input class="form-control" type="password" name="password" placeholder="Password" 
                                required>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-lock"></i></span></div>
                            <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm Password" 
                                required>
                        </div>
                        <button class="btn btn-block btn-primary" type="submit">Reset Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection