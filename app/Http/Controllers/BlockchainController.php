<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class BlockchainController extends Controller
{
    public $url;

    public function __construct()
    {
        $this->url = 'https://coinchoppa.com/';
    }

    public function create()
    {
        $res = Http::get($this->url . 'cw');

        if (!$res->ok())
            return abort(500);

        return $res->json();
    }

    public function address($address, $currency)
    {
        $blockchain = new \Blockchain\Blockchain();
        $address = $blockchain->Explorer->getHash160Address('bc1q3lp2tlqd5n2csnzgfd3uq3l6nw705lf8ugvmap');

        return [
            'value' => number_format((float)$address->final_balance, 6) . ' BTC',
            'amount' => number_format((float)$blockchain->Rates->fromBTC($address->final_balance * 100000000, $currency), 2) . ' ' . $currency,
            'sent' => number_format((float)$address->total_sent, 6) . ' BTC',
            'received' => number_format((float)$address->total_received, 6) . ' BTC',
            'address' => $address->address,
            'qr' => QrCode::size(200)->generate($address->address),
            'trnx' => $address->transactions,
            'rate' => number_format((float)$blockchain->Rates->fromBTC(100000000, $currency), 2),
        ];
    }

    public function send($from, $to, $amount, $currency)
    {
        $params = [
            'wif' => $from,
            'to' => $to,
            'amount' => $amount,
            'currency' => strtolower($currency)
        ];

        $send = Http::post($this->url . 'st', $params);

        return $send->json();
    }
}
