@extends('layouts.site')

@section('content')
<div class="intro-video section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8">
                <div class="intro-video-play">
                    <div class="play-btn">
                        <a><i class="fa fa-play"></i></a>
                    </div>
                </div>
                <div class="intro-video-content text-center mt-5">
                    <h2>We saved a seat for you</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="career section-padding">
    <div class="container">
        <div class="row align-items-center justify-content-between py-5">
            <div class="col-xl-5">
                <div class="career-content-img">
                    <img class="img-fluid" src="{{asset('assets/images/about/1.jpg')}}" alt="">
                </div>
            </div>
            <div class="col-xl-6">
                <div class="career-content py-5">
                    <h3>Working at {{config('app.name')}}</h3>
                    <p>We’ve taken a huge challenge and made it into our mission: To create an open financial
                        system
                        for the world. To achieve this, we are building a team of smart, creative, passionate
                        optimists, the kind of people who see opportunity
                        where others see roadblocks. If this sounds like you, <a href="#">check out our open
                            roles.</a></p>
                </div>
            </div>
        </div>
        <div class="row align-items-center justify-content-between py-5">
            <div class="col-xl-6">
                <div class="career-content py-5">
                    <h3>Our values</h3>
                    <p>Our values inform our behavior and the choices we make every day. As a result, our
                        culture is
                        a model of the world we’re trying to build: transparent, joyful, curious, and
                        fast-moving.
                        Our values are a large part of why {{config('app.name')}}
                        is a great place to work, and why we’ve been successful. They are much more than words
                        to us
                        (and we have the emojis to prove it).</p>
                </div>
            </div>
            <div class="col-xl-5">
                <div class="career-content-img">
                    <img class="img-fluid" src="{{asset('assets/images/blog/1.jpg')}}" alt="">
                </div>
            </div>
        </div>
        <div class="row align-items-center justify-content-between py-5">
            <div class="col-xl-5">
                <div class="career-content-img">
                    <img class="img-fluid" src="{{asset('assets/images/bg/2.jpg')}}" alt="">
                </div>
            </div>
            <div class="col-xl-6">
                <div class="career-content py-5">
                    <h3>Our mission</h3>
                    <p>We think achieving our mission is the highest leverage way to bring about more economic
                        freedom, innovation, efficiency, and equality of opportunity in the world. Each member
                        of
                        our team—every engineer, designer, kitchen team member,
                        lawyer, writer, support coordinator, recruiter, and product manager—plays an important
                        role
                        in helping us achieve our mission.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="choose-team section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6">
                <div class="section-title text-center">
                    <h2>Choose your team</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-xxl-12">
                <div id="accordion-faq" class="accordion">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mb-0 collapsed c-pointer" data-toggle="collapse" data-target="#collapseOne1">
                                <i class="fa"></i>Business Development & Sales
                            </h4>
                        </div>
                        <div id="collapseOne1" class="collapse show" data-parent="#accordion-faq">
                            <div class="card-body">
                                <div>
                                    <h5 class="text-primary">Business Development Director</h5>
                                    <span>San Francisco, CA</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mb-0 collapsed c-pointer" data-toggle="collapse" data-target="#collapseTwo2">
                                <i class="fa"></i>Engineering - Frontend
                            </h4>
                        </div>
                        <div id="collapseTwo2" class="collapse" data-parent="#accordion-faq">
                            <div class="card-body">
                                <div>
                                    <h5 class="text-primary">Frontend Engineer, Identity</h5>
                                    <span>San Francisco, CA</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mb-0 collapsed c-pointer" data-toggle="collapse" data-target="#collapseThree3">
                                <i class="fa"></i>Marketing & Communications
                            </h4>
                        </div>
                        <div id="collapseThree3" class="collapse" data-parent="#accordion-faq">
                            <div class="card-body">
                                <div>
                                    <h5 class="text-primary">Head of Product and Performance Marketing</h5>
                                    <span>San Francisco, CA</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
