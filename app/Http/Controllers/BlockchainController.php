<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;

class BlockchainController extends Controller
{
    public $api;
    public $network;

    public function __construct()
    {
        $this->api = 'http://127.0.0.1:5000/';
        $this->network = 'testnet';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $res = Http::get($this->api . '/create/' . $this->network);

        if (!$res->ok())
            throw ValidationException::withMessages([
                'message' => 'Error creating wallet.'
            ]);


        return $res->json();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function info(Wallet $wallet)
    {
        $res = Http::get($this->api . '/info/' . $this->network . '/' . $wallet->wif . '/' . strtolower($wallet->currency));

        if (!$res->ok())
            throw ValidationException::withMessages([
                'message' => 'Error processing request.'
            ]);

        return $res->json();
    }

    public function send($from, $to, $amount, $currency)
    {
        $res = Http::post($this->api . '/send/' . $this->network . '/' . $from . '/' . $to . '/' . $amount . '/' . strtolower($currency));

        if (!$res->ok())
            throw ValidationException::withMessages([
                'message' => 'Insufficient funds.'
            ]);

        return $res->json();
    }

    public function toBTC($value, $currency)
    {
        $res = Http::get('https://blockchain.info/tobtc', [
            'currency' => $currency,
            'value' => $value,
        ]);

        return $res->json();
    }

    public function monitor($address)
    {
        Http::get('https://api.blockchain.info/v2/receive/balance_update', [
            'key' => '',
            'addr' => $address,
            'callback' => '', // route('monitor-callback', ['address' => $address]),
            'onNotification' => 'KEEP',
            'op' => 'ALL',
            'confs' => 4,
        ]);
    }

    public function monitorCallback(Request $request)
    {
        echo "*ok*";
    }
}
