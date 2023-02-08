@extends('admin.layouts.guest')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-group">
                <div class="card p-4">
                    <div class="card-body">
                        <h1>Login</h1>
                        <p class="text-muted">Sign In to your account</p>

                        <x-auth-session-status :status="session('status')" class="mb-3" />

                        <x-input-error :messages="$errors->all()" class="mb-3" />

                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="input-group mb-3">
                                <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-envelope"></i></span></div>
                                <input class="form-control" type="email" name="email" placeholder="Email" required autofocus>
                            </div>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-lock"></i></span></div>
                                <input class="form-control" type="password" name="password" placeholder="Password" required>
                            </div>
                            <div class="form-check checkbox mb-3">
                                <input class="form-check-input" type="checkbox" id="remember_me" name="remember">
                                <label class="form-check-label" for="remember_me">Remember me</label>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <button class="btn btn-primary px-4" type="submit">Login</button>
                                </div>
                                @if (Route::has('password.request'))
                                    <div class="col-6 text-right">
                                        <a href="{{ route('password.request') }}" class="btn btn-link px-0">Forgot password?</a>
                                    </div>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
                    <div class="card-body text-center">
                        <div>
                            <h2>{{ config('app.name') }}</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

                            {{-- <button class="btn btn-lg btn-outline-light mt-3" type="button">Register Now!</button> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection