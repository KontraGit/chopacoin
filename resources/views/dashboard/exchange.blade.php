@extends('layouts.app')

@section('content')
<div class="row justify-content-center mt-md-5">
    <div class="col-md-5">
        <div class="card">
            <div class="card-body">
                <div class="buy-sell-widget">
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#buy" id="buy-tab">Buy</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#sell" id="sell-tab">Sell</a>
                        </li>
                    </ul>
                    <div class="tab-content tab-content-default">
                        <div class="tab-pane fade show active" id="buy" role="tabpanel">
                            <form method="post" action="{{route('buy')}}" class="currency_validate">
                                @csrf
                                <div class="form-group">
                                    <label class="mr-sm-2">Currency</label>
                                    <div class="input-group mb-3">
                                        <select id="buy-currency" class="form-control @error('currency') is-invalid @enderror" name="currency" value="{{ old('currency') }}" required>
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
                                    <label class="mr-sm-2">Amount to Buy</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group">
                                            <input type="text" id="buy-val" class="form-control @error('value') is-invalid @enderror" onkeypress="return isNumberKey(this, event);" name=" value" value="{{ old('value') }}" required placeholder="0.0214 BTC">
                                            <input type="text" id="buy-amt" class="form-control @error('amount') is-invalid @enderror" onkeypress="return isNumberKey(this, event);" name=" amount" value="{{ old('amount') }}" required placeholder="125.00 USD">
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
                                        <div class="d-flex justify-content-between mt-3">
                                            <p class="mb-0">Minimum: $500.00</p>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" name="submit" class="btn btn-success btn-block">Proceed to Payment</button>
                            </form>

                            <p class="py-4">Note: Bitcoins will be sent to your {{config('app.name')}} wallet address once transaction has been confirmed by our system!</p>
                        </div>
                        <div class="tab-pane fade" id="sell">
                            <form method="post" action="{{route('sell')}}" class="currency2_validate">
                                @csrf
                                <div class="form-group">
                                    <label class="mr-sm-2">Bank Name</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control @error('bank_name') is-invalid @enderror" name="bank_name" value="{{ old('bank_name') }}" required placeholder="e.g Wells Fargo">
                                        @error('bank_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="mr-sm-2">Account Number</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control @error('account_number') is-invalid @enderror no" name="account_number" value="{{ old('account_number') }}" required placeholder="xxxxxxxxxx">
                                        @error('account_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="mr-sm-2">Amount to Sell</label>
                                    <div class="input-group">
                                        <div class="input-group">
                                            <input type="text" id="sell-val" class="form-control @error('value') is-invalid @enderror" onkeypress="return isNumberKey(this, event);" name=" value" value="{{ old('value') }}" required placeholder="0.0214 BTC">
                                            <input type="text" id="sell-amt" class="form-control @error('amount') is-invalid @enderror" onkeypress="return isNumberKey(this, event);" name=" amount" value="{{ old('amount') }}" required placeholder="125.00 USD">
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
                                    <div class="d-flex justify-content-between mt-3">
                                        <p class="mb-0">Minimum: $500.00</p>
                                    </div>
                                </div>
                                <button type="submit" name="submit" class="btn btn-success btn-block">Exchange Now</button>
                            </form>
                            <p class="py-4">Note: Payment will be sent to you to the account details provided once transaction has been confirmed by the network!</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- <div class="col-xl-7 col-lg-7 col-md-12">
        <div class="card">
            <div class="card-body pt-0">
                <div class="buyer-seller">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody id="buy-preview">
                                <tr>
                                    <td><span class="text-primary">You are buying</span></td>
                                    <td><span id="buy-value" class="text-primary">0.00254 BTC</span></td>
                                </tr>
                                <tr>
                                    <td>Payment Method</td>
                                    <td>Credit / Debit Card</td>
                                </tr>
                                <tr>
                                    <td>Recipient Address</td>
                                    <td>{{auth()->user()->wallet->address}}</td>
                                </tr>
                                <tr>
                                    <td>Amount</td>
                                    <td id="buy-amount">$854.00 USD</td>
                                </tr>
                                <tr>
                                    <td>Fee</td>
                                    <td id="buy-fee" class="text-danger">$28.00 USD</td>
                                </tr>
                                <tr>
                                    <td> Total</td>
                                    <td id="buy-total"> $1232.00 USD</td>
                                </tr>
                            </tbody>
                            <tbody id="sell-preview" class="d-none">
                                <tr>
                                    <td><span class="text-primary">You are selling</span></td>
                                    <td><span id="sell-value" class="text-primary">0.00254 BTC</span></td>
                                </tr>
                                <tr>
                                    <td>Payment Method</td>
                                    <td>Bitcoin</td>
                                </tr>
                                <tr>
                                    <td>Bank Name</td>
                                    <td id="sell-bank">Wells Fargo</td>
                                </tr>
                                <tr>
                                    <td>Account Number</td>
                                    <td id="sell-account">Wells Fargo</td>
                                </tr>
                                <tr>
                                    <td>Amount</td>
                                    <td id="sell-amount">$854.00 USD</td>
                                </tr>
                                <tr>
                                    <td>Fee</td>
                                    <td id="sell-fee" class="text-danger">$28.00 USD</td>
                                </tr>
                                <tr>
                                    <td> Total</td>
                                    <td id="sell-total"> $1232.00 USD</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
</div>

<!-- <div class="row">
    <div class="col-xl-6 col-xxl-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">FAQ</h4>
            </div>
            <div class="card-body">
                <div id="accordion-faq" class="accordion">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0 collapsed c-pointer" data-toggle="collapse" data-target="#collapseOne1" aria-expanded="false" aria-controls="collapseOne1"><i class="fa" aria-hidden="true"></i>What
                                Shipping Methods are Available?</h5>
                        </div>
                        <div id="collapseOne1" class="collapse show" data-parent="#accordion-faq">
                            <div class="card-body">Anim pariatur cliche reprehenderit, enim eiusmod high
                                life accusamus terry richardson ad squid. 3 wolf moon officia aute, non
                                cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                eiusmod.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0 collapsed c-pointer" data-toggle="collapse" data-target="#collapseTwo2" aria-expanded="false" aria-controls="collapseTwo2"><i class="fa" aria-hidden="true"></i>How
                                Long Will it Take To Get My Package?</h5>
                        </div>
                        <div id="collapseTwo2" class="collapse" data-parent="#accordion-faq">
                            <div class="card-body">Anim pariatur cliche reprehenderit, enim eiusmod high
                                life accusamus terry richardson ad squid. 3 wolf moon officia aute, non
                                cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                eiusmod.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0 collapsed c-pointer" data-toggle="collapse" data-target="#collapseThree3" aria-expanded="false" aria-controls="collapseThree3"><i class="fa" aria-hidden="true"></i>How
                                Do I Track My Order?</h5>
                        </div>
                        <div id="collapseThree3" class="collapse" data-parent="#accordion-faq">
                            <div class="card-body">Anim pariatur cliche reprehenderit, enim eiusmod high
                                life accusamus terry richardson ad squid. 3 wolf moon officia aute, non
                                cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                eiusmod.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0 collapsed c-pointer" data-toggle="collapse" data-target="#collapseThree4" aria-expanded="false" aria-controls="collapseThree4"><i class="fa" aria-hidden="true"></i>Do I
                                Need A Account To Place Order?</h5>
                        </div>
                        <div id="collapseThree4" class="collapse" data-parent="#accordion-faq">
                            <div class="card-body">Anim pariatur cliche reprehenderit, enim eiusmod high
                                life accusamus terry richardson ad squid. 3 wolf moon officia aute, non
                                cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                eiusmod.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0 collapsed c-pointer" data-toggle="collapse" data-target="#collapseThree5" aria-expanded="false" aria-controls="collapseThree5"><i class="fa" aria-hidden="true"></i>How
                                do I Place an Order?</h5>
                        </div>
                        <div id="collapseThree5" class="collapse" data-parent="#accordion-faq">
                            <div class="card-body">Anim pariatur cliche reprehenderit, enim eiusmod high
                                life accusamus terry richardson ad squid. 3 wolf moon officia aute, non
                                cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                eiusmod.
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="intro-video-play">
            <div class="play-btn">
                <a class="popup-youtube" href="https://www.youtube.com/watch?v=IjzUwnqWc5Q">
                    <span><i class="fa fa-play"></i></span></a>
            </div>
        </div>
    </div>
</div> -->
@endsection
