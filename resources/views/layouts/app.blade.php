<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/favicon.png')}}">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="{{asset('assets/vendor/nice-select/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/waves/waves.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/toastr/toastr.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

    <script src="{{asset('assets/js/sweetalert.min.js')}}"></script>
</head>

<body>
    @include('sweet::alert')
    <div id="app">
        <div id="preloader">
            <div class="sk-three-bounce">
                <div class="sk-child sk-bounce1"></div>
                <div class="sk-child sk-bounce2"></div>
                <div class="sk-child sk-bounce3"></div>
            </div>
        </div>
        <div id="main-wrapper">
            @guest

            <div class="authincation">
                <div class="container">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-xl-5 col-md-6">
                            <div class="mini-logo text-center mb-5">
                                <a href="{{url('/')}}">
                                    <img src="{{asset('assets/images/logo.png')}}" alt="">
                                </a>
                            </div>
                            <div class="auth-form card">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @else
            <div class="header dashboard">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12">
                            <nav class="navbar navbar-expand-lg navbar-light px-0 justify-content-between">
                                <a class="navbar-brand" href="{{route('dashboard')}}"><img src="{{asset('assets/images/logo.png')}}" alt=""></a>

                                <div class="dashboard_log my-2">
                                    <div class="d-flex align-items-center">
                                        <div class="account_money">
                                            <ul>
                                                <li class="crypto">
                                                    <span>{{number_format((float)auth()->user()->balance()['btc'], 6)}}</span>
                                                    <i class="cc BTC"></i>
                                                </li>
                                                <li class="usd">
                                                    <span>{{number_format((float)auth()->user()->balance()['fiat'], 2).' '.auth()->user()->wallet->currency}}</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="profile_log dropdown">
                                            <div class="user" data-toggle="dropdown">
                                                <span class="thumb"><i class="la la-user"></i></span>
                                                <span class="name">{{auth()->user()->name}}</span>
                                                <span class="arrow"><i class="la la-angle-down"></i></span>
                                            </div>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="{{route('account')}}" class="dropdown-item">
                                                    <i class="la la-user"></i> Account
                                                </a>
                                                <a href="{{route('activities')}}" class="dropdown-item">
                                                    <i class="la la-book"></i> Activities
                                                </a>
                                                <a href="{{route('settings')}}" class="dropdown-item">
                                                    <i class="la la-cog"></i> Setting
                                                </a>
                                                <a href="javascript:;" class="dropdown-item logout" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                                    <i class="la la-sign-out"></i> Logout
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sidebar">
                <div class="menu">
                    <ul>
                        <li>
                            <a href="{{route('dashboard')}}" data-toggle="tooltip" data-placement="right" title="Dashboard">
                                <span><i class="la la-igloo"></i></span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('exchange')}}" data-toggle="tooltip" data-placement="right" title="Exchange">
                                <span><i class="la la-exchange"></i></span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('account')}}" data-toggle="tooltip" data-placement="right" title="Account">
                                <span><i class="la la-user"></i></span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('settings')}}" data-toggle="tooltip" data-placement="right" title="Setting">
                                <span><i class="la la-tools"></i></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="page-title dashboard">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="page-title-content">
                                <p>Welcome Back,
                                    <span> {{auth()->user()->name}}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            <div class="footer dashboard">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="copyright">
                                <p>© Copyright {{date("Y")}} <a href="{{url('/')}}">{{config('app.name')}}</a>. All rights reserved</p>
                            </div>
                        </div>
                        <div class="col-xl-6">
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
            @endguest
        </div>
    </div>
    <script src="{{asset('assets/js/global.js')}}"></script>

    <script src="{{asset('assets/vendor/waves/waves.min.js')}}"></script>

    <script src="{{asset('assets/vendor/validator/jquery.validate.js')}}"></script>
    <script src="{{asset('assets/vendor/validator/validator-init.js')}}"></script>

    <!-- Home -->
    <script src="{{asset('assets/vendor/toastr/toastr.min.js')}}"></script>
    <script src="{{asset('assets/vendor/toastr/toastr-init.js')}}"></script>

    <script src="{{asset('assets/vendor/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{asset('assets/vendor/circle-progress/circle-progress-init.js')}}"></script>

    <!--  flot-chart js -->
    <script src="{{asset('assets/vendor/apexchart/apexcharts.min.js')}}"></script>
    <script src="{{asset('assets/vendor/apexchart/apexchart-init.js')}}"></script>

    <!-- <script src="./js/dashboard.js')}}"></script> -->
    <script src="{{asset('assets/js/dashboard.js')}}"></script>
    <script src="{{asset('assets/js/scripts.js')}}"></script>
</body>

</html>
