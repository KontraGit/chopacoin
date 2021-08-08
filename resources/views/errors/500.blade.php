@extends('layouts.site')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <h1 class="display-1 font-weight-bolder">500</h1>
                    <h3>Internal Server Error</h3>
                    <p class="card-text">The server encountered an internal error or misconfiguration <br> and was unable to complete your request.</p>
                    <a href="{{url()->previous()}}" class="btn btn-primary btn-lg">Try Again</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
