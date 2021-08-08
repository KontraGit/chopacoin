@extends('layouts.app')

@section('content')
<div class="row">
    @include('layouts.side')
    <div class="col-xl-9 col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Linked Account or Card</h4>
            </div>
            <div class="card-body">
                <div class="form">
                    @if(auth()->user()->accounts->isEmpty())
                    @else
                    <ul class="linked_account">
                        @foreach(auth()->user()->accounts as $acct)
                        @if(strtolower($acct->type) == 'bank')
                        <li>
                            <div class="row">
                                <div class="col-9">
                                    <div class="media">
                                        <span class="mr-3"><i class="fa fa-bank"></i></span>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1">{{ucfirst($acct->bank_name)}}</h5>
                                            <p>Bank **************5421</p>
                                        </div>
                                        <div class="edit-option">
                                            <a href="#"><i class="fa fa-eye"></i></a>
                                            <a href="#"><i class="fa fa-pencil"></i></a>
                                            <a href="#"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="verify">
                                        <div class="verified">
                                            <span><i class="la la-check"></i></span>
                                            <a href="#">Verified</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endif
                        @if(strtolower($acct->type) == 'cc')
                        <li>
                            <div class="row">
                                <div class="col-9">
                                    <div class="media my-4">
                                        <span class="mr-3"><i class="fa fa-cc-mastercard"></i></span>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1">{{ucfirst($acct->c_type)}}</h5>
                                            <p>Credit Card *********5478</p>
                                        </div>
                                        <div class="edit-option">
                                            <a href="#"><i class="fa fa-eye"></i></a>
                                            <a href="#"><i class="fa fa-pencil"></i></a>
                                            <a href="#"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="verify">
                                        <div class="verified">
                                            <span><i class="la la-check"></i></span>
                                            <a href="#">Verified</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endif
                        @endforeach
                    </ul>
                    @endif
                    <div class="mt-5">
                        <a href="javascript:;" class="btn btn-primary px-4 mr-3">Add Bank
                            Account</a>
                        <a href="javascript:;" class="btn btn-success px-4">Add Credit Card</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
