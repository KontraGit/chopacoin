@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card page-title-content">
            <div class="card-body">
                <p class="card-text"><strong class="text-primary">{{auth()->user()->greetings()}}</strong>
                    <span> {{auth()->user()->name}}</span>
                </p>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-3 col-lg-4 col-xxl-4">
        <div class="card balance-widget">
            <div class="card-header border-0 py-0">
                <h4 class="card-title">Your Portfolio </h4>
            </div>
            <div class="card-body pt-0">
                <div class="balance-widget">
                    <div class="total-balance">
                        <h3>{{auth()->user()->wallet->sign.auth()->user()->address()['amount']}}</h3>
                        <h6>Total Balance</h6>
                    </div>
                    <ul class="list-unstyled">
                        <li class="media">
                            <i class="cc BTC mr-3"></i>
                            <div class="media-body">
                                <h5 class="m-0">Bitcoin</h5>
                            </div>
                            <div class="text-right">
                                <h5>{{auth()->user()->address()['value']}}</h5>
                                <span>{{auth()->user()->address()['amount']}}</span>
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
                            <i class="cc USDT mr-3"></i>
                            <div class="media-body">
                                <h5 class="m-0">Tether</h5>
                            </div>
                            <div class="text-right">
                                <h5>0.0000 USDT</h5>
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
                    <h3>{{auth()->user()->address()['rate']. ' '.auth()->user()->wallet->currency}}</h3>
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
                <!-- <iframe src="https://widget.coinlib.io/widget?type=chart&theme=light&coin_id=859&pref_coin_id=1505" width="100%" height="536px" scrolling="auto" marginwidth="0" marginheight="0" frameborder="0" border="0" style="border:0;margin:0;padding:0;line-height:14px;"></iframe> -->
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
                                    <h4>{{auth()->user()->wallet->currency.' '.auth()->user()->address()['rate']}}
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
                                    <h4>USD 1254.36
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
                                        <span><i class="cc USDT"></i></span>
                                        <h5 class="d-inline-block ml-2 mb-3">Tether <span>(24h)</span>
                                        </h5>
                                    </div>
                                    <h4>USD 1254.36
                                    </h4>
                                </div>
                                <div id="xrpChart"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <iframe src="https://widget.coinlib.io/widget?type=full_v2&theme=light&cnt=6&pref_coin_id=1505&graph=yes" width="100%" height="409px" scrolling="auto" marginwidth="0" marginheight="0" frameborder="0" border="0" style="border:0;margin:0;padding:0;"></iframe> -->
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
                    <form method="post" action="{{route('send')}}" class="currency_validate">
                        @csrf
                        <div class="form-group">
                            <label class="mr-sm-2">Wallet</label>
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
                            <label class="mr-sm-2">Recipient Address</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control @error('recipient_address') is-invalid @enderror" name="recipient_address" value="{{ old('recipient_address') }}" value="BTC address">
                                @error('recipient_address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="mr-sm-2">Amount to Buy</label>
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
                        <div class="btn-group">
                            <button type="submit" class="btn btn-primary">Send</button>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#receive">Request</button>
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
                @if(empty(auth()->user()->address()['trnx']))
                <p>All your activities will appear here</p>
                @else
                <div class="transaction-table">
                    <div class="table-responsive">
                        <table class="table mb-0 table-responsive-sm">
                            <tbody>
                                @foreach(auth()->user()->address()['trnx'] as $key => $act)
                                <tr>
                                    <td>
                                        {{$act->hash}}
                                    </td>
                                    @if(!$act->value)
                                    <td class="text-primary"><a href="https://www.blockchain.com/btc/tx/{{$act->hash}}" target="_blank">Explorer <i class="la la-external-link"></i></a></td>
                                    @else
                                    <td class="text-primary">{{$act->value}}</td>
                                    @endif
                                </tr>
                                @if($key == 4) @break @endif @endforeach
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
