@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header border-0">
                <h4 class="card-title">Transaction History</h4>
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
