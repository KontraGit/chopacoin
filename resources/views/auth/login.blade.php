@extends('layouts.app')

@section('content')
<div class="card-header justify-content-center">
    <h4 class="card-title">Sign in</h4>
</div>
<div class="card-body">
    <form method="POST" action="{{ route('login') }}" name="myform" class="signin_validate">
        @csrf
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="hello@example.com" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-row d-flex justify-content-between mt-4 mb-2">
            <div class="form-group mb-0">
                <label class="toggle">
                    <input class="toggle-checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <span class="toggle-switch"></span>
                    <span class="toggle-label">Remember me</span>
                </label>
            </div>
            @if (Route::has('password.request'))
            <div class="form-group mb-0">
                <a href="{{ route('password.request') }}">Forgot Password?</a>
            </div>
            @endif
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-success btn-block">Sign in</button>
        </div>
    </form>
    @if (Route::has('register'))
    <div class="new-account mt-3">
        <p>Don't have an account? <a class="text-primary" href="{{ route('register') }}">Sign up</a></p>
    </div>
    @endif
</div>
@endsection
