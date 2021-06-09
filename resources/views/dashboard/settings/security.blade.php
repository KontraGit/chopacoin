@extends('layouts.app')

@section('content')
<div class="row">
    @include('layouts.side')
    <div class="col-xl-9 col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Security</h4>
            </div>
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-12">
                        <form action="{{route('update-password')}}" method="post">
                            @csrf
                            <div class="form-row align-items-center">
                                <div class="form-group col-xl-6">
                                    <label class="mr-sm-2">Current Password</label>
                                    <input type="password" class="form-control @error('current_password') is-invalid @enderror" placeholder="**********" name="current_password" value="{{ old('current_password') }}">
                                    @error('current_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-xl-6">
                                    <label class="mr-sm-2">New Password</label>
                                    <input type="password" class="form-control @error('new_password') is-invalid @enderror" placeholder="**********" name="new_password" value="{{ old('new_password') }}">
                                    @error('new_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-xl-6">
                                    <label class="mr-sm-2">Confirm Password</label>
                                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="**********" name="password_confirmation">
                                    <button class="btn btn-success mt-4">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- <div class="col-xl-4">
                        <div class="id_card">
                            <img src="{{asset('assets/images/id.png')}}" alt="" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="id_info">
                            <h3>{{auth()->user()->name}} </h3>
                            <p class="mb-1 mt-3">ID: 0024 5687 2254 3698 </p>
                            <p class="mb-1">Status: <span class="font-weight-bold">Verified</span></p>
                            <a href="verify-step-2.html" class="btn btn-success mt-3">New ID</a>
                        </div>
                    </div> -->
                </div>
                <!-- <div class="row">
                    <div class="col-xl-12">
                        <div class="phone_verify">
                            <h4 class="card-title mb-3">Password</h4>
                            <form action="{{route('update-password')}}" method="post">
                                @csrf
                                <div class="form-row align-items-center">
                                    <div class="form-group col-xl-6">
                                        <label class="mr-sm-2">Current Password</label>
                                        <input type="password" class="form-control @error('current_password') is-invalid @enderror" placeholder="**********" name="current_password" value="{{ old('current_password') }}">
                                        @error('current_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-xl-6">
                                        <label class="mr-sm-2">New Password</label>
                                        <input type="password" class="form-control @error('new_password') is-invalid @enderror" placeholder="**********" name="new_password" value="{{ old('new_password') }}">
                                        @error('new_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-xl-6">
                                        <label class="mr-sm-2">Confirm Password</label>
                                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="**********" name="password_confirmation">
                                        <button class="btn btn-success mt-4">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>
@endsection
