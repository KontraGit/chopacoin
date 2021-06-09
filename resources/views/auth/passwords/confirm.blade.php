@extends('layouts.app')

@section('content')
<div class="card-header justify-content-center">
    <h4 class="card-title">Confirm password</h4>
</div>
<div class="card-body">
    <form method="POST" action="{{ route('password.confirm') }}" name="myform" class="signin_validate">
        @csrf
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-success btn-block">Confirm password</button>
        </div>
    </form>
    @if (Route::has('password.request'))
    <div class="new-account mt-3">
        <p><a class="text-primary" href="{{ route('password.request') }}">Forgot your password?</a></p>
    </div>
    @endif
</div>
@endsection
