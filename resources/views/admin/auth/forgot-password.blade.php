@extends('admin.layouts.guest')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card mx-4">
                <div class="card-body text-center rounded pb-0">
                    <h2>
                        <a href="{{ route('dashboard') }}" class="nav-link p-0">
                            {{ config('app.name') }}
                        </a>
                    </h2>
                </div>
                <div class="card-body p-4">
                    <h3>Forgot your password?</h3>
                    <p class="text-muted">No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>

                    <x-auth-session-status :status="session('status')" class="mb-3" />

                    <x-input-error :messages="$errors->all()" class="mb-3" />

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="input-group mb-4">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-envelope"></i></span></div>
                            <input class="form-control" type="email" name="email" placeholder="Email" required>
                        </div>
                        <button class="btn btn-block btn-primary" type="submit">Email Password Reset Link</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection