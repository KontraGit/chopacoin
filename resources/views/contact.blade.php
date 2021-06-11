@extends('layouts.site')

@section('content')
<div class="contact-form section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6">
                <div class="section-title text-center">
                    <h2>Let us hear from you directly!</h2>
                    <p>We always want to hear from you! Let us know how we can best help you and we'll do our
                        very best.
                    </p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <!-- <div class="col-xl-4">
                <div class="info-list">
                    <h5 class="mb-3">Address</h5>
                    <ul>
                        <li><i class="fa fa-map-marker"></i> Pune, India</li>
                        <li><i class="fa fa-phone"></i> (+880) 1843 666660</li>
                        <li><i class="fa fa-envelope"></i> quixlab.com@gmail.com</li>
                    </ul>
                </div>
            </div> -->
            <div class="col-xl-8">
                <form method="post" action="{{route('contact')}}">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group mb-5">

                                <!-- Label -->
                                <label for="contactName">
                                    Full name
                                </label>

                                <!-- Input -->
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="contactName" name="name" value="{{ old('name') }}" required placeholder="Full name">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group mb-5">

                                <!-- Label -->
                                <label for="contactEmail">
                                    Email
                                </label>

                                <!-- Input -->
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="contactEmail" name="email" value="{{ old('email') }}" required placeholder="hello@domain.com">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>
                        </div>
                    </div>
                    <!-- / .row -->
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group mb-7 mb-md-9">

                                <!-- Label -->
                                <label for="contactMessage">
                                    What can we help you with?
                                </label>

                                <!-- Input -->
                                <textarea class="form-control @error('message') is-invalid @enderror pt-3" id="contactMessage" rows="5" name="message" required placeholder="Tell us what we can help you with!">{{ old('message') }}</textarea>
                                @error('message')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- / .row -->
                    <div class="row justify-content-center">
                        <div class="col-auto">

                            <!-- Submit -->
                            <button type="submit" class="btn btn-primary lift">
                                Send message
                            </button>

                        </div>
                    </div>
                    <!-- / .row -->
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
