@extends('layouts.app')

@section('content')
<div class="card-header justify-content-center">
    <h4 class="card-title">Reset password</h4>
</div>
<div class="card-body p-4">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <form method="POST" action="{{ route('password.email') }}">
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
        <div class="text-center">
            <button type="submit" class="btn btn-success btn-block">Reset</button>
        </div>
    </form>
    @if (Route::has('login'))
    <div class="new-account mt-3">
        <p class="mb-1">Remembered Password? </p>
        <a class="text-primary" href="{{route('login')}}">Sign in </a>
    </div>
    @endif
</div>
@endsection
