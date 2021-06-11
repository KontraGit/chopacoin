@extends('layouts.site')

@section('content')
<div class="about-one section-padding">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="service-img">
                    <img src="{{asset('assets/images/about/1.jpg')}}" alt="" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="service-content m-t-50">
                    <h3>In Brief</h3>
                    <p>Founded in January of 2011, {{config('app.name')}} is a digital currency wallet and platform where
                        merchants
                        and consumers can transact with new digital currencies like bitcoin, ethereum, and
                        litecoin.
                        We're based in San Francisco, California.</p>
                    <p>Bitcoin is the world's most widely used alternative currency with a total market cap of
                        over
                        $100 billion. The bitcoin network is made up of thousands of computers run by
                        individuals
                        all over the world.</p>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="our-ceo py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ceo-content">
                    <div class="media">
                        <img src="{{asset('assets/images/avatar/6.jpg')}}" alt="" class="img-fluid mr-4 rounded-circle">
                        <div class="media-body">
                            <h3>Eric Benz</h3>
                            <span>CEO of {{config('app.name')}}</span>
                            <p class="mt-2">John Abraham has over 10 years of experience working in and around
                                Financial Technology. He has delivered innovative SaaS systems for some of
                                today's biggest institutions around payments, identity, and banking
                                infrastructure. John Abraham has been in the Blockchain space since 2011 and is
                                involved in a number of blockchain and fintech businesses both as an investor,
                                board director, and founder.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="about-two section-padding">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="service-content my-5">
                    <h3>Working at {{config('app.name')}}</h3>
                    <p>Digital currencies are changing how we use and think about money. {{config('app.name')}}, the most
                        trusted
                        company in the space, is looking for you to join our rapidly growing team.</p>
                    <a href="{{route('contact')}}" class="btn btn-primary">Get in touch</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="service-img">
                    <img src="{{asset('assets/images/about/1.jpg')}}" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
