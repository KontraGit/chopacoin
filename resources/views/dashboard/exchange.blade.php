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
                            <form class="currency_validate">
                                <!-- @csrf -->
                                <div id="smart-button-container">
                                    <div><label for="amount"> Amount in Buy <small><i>(USD)</i></small></label><input name="amountInput" type="text" id="amount" value="" class="form-control" min="500" onkeypress="return isNumberKey(this, event);" placeholder="500">
                                        <div class="d-flex justify-content-between mt-3">
                                            <p class="mb-0">Minimum: $500.00</p>
                                        </div>
                                    </div>
                                    <p class="card-text" id="priceLabelError" style="visibility: hidden; color:red; ">Please enter a price</p>
                                    <div><label for="description"> Description </label><input type="text" name="descriptionInput" id="description" maxlength="127" value="" class="form-control"></div>
                                    <p class="card-text" id="descriptionError" style="visibility: hidden; color:red; ">Please enter a description</p>

                                    <div id="invoiceidDiv" style=" display: none;"><label for="invoiceid"> </label><input name="invoiceid" maxlength="127" type="text" id="invoiceid" value=""></div>
                                    <p class="card-text" id="invoiceidError" style="visibility: hidden; color:red; ">Please enter an Invoice ID</p>
                                    <div id="paypal-button-container"></div>
                                </div>
                                <script src="https://www.paypal.com/sdk/js?client-id=AbMfdxpaMsw4_CiLLnK6f6pgM-YI34CLoYl1ZBXuV_cBRp2XTwJCS3rvHVrEVCK8sW0ykVhao1_SoM3S&currency=USD" data-sdk-integration-source="button-factory"></script>
                                <script>
                                    function initPayPalButton() {
                                        var description = document.querySelector('#smart-button-container #description');
                                        var amount = document.querySelector('#smart-button-container #amount');
                                        var descriptionError = document.querySelector('#smart-button-container #descriptionError');
                                        var priceError = document.querySelector('#smart-button-container #priceLabelError');
                                        var invoiceid = document.querySelector('#smart-button-container #invoiceid');
                                        var invoiceidError = document.querySelector('#smart-button-container #invoiceidError');
                                        var invoiceidDiv = document.querySelector('#smart-button-container #invoiceidDiv');

                                        var elArr = [description, amount];

                                        if (invoiceidDiv.firstChild.innerHTML.length > 1) {
                                            invoiceidDiv.style.display = "block";
                                        }

                                        var purchase_units = [];
                                        purchase_units[0] = {};
                                        purchase_units[0].amount = {};

                                        function validate(event) {
                                            return event.value.length > 0;
                                        }

                                        paypal.Buttons({
                                            style: {
                                                color: 'gold',
                                                shape: 'rect',
                                                label: 'paypal',
                                                layout: 'vertical',

                                            },

                                            onInit: function(data, actions) {
                                                actions.disable();

                                                if (invoiceidDiv.style.display === "block") {
                                                    elArr.push(invoiceid);
                                                }

                                                elArr.forEach(function(item) {
                                                    item.addEventListener('keyup', function(event) {
                                                        var result = elArr.every(validate);
                                                        if (result) {
                                                            actions.enable();
                                                        } else {
                                                            actions.disable();
                                                        }
                                                    });
                                                });
                                            },

                                            onClick: function() {
                                                if (description.value.length < 1) {
                                                    descriptionError.style.visibility = "visible";
                                                } else {
                                                    descriptionError.style.visibility = "hidden";
                                                }

                                                if (amount.value.length < 1) {
                                                    priceError.style.visibility = "visible";
                                                } else {
                                                    priceError.style.visibility = "hidden";
                                                }

                                                if (invoiceid.value.length < 1 && invoiceidDiv.style.display === "block") {
                                                    invoiceidError.style.visibility = "visible";
                                                } else {
                                                    invoiceidError.style.visibility = "hidden";
                                                }

                                                purchase_units[0].description = description.value;
                                                purchase_units[0].amount.value = amount.value;

                                                if (invoiceid.value !== '') {
                                                    purchase_units[0].invoice_id = invoiceid.value;
                                                }
                                            },

                                            createOrder: function(data, actions) {
                                                return actions.order.create({
                                                    purchase_units: purchase_units,
                                                });
                                            },

                                            onApprove: function(data, actions) {
                                                return actions.order.capture().then(function(details) {
                                                    alert('Transaction completed by ' + details.payer.name.given_name + '!');
                                                });
                                            },

                                            onError: function(err) {
                                                console.log(err);
                                            }
                                        }).render('#paypal-button-container');
                                    }
                                    initPayPalButton();
                                </script>
                                <!-- <div class="form-group">
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
                                <button type="submit" name="submit" class="btn btn-success btn-block">Proceed to Payment</button> -->
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
</div>
@endsection
