@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header border-0">
                <h4 class="card-title">Transaction History</h4>
            </div>
            <div class="card-body pt-0">
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
