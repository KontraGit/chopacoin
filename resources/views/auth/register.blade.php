@extends('layouts.app')

@section('content')
<div class="card-header justify-content-center">
    <h4 class="card-title">Sign up your account</h4>
</div>
<div class="card-body">
    <form method="POST" action="{{ route('register') }}" name="myform" class="signup_validate">
        @csrf
        <div class="form-group">
            <label>Full Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="First Name Surname" name="name" value="{{ old('name') }}" required autocomplete="name">
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="hello@example.com" name="email" value="{{ old('email') }}" required autocomplete="email">
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
        <div class="text-center mt-4">
            <button type="submit" class="btn btn-success btn-block">Sign up</button>
        </div>
    </form>
    @if(Route::has('login'))
    <div class="new-account mt-3">
        <p>Already have an account? <a class="text-primary" href="{{route('login')}}">Sign in</a>
        </p>
    </div>
    @endif
</div>
@endsection
