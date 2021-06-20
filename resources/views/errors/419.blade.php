@extends('layouts.site')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <h1 class="display-1 font-weight-bolder">401</h1>
                    <h3>Session Expired</h3>
                    <p class="card-text">Sorry, your session has expired. <br> Please referesh and try again.</p>
                    <a href="{{url('/')}}" class="btn btn-primary btn-lg">Go Home</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
