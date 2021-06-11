@extends('layouts.app')

@section('content')
<div class="card-header justify-content-center">
    <h4 class="card-title">Reset password</h4>
</div>
<div class="card-body p-4">
    <form method="POST" action="{{ route('password.update') }}" name="myform" class="signup_validate">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="hello@example.com" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="new-password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" class="form-control" placeholder="Password" name="password_confirmation" required autocomplete="new-password">
        </div>
        <div class="text-center mt-4">
            <button type="submit" class="btn btn-success btn-block">Reset password</button>
        </div>
    </form>
</div>
@endsection
