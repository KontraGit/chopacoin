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
            <div class="card-body">
                <div class="balance-widget">
                    <ul class="list-unstyled">
                        <li class="media">
                            <i class="cc BTC mr-3"></i>
                            <div class="media-body">
                                <h5 class="m-0">Bitcoin</h5>
                            </div>
                            <div class="text-right">
                                <h5>{{auth()->user()->address()['amount']}}</h5>
                                <span>{{auth()->user()->address()['value']}}</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-lg-8 col-xxl-8">
        <div class="card">
            <iframe src="https://widget.coinlib.io/widget?type=single_v2&theme=light&coin_id=859&pref_coin_id=1505" width="100%" height="210px" scrolling="no" marginwidth="0" marginheight="0" frameborder="0" border="0" style="border:0;margin:0;padding:0;line-height:14px;"></iframe>
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
                                    <h4>{{auth()->user()->address()['rate']}}
                                    </h4>
                                </div>
                                <div id="btcChart"></div>
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
                <h4 class="card-title">Send / Receive</h4>
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
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#receive">Receive</button>
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
                @if(empty(auth()->user()->address()['tx']))
                <p>All your activities will appear here</p>
                @else
                <div class="transaction-table">
                    <div class="table-responsive">
                        <table class="table mb-0 table-responsive-sm">
                            <tbody>
                                @foreach(auth()->user()->address()['tx'] as $key => $act)
                                <tr>
                                    <td>
                                        {{$act['hash']}}
                                    </td>
                                    <td class="text-primary">{{$act['input_amount']}} BTC</td>
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
