@extends('layouts.site')

@section('content')
<div class="intro">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-xl-6 col-lg-6 col-12">
                <div class="intro-content">
                    <h1>Trade with <strong class="text-primary">{{config('app.name')}}</strong>. <br> Hold, buy and sell
                        crypto
                    </h1>
                    <p>Trusted by millions since 2011 with over $800 Billion in crypto transactions.</p>
                </div>

                <div class="intro-btn">
                    @if(Route::has('register'))
                    <a href="{{route('register')}}" class="btn btn-primary">Get Started</a>
                    @endif
                    @if(Route::has('login'))
                    <a href="{{route('login')}}" class="btn btn-outline-primary">Sign In</a>
                    @endif
                </div>
            </div>
            <div class="col-xl-5 col-lg-6 col-12">
                <div class="intro-form-exchange">
                    <form method="post" action="{{route('send')}}" class="currency_validate">
                        @csrf
                        <div class="form-group">
                            <label class="mr-sm-2">Cryptocurrency</label>
                            <div class="input-group mb-3">
                                <select id="send-currency" class="form-control @error('currency') is-invalid @enderror" name="currency" value="{{ old('currency') }}" required>
                                    <option data-display="Bitcoin" value="bitcoin">Bitcoin
                                    </option>
                                </select>
                                @error('currency')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="mr-sm-2">Amount</label>
                            <div class="input-group">
                                <div class="input-group">
                                    <input type="text" id="send-val" class="form-control @error('value') is-invalid @enderror" onkeypress="return isNumberKey(this, event);" name="value" value="{{ old('value') }}" required placeholder="0.0214 BTC">
                                    <input type="text" id="send-amt" class="form-control @error('amount') is-invalid @enderror" onkeypress="return isNumberKey(this, event);" name="amount" value="{{ old('amount') }}" required placeholder="125.00 USD">
                                </div>
                                @error('value')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                @error('amount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-success btn-block">
                            Exchange Now
                            <i class="la la-arrow-right"></i>
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="price-grid section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="market-table">
                    <div class="table-responsive">
                        <table class="table mb-0 table-responsive-sm">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Change</th>
                                    <th colspan="2"">Start Trading Crypto</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1
                                    </td>
                                    <td class="coin_icon">
                                        <i class="cc BTC"></i>
                                        <span>Bitcoin <b>BTC</b></span>
                                    </td>

                                    <td>
                                        USD 680,175.06
                                    </td>
                                    <td>
                                        <span class="text-success">+1.13%</span>
                                    </td>
                                    <td><a href="{{route('exchange')}}" class="btn btn-danger text-white">Sell</a></td>
                                    <td><a href="#" class="btn btn-success">Buy</a></td>
                                </tr>
                                <tr>
                                    <td>2
                                    </td>
                                    <td class="coin_icon">
                                        <i class="cc ETH"></i>
                                        <span>Ethereum <b>ETH</b></span>
                                    </td>

                                    <td>
                                        USD 680,175.06
                                    </td>
                                    <td>
                                        <span class="text-success">+1.13%</span>
                                    </td>
                                    <td><a href="{{route('exchange')}}" class="btn btn-danger text-white">Sell</a></td>
                                    <td><a href="#" class="btn btn-success">Buy</a></td>
                                </tr>
                                <tr>
                                    <td>3
                                    </td>
                                    <td class="coin_icon">
                                        <i class="cc DASH"></i>
                                        <span>Dogecoin <b>Dodge</b></span>
                                    </td>

                                    <td>
                                        USD 680,175.06
                                    </td>
                                    <td>
                                        <span class="text-success">+1.13%</span>
                                    </td>
                                    <td><a href="{{route('exchange')}}" class="btn btn-danger text-white">Sell</a></td>
                                    <td><a href="#" class="btn btn-success">Buy</a></td>
                                </tr>
                                <tr>
                                    <td>4
                                    </td>
                                    <td class="coin_icon">
                                        <i class="cc USDT"></i>
                                        <span>Tether <b>USDT</b></span>
                                    </td>

                                    <td>
                                        USD 680,175.06
                                    </td>
                                    <td>
                                        <span class="text-success">+1.13%</span>
                                    </td>
                                    <td><a href="{{route('exchange')}}" class="btn btn-danger text-white">Sell</a></td>
                                    <td><a href="#" class="btn btn-success">Buy</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="getstart section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8">
                <div class="section-title text-center">
                    <h2>Get started in a few minutes</h2>
                    <p>{{config('app.name')}} supports a variety of the most popular digital currencies.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 py-3">
                <div class="getstart-content">
                    <span><i class="la la-user-plus"></i></span>
                    <h3>Create an account</h3>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 py-3">
                <div class="getstart-content">
                    <span><i class="la la-bank"></i></span>
                    <h3>Link your bank account</h3>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 py-3">
                <div class="getstart-content">
                    <span><i class="la la-exchange"></i></span>
                    <h3>Start buying & selling</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="portfolio section-padding" data-scroll-index="2">
    <div class="container">
        <div class="row py-lg-5 justify-content-center">
            <div class="col-xl-7">
                <div class="section-title text-center">
                    <h2>Create your cryptocurrency portfolio today</h2>
                    <p>{{config('app.name')}} has a variety of features that make it the best place to start trading</p>
                </div>
            </div>
        </div>
        <div class="row align-items-center justify-content-between">
            <div class="col-xl-7 col-lg-6">
                <div class="portfolio_list">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="media">
                                <span class="port-icon"> <i class="la la-bar-chart"></i></span>
                                <div class="media-body">
                                    <h4>Buy, sell, and trade on the go</h4>
                                    <p>Manage your holdings from your mobile device
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="media">
                                <span class="port-icon"> <i class="la la-calendar-check-o"></i></span>
                                <div class="media-body">
                                    <h4>Take control of your wealth</h4>
                                    <p>Rest assured you (and only you) have access to your funds
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="media">
                                <span class="port-icon"> <i class="la la-lock"></i></span>
                                <div class="media-body">
                                    <h4>Move money freely</h4>
                                    <p>Send and receive cryptocurrencies anytime, anywhere - no questions asked
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="media">
                                <span class="port-icon"> <i class="la la-mobile"></i></span>
                                <div class="media-body">
                                    <h4>24/7 chat support</h4>
                                    <p>Chat with customer support directly in the Exchange, anytime.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-5 col-lg-6">
                <div class="portfolio_img">
                    <img src="{{asset('assets/images/portfolio.png')}}" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="trade-app section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6">
                <div class="section-title text-center">
                    <h2>Trade. Anywhere</h2>
                    <p> All of our products are ready to go, easy to use and offer great value to any kind of
                        business
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-12">
                <div class="card trade-app-content">
                    <div class="card-body">
                        <span><i class="la la-shield"></i></span>
                        <h4 class="card-title">Secure storage</h4>
                        <p>We store the vast majority of the digital assets in secure offline storage.</p>

                        <a href="{{url('/')}}"> Know More <i class="la la-arrow-right"></i> </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-12">
                <div class="card trade-app-content">
                    <div class="card-body">
                        <span><i class="la la-award"></i></span>
                        <h4 class="card-title">Industry best practices</h4>
                        <p>{{config('app.name')}} supports a variety of the most popular digital currencies.
                        </p>

                        <a href="{{url('/')}}"> Know More <i class="la la-arrow-right"></i> </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-12">
                <div class="card trade-app-content">
                    <div class="card-body">
                        <span><i class="la la-lock"></i></span>
                        <h4 class="card-title">Protected by insurance</h4>
                        <p>Cryptocurrency stored on our servers is covered by our insurance policy.</p>

                        <a href="{{url('/')}}"> Know More <i class="la la-arrow-right"></i> </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="testimonial bg-default">
    <div class="section-padding d-block d-xl-none">
        <div class="container">
            <div class="row">
                <div class="col-xl-4">
                    <div class="section-title mb-0">
                        <h3>Earn up to $25 worth of crypto</h3>
                        <p>Discover how specific cryptocurrencies work — and get a bit of each crypto to try out for yourself.</p>
                        @if(Route::has('register'))
                        <a href="{{route('register')}}" class="btn btn-primary">Get Started</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="banner section-padding d-none d-xl-block">
        <div class="container">
            <div class="row">
                <div class="col-xl-4">
                    <div class="section-title mb-0">
                        <h3>Earn up to $25 worth of crypto</h3>
                        <p>Discover how specific cryptocurrencies work — and get a bit of each crypto to try out for yourself.</p>
                        @if(Route::has('register'))
                        <a href="{{route('register')}}" class="btn btn-primary">Get Started</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="promo section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8">
                <div class="section-title text-center">
                    <h2>The most trusted cryptocurrency platform</h2>
                    <p> Here are a few reasons why you should choose {{config('app.name')}}
                    </p>
                </div>
            </div>
        </div>
        <div class="row align-items-center py-5">
            <div class="col-xl-4 col-lg-4 col-md-4">
                <div class="promo-content">
                    <div class="promo-content-img">
                        <img class="img-fluid" src="{{asset('assets/images/svg/protect.svg')}}" alt="">
                    </div>
                    <h3>Secure storage </h3>
                    <p>We store the vast majority of the digital assets in secure offline storage.</p>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4">
                <div class="promo-content">
                    <div class="promo-content-img">
                        <img class="img-fluid" src="{{asset('assets/images/svg/cyber.svg')}}" alt="">
                    </div>
                    <h3>Protected by insurance</h3>
                    <p>Cryptocurrency stored on our servers is covered by our insurance policy.</p>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4">
                <div class="promo-content">
                    <div class="promo-content-img">
                        <img class="img-fluid" src="{{asset('assets/images/svg/finance.svg')}}" alt="">
                    </div>
                    <h3>Industry best practices</h3>
                    <p>{{config('app.name')}} supports a variety of the most popular digital currencies.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="appss section-padding">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-xl-7 col-lg-6 col-md-6">
                <div class="appss-content">
                    <h2>The secure app to store crypto yourself</h2>
                    <ul>
                        <li><i class="la la-check"></i> All your digital assets in one place</li>
                        <li><i class="la la-check"></i> Use Decentralized Apps</li>
                        <li><i class="la la-check"></i> Pay friends, not addresses</li>
                    </ul>
                    <div class="mt-4">
                        <a href="#" class="btn btn-primary my-1 waves-effect">
                            <img src="{{asset('assets/images/android.svg')}}" alt="">
                        </a>
                        <a href="#" class="btn btn-primary my-1 waves-effect">
                            <img src="{{asset('assets/images/apple.svg')}}" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-5 col-lg-6 col-md-6">
                <div class="appss-img">
                    <img class="img-fluid" src="{{asset('assets/images/app.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <div class="blog section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6">
                <div class="section-title text-center">
                    <h2>Blog</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-12">
                <div class="blog-grid">
                    <div class="card">
                        <img class="img-fluid" src="{{asset('assets/images/blog/1.jpg')}}" alt="">
                        <div class="card-body">
                            <a href="blog-single.html">
                                <h4 class="card-title">Why does Litecoin need MimbleWimble?</h4>
                            </a>
                            <p class="card-text">Cras chinwag brown bread Eaton cracking goal so I said a load
                                of
                                old tosh baking cakes.!</p>
                        </div>
                        <div class="card-footer">
                            <div class="meta-info">
                                <a href="#" class="author"><img src="{{asset('assets/images/avatar/5.jpg')}}" alt=""> Admin</a>
                                <a href="#" class="post-date"><i class="la la-calendar"></i> 31 July, 2019</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-12">
                <div class="blog-grid">
                    <div class="card">
                        <img class="img-fluid" src="{{asset('assets/images/blog/2.jpg')}}" alt="">
                        <div class="card-body">
                            <a href="blog-single.html">
                                <h4 class="card-title">How to securely store your HD wallet seeds?</h4>
                            </a>
                            <p class="card-text">Cras chinwag brown bread Eaton cracking goal so I said a load
                                of
                                old tosh baking cakes.!</p>
                        </div>
                        <div class="card-footer">
                            <div class="meta-info">
                                <a href="#" class="author"><img src="{{asset('assets/images/avatar/6.jpg')}}" alt=""> Admin</a>
                                <a href="#" class="post-date"><i class="la la-calendar"></i> 31 July, 2019</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-12">
                <div class="blog-grid">
                    <div class="card">
                        <img class="img-fluid" src="{{asset('assets/images/blog/3.jpg')}}" alt="">
                        <div class="card-body">
                            <a href="blog-single.html">
                                <h4 class="card-title">Exclusive Interview With Xinxi Wang Of Litecoin</h4>
                            </a>
                            <p class="card-text">Cras chinwag brown bread Eaton cracking goal so I said a load
                                of
                                old tosh baking cakes.!</p>
                        </div>
                        <div class="card-footer">
                            <div class="meta-info">
                                <a href="#" class="author"><img src="{{asset('assets/images/avatar/7.jpg')}}" alt=""> Admin</a>
                                <a href="#" class="post-date"><i class="la la-calendar"></i> 31 July, 2019</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->


<div class="get-touch section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6">
                <div class="section-title">
                    <h2>Get in touch. Stay in touch.</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="get-touch-content">
                    <div class="media">
                        <span><i class="fa fa-shield"></i></span>
                        <div class="media-body">
                            <h4>24 / 7 Support</h4>
                            <p>Got a problem? Just get in touch. Our support team is available 24/7.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="get-touch-content">
                    <div class="media">
                        <span><i class="fa fa-cubes"></i></span>
                        <div class="media-body">
                            <h4>{{config('app.name')}} Blog</h4>
                            <p>News and updates from the world’s leading cryptocurrency exchange.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="get-touch-content">
                    <div class="media">
                        <span><i class="fa fa-certificate"></i></span>
                        <div class="media-body">
                            <h4>Careers</h4>
                            <p>Help build the future of technology. Start your new career at {{config('app.name')}}.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="get-touch-content">
                    <div class="media">
                        <span><i class="fa fa-life-ring"></i></span>
                        <div class="media-body">
                            <h4>Community</h4>
                            <p>{{config('app.name')}} is global. Join the discussion in our worldwide communities.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
