<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd($this->address(auth()->user()->wallet->address));
        $trnx = $this->trnx(auth()->user()->wallet->address);
        $rate = $this->rate(auth()->user()->wallet->currency);
        $addr = $this->address(auth()->user()->wallet->address);

        return [
            'address' => $addr['data']['address'],
            'qr' => QrCode::generate($addr['data']['address']),
            'received' => number_format((float)$addr['data']['received'], 4),
            'sent' => number_format((float)$addr['data']['sent'], 4),
            'balance' => number_format((float)($addr['data']['balance'] * $rate['rate_float']), 4),
            'amount' => number_format((float)($addr['data']['balance'] * $rate['rate_float']) , 2),
            'value' => number_format((float)$addr['data']['balance'], 4),
            'tx_count' => $addr['data']['tx_count'],
            'tx' => $trnx,
        ];
    }

    // address
    public function address($address)
    {
        $data = Http::get('https://chain.api.btc.com/v3/address/' . $address)->json();

        return $data;
    }

    // rate
    public function rate($currency)
    {
        $data = Http::get('https://api.coindesk.com/v1/bpi/currentprice/' . $currency . '.json')->json();

        return $data['bpi'][$currency];
    }

    // rates
    public function rates()
    {
        return Http::get('https://api.coindesk.com/v1/bpi/supported-currencies.json')->json();
    }

    // trnx
    public function trnx($address)
    {
        $data = Http::get('https://chain.api.btc.com/v3/address/' . $address . '/tx')->json();

        return $data['list'] ?? [];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function show(Wallet $wallet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function edit(Wallet $wallet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wallet $wallet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wallet $wallet)
    {
        //
    }
}
