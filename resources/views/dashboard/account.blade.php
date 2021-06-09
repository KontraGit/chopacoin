@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-4 col-lg-4 col-md-6">
        <div class="card profile_card">
            <div class="card-body">
                <div class="media">
                    <img class="mr-3 rounded-circle mr-0 mr-sm-3" src="{{auth()->user()->photo ?? asset('assets/images/default.png')}}" width="60" height="60" alt="">
                    <div class="media-body">
                        <span>Account Details</span>
                        <h4 class="mb-2">{{auth()->user()->name}}</h4>
                        <p class="mb-1"> <span><i class="fa fa-phone mr-2 text-primary"></i></span>
                            @if(!auth()->user()->phone)
                            <a href="{{route('settings')}}">Add Phone Number</a>
                            @else
                            {{auth()->user()->phone}}
                            @endif
                        </p>
                        <p class="mb-1"> <span><i class="fa fa-envelope mr-2 text-primary"></i></span>
                            {{auth()->user()->email}}
                        </p>
                    </div>
                </div>

                <ul class="card-profile__info">
                    <li>
                        <h5 class="mr-4">Address</h5>
                        <span class="text-muted">
                            @if(!auth()->user()->street || auth()->user()->city || auth()->user()->state || auth()->user()->country || auth()->user()->postal_code)
                            <a href="{{route('settings')}}">Add Contact Address</a>
                            @else
                            {{auth()->user()->street.', '.auth()->user()->city.', '.auth()->user()->state.', '.auth()->user()->country}}
                            @endif
                        </span>
                    </li>
                    <li class="mb-1">
                        <h5 class="mr-4">Time Zone</h5>
                        <span>{{auth()->user()->wallet->time_zone}}</span>
                    </li>
                    <li>
                        <h5 class="text-danger mr-4">Logged IP</h5>
                        <span class="text-danger">{{Request::ip()}}</span>
                    </li>
                </ul>
                <div class="social-icons">
                    <a class="facebook text-center" href="javascript:void(0)"><span><i class="fa fa-facebook"></i></span></a>
                    <a class="twitter text-center" href="javascript:void(0)"><span><i class="fa fa-twitter"></i></span></a>
                    <a class="youtube text-center" href="javascript:void(0)"><span><i class="fa fa-youtube"></i></span></a>
                    <a class="googlePlus text-center" href="javascript:void(0)"><span><i class="fa fa-google"></i></span></a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-4 col-md-6">
        <div class="card acc_balance">
            <div class="card-header">
                <h4 class="card-title">Wallet Summary</h4>
            </div>
            <div class="card-body">
                <span>Available Balance</span>
                <h3>{{number_format((float)auth()->user()->balance()['btc'], 6)}} BTC</h3>

                <div class="d-flex justify-content-between my-4">
                    <div>
                        <p class="mb-1">Total Sent</p>
                        <h4>{{auth()->user()->activities->where('type', 'Sent')->sum('value')}} BTC</h4>
                    </div>
                    <div>
                        <p class="mb-1">Total Received</p>
                        <h4>{{auth()->user()->activities->where('type', 'Received')->sum('value')}} BTC</h4>
                    </div>
                </div>

                <div class="btn-group mb-3">
                    <a href="{{route('exchange')}}" class="btn btn-primary">Sell</a>
                    <a href="{{route('exchange')}}" class="btn btn-success">Buy</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-4">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Withdraw</h4>
            </div>
            <div class="card-body">
                <div>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text"><i class="fa fa-money"></i></label>
                            </div>
                            <input type="text" class="form-control" placeholder="500 USD">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text"><i class="fa fa-bank"></i></label>
                            </div>
                            <select class="form-control">
                                <option>No account found</option>
                            </select>
                        </div>
                    </div>

                    <button class="btn btn-primary btn-block">Coming Soon</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header border-0">
                <h4 class="card-title">Recent Activities</h4>
                <a href="{{route('activities')}}">View More </a>
            </div>
            <div class="card-body pt-0">
                @if(auth()->user()->activities->isEmpty())
                <p>All your activities will appear here</p>
                @else
                <div class="transaction-table">
                    <div class="table-responsive">
                        <table class="table mb-0 table-responsive-sm">
                            <tbody>
                                @foreach(auth()->user()->activities as $act)
                                @if(strtolower($act->type) == 'sent')
                                <tr>
                                    <td><span class="sold-thumb"><i class="la la-arrow-up"></i></span>
                                    </td>

                                    <td>
                                        <span class="badge badge-danger">{{ucfirst($act->type)}}</span>
                                    </td>
                                    <td>
                                        <i class="cc {{strtoupper($act->mode)}}"></i> {{strtoupper($act->mode)}}
                                    </td>
                                    <td>
                                        {{ucfirst($act->summary)}}
                                    </td>
                                    <td class="text-danger">-{{strtoupper($act->value)}}</td>
                                    <td>-{{$act->amount}}</td>
                                </tr>
                                @endif
                                @if(strtolower($act->type) == 'received')
                                <tr>
                                    <td><span class="sold-thumb"><i class="la la-arrow-down"></i></span>
                                    </td>

                                    <td>
                                        <span class="badge badge-success">{{ucfirst($act->type)}}</span>
                                    </td>
                                    <td>
                                        <i class="cc {{strtoupper($act->mode)}}"></i> {{strtoupper($act->mode)}}
                                    </td>
                                    <td>
                                        {{ucfirst($act->summary)}}
                                    </td>
                                    <td class="text-success">+{{strtoupper($act->value)}}</td>
                                    <td>+{{$act->amount}}</td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
