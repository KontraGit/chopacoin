@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-3 col-lg-4 col-xxl-4">
        <div class="card balance-widget">
            <div class="card-header border-0 py-0">
                <h4 class="card-title">Your Portfolio </h4>
            </div>
            <div class="card-body pt-0">
                <div class="balance-widget">
                    <div class="total-balance">
                        <h3>{{auth()->user()->wallet->sign.auth()->user()->balance()['fiat']}}</h3>
                        <h6>Total Balance</h6>
                    </div>
                    <ul class="list-unstyled">
                        <li class="media">
                            <i class="cc BTC mr-3"></i>
                            <div class="media-body">
                                <h5 class="m-0">Bitcoin</h5>
                            </div>
                            <div class="text-right">
                                <h5>{{number_format((float)auth()->user()->balance()['btc'], 6)}} BTC</h5>
                                <span>{{number_format((float)auth()->user()->balance()['fiat'], 2).' '.auth()->user()->wallet->currency}}</span>
                            </div>
                        </li>
                        <li class="media">
                            <i class="cc ETH mr-3"></i>
                            <div class="media-body">
                                <h5 class="m-0">Ethereum</h5>
                            </div>
                            <div class="text-right">
                                <h5>0.000000 ETH</h5>
                                <span>0.00 USD</span>
                            </div>
                        </li>
                        <li class="media">
                            <i class="cc XRP mr-3"></i>
                            <div class="media-body">
                                <h5 class="m-0">Dogecoin</h5>
                            </div>
                            <div class="text-right">
                                <h5>0.000000 XRP</h5>
                                <span>0.00 USD</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-lg-8 col-xxl-8">
        <div class="card profile_chart">
            <div class="card-header py-0">
                <div class="chart_current_data">
                    <h3>254856 <span>USD</span></h3>
                    <p class="text-success">125648 <span>USD (20%)</span></p>
                </div>
                <div class="duration-option">
                    <a id="all" class="active">ALL</a>
                    <a id="one_month" class="">1M</a>
                    <a id="six_months">6M</a>
                    <a id="one_year" class="">1Y</a>
                    <a id="ytd" class="">YTD</a>
                </div>
            </div>
            <div class="card-body">
                <div id="timeline-chart"></div>
                <div class="chart-content text-center">
                    <div class="row">
                        <div class="col-xl-3 col-sm-6 col-6">
                            <div class="chart-stat">
                                <p class="mb-1">24hr Volume</p>
                                <h5>$1236548.325</h5>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-6">
                            <div class="chart-stat">
                                <p class="mb-1">Market Cap</p>
                                <h5>19B USD</h5>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-6">
                            <div class="chart-stat">
                                <p class="mb-1">All Time High</p>
                                <h5>19.783.06 USD</h5>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-6">
                            <div class="chart-stat">
                                <p class="mb-1">Popularity </p>
                                <h5>#1 most held </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-12 col-xxl-12">
        <div class="card">
            <div class="card-header border-0 py-0">
                <h4 class="card-title">Today's Rate</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-12 col-lg-6 col-xxl-6">
                        <div class="widget-card">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="widget-stat">
                                    <div class="coin-title">
                                        <span><i class="cc BTC"></i></span>
                                        <h5 class="d-inline-block ml-2 mb-3">Bitcoin <span>(24h)</span>
                                        </h5>
                                    </div>
                                    <h4>USD 1254.36 <span class="badge badge-success ml-2">+ 06%</span>
                                    </h4>
                                </div>
                                <div id="btcChart"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-6 col-xxl-6">
                        <div class="widget-card">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="widget-stat">
                                    <div class="coin-title">
                                        <span><i class="cc ETH"></i></span>
                                        <h5 class="d-inline-block ml-2 mb-3">Ethereum <span>(24h)</span>
                                        </h5>
                                    </div>
                                    <h4>USD 1254.36 <span class="badge badge-danger ml-2">- 06%</span>
                                    </h4>
                                </div>
                                <div id="ltcChart"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-6 col-xxl-6">
                        <div class="widget-card">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="widget-stat">
                                    <div class="coin-title">
                                        <span><i class="cc LTC"></i></span>
                                        <h5 class="d-inline-block ml-2 mb-3">Dogecoin <span>(24h)</span>
                                        </h5>
                                    </div>
                                    <h4>USD 1254.36 <span class="badge badge-primary ml-2"> 06%</span>
                                    </h4>
                                </div>
                                <div id="xrpChart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-3 col-lg-4 col-xxl-4">
        <div class="card">
            <div class="card-header border-0 py-0">
                <h4 class="card-title">Send / Request</h4>
            </div>
            <div class="card-body">
                <div class="buy-sell-widget">
                    <form method="post" name="myform" class="currency_validate">
                        @csrf
                        <div class="form-group">
                            <label class="mr-sm-2">Wallet</label>
                            <div class="input-group mb-3">
                                <select name='currency' class="form-control">
                                    <option data-display="Bitcoin" value="bitcoin">Bitcoin</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="mr-sm-2">Receipient Address</label>
                            <div class="input-group mb-3">
                                <input type="text" name="usd_amount" class="form-control" value="BTC address">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="mr-sm-2">Enter your amount</label>
                            <div class="input-group">
                                <input type="text" name="currency_amount" class="form-control" placeholder="0.0214 BTC">
                                <input type="text" name="usd_amount" class="form-control" placeholder="125.00 USD">
                            </div>
                        </div>
                        <div class="btn-group">
                            <button type="submit" class="btn btn-primary">Send</button>
                            <button type="button" class="btn btn-success">Request</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-9 col-lg-8 col-xxl-8">
        <div class="card">
            <div class="card-header border-0 py-0">
                <h4 class="card-title">Recent Activities</h4>
                <a href="{{route('activities')}}">View More </a>
            </div>
            <div class="card-body">
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
