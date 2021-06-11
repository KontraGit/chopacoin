@extends('layouts.site')

@section('content')
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
                                    <td class=" coin_icon">
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
@endsection
