<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <script data-ad-client="ca-pub-4480849597660479" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="best wallet, bitcoin cash wallet, bitcoin wallet, btc wallet, buy bitcoin, buy cryptocurrency, coin wallet, crypto wallet, cryptocurrency wallet, digital wallet, ether wallet, ethereum wallet, safest wallet, secure crypto wallet, usd to bitcoin, {{config('app.name')}}s, venture, fund, {{config('app.name')}} ventures, {{config('app.name')}} fund" />
    <meta name="description" content="{{config('app.name')}}.com is the most popular place to securely buy, store, and trade Bitcoin, Ethereum, and other top cryptocurrencies. " />

    <title>{{config('app.name')}} - The Most Trusted Crypto Company</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/favicon.png')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/nice-select/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/owl-carousel/css/owl.theme.default.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/owl-carousel/css/owl.carousel.min.css')}}">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">

    <script src="{{asset('assets/js/sweetalert.min.js')}}"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=G-BQ4PHB6J4Q"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-BQ4PHB6J4Q');
    </script> -->
</head>

<body>
    @include('sweet::alert')
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>

    <div id="main-wrapper">

        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="navigation">
                            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                                <a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('assets/images/logo.png')}}" alt=""></a>
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                                    <ul class="navbar-nav">

                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('/')}}">Home
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('price')}}">Price</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('wallet')}}">Wallet</a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Company
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{url('about')}}">About Us</a>
                                                <a class="dropdown-item" href="{{url('career')}}">Career</a>
                                                <a class="dropdown-item" href="{{url('terms')}}">Terms of Use</a>
                                                <a class="dropdown-item" href="{{url('privacy')}}">Privacy Policy</a>
                                            </div>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Support
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{url('contact')}}">Contact us</a>
                                                <a class="dropdown-item" href="https://coinchoppa.tawk.help" target="_blank">Help Desk</a>
                                                <a class="dropdown-item" href="{{url('faqs')}}">FAQs</a>
                                            </div>
                                        </li>
                                        <li class="nav-item mr-2">
                                            <a class="nav-link" href="{{route('dashboard')}}">Dashboard</a>
                                        </li>

                                    </ul>
                                </div>
                                <div class="signin-btn">
                                    <a class="btn btn-primary" href="{{route('exchange')}}">Buy</a>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @yield('content')
        <div class="bottom section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="bottom-logo">
                            <img class="pb-3" src="{{asset('assets/images/logo-white.png')}}" alt="" width="200">

                            <p>{{config('app.name')}} is the easiest place to buy and sell cryptocurrency. Sign up and get started today.</p>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
                        <div class="bottom-widget">
                            <h4 class="widget-title">Company</h4>
                            <ul>
                                <li><a href="{{url('about')}}">About Us</a></li>
                                <li><a href="{{url('career')}}">Career</a></li>
                                <li><a href="{{url('terms')}}">Terms of Use</a></li>
                                <li><a href="{{url('privacy')}}">Privacy Policy</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
                        <div class="bottom-widget">
                            <h4 class="widget-title">Support</h4>
                            <ul>
                                <li><a href="{{url('contact')}}">Contact Us</a></li>
                                <li><a href="https://coinchoppa.tawk.help" target="_blank">Help Desk</a></li>
                                <li><a href="{{url('faqs')}}">FAQs</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="bottom-widget">
                            <h4 class="widget-title">Exchange Pair</h4>
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                    <ul>
                                        <li><a href="{{route('exchange')}}">ETH to BTC</a></li>
                                        <li><a href="{{route('exchange')}}">BTC to ETH</a></li>
                                        <li><a href="{{route('exchange')}}">LTC to ETH</a></li>
                                        <li><a href="{{route('exchange')}}">USDT to BTC</a></li>
                                    </ul>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                    <ul>
                                        <li><a href="{{route('exchange')}}">BTC to USDT</a></li>
                                        <li><a href="{{route('exchange')}}">LTC to BTC</a></li>
                                        <li><a href="{{route('exchange')}}">XMR to BTC</a></li>
                                        <li><a href="{{route('exchange')}}">ETC to DASH</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="copyright">
                            <p>© Copyright {{date("Y")}} <a href="{{url('/')}}">{{config('app.name')}}</a>. All rights reserved</p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="footer-social">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('assets/js/global.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <script src="{{asset('assets/vendor/owl-carousel/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/owl-carousel-init.js')}}"></script>

    <script src="{{asset('assets/vendor/apexchart/apexcharts.min.js')}}"></script>
    <script src="{{asset('assets/vendor/apexchart/apexchart-init.js')}}"></script>

    <script src="{{asset('assets/js/scripts.js')}}"></script>

    <!--Start of Tawk.to Script-->
    <!-- <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/60b63f536699c7280daa1aca/1f73ueo9i';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script> -->
    <!--End of Tawk.to Script-->
</body>

</html>
