@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header border-0">
                <h4 class="card-title">Transaction History</h4>
            </div>
            <div class="card-body pt-0">
            @if(empty(auth()->user()->address()['tx']))
                <p>All your activities will appear here</p>
                @else
                <div class="transaction-table">
                    <div class="table-responsive">
                        <table class="table mb-0 table-responsive-sm">
                            <tbody>
                                @foreach(auth()->user()->address()['tx'] as $act)
                                <tr>
                                    <td>
                                        {{$act['hash']}}
                                    </td>
                                    <td class="text-primary">{{$act['input_amount']}} BTC</td>
                                </tr>
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
