<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class BlockchainController extends Controller
{
    public $url;

    public function __construct()
    {
        $this->url = 'http://choppacoin.com/';
    }

    public function create()
    {
        $res = Http::get($this->url . 'ca');

        if (!$res->ok())
            return abort(500);

        return $res->json();
    }

    public function address($addr, $f_address, $currency)
    {
        $address = $this->testNet($f_address);
        $rate = $this->rate($currency);

        return [
            'address' =>  $addr,
            'qr' => QrCode::generate($addr),
            'received' => number_format((float)$address['total']['received'], 4) .' BTC',
            'sent' => number_format((float)$address['total']['spent'], 4) .' BTC',
            'balance' => auth()->user()->wallet->sign.number_format((float)($address['total']['balance'] * $rate['rate_float']), 2). ' BTC',
            'amount' => auth()->user()->wallet->sign.number_format((float)($address['total']['balance'] * $rate['rate_float']), 2),
            'value' => number_format((float)$address['total']['balance'], 4) .' BTC',
            'tx' => $address['transactions'] ?? [],
            'rate' => auth()->user()->wallet->sign.number_format((float)$rate['rate_float'], 2),
        ];
    }

    // rate
    public function rate($currency)
    {
        $data = Http::get('https://api.coindesk.com/v1/bpi/currentprice/' . $currency . '.json')->json();

        return $data['bpi'][$currency];
    }

    public function testNet($f_address)
    {

        $addr = Http::get('https://testnet-api.smartbit.com.au/v1/blockchain/address/'.$f_address)->json();

        return $addr['address'];
    }

    public function send($from, $to, $amount)
    {
        $params = [
            'wif' => $from,
            'to' => $to,
            'amount' => $amount,
        ];

        $send = Http::post($this->url . 'snd', $params);

        return $send->json();
    }
}
