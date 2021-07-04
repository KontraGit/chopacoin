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
        $rates = $this->rates(auth()->user()->wallet->currency);
        $portfolios = [];

        foreach ($rates as $rate) {
            # code...
            $portfolio = [
                "id" => $rate["id"],
                "name" => $rate["name"],
                "symbol" => $rate["symbol"],
                "price" => $rate["price"],
                "amount" => number_format((float)($rate["price"] * 0), 2),
                "value" => number_format((float)($rate["price"] * 0), 4),
                "currency" => strtoupper(auth()->user()->wallet->sign),
                "sign" => $this->sign(auth()->user()->wallet->sign),
            ];

            if (strtolower($rate["symbol"]) == 'btc') {
                $portfolio["id"] = $rate["id"];
                $portfolio["address"] = auth()->user()->wallet->address;
                $portfolio["amount"] = number_format((float)($rate["price"] * 0), 2);
                $portfolio["value"] =number_format((float)($rate["price"] * 0), 4);
            }

            array_push($portfolios, $portfolio);
        }

        $summary = [
            "price" => '0.00',
            "value" => '0.00',
            "volume_change" => '0.00',
            "market_cap_change" => '0.00',
            "unit" => 'BTC',
        ];

        return [
            'balance' => number_format((float)array_sum(array_column($portfolios, 'amount')), 2),
            'value' => number_format((float)array_sum(array_column($portfolios, 'value')), 4),
            'amount' => $this->sign(auth()->user()->wallet->sign).number_format((float)array_sum(array_column($portfolios, 'amount')), 2),
            'portfolio' => $portfolios,
            'rates' => $this->rates(auth()->user()->wallet->currency),
            'summary' => $summary,
            'currency' => strtoupper(auth()->user()->wallet->currency),
            'symbol' => $this->sign(auth()->user()->wallet->sign),
            'qr' => QrCode::size(200)->generate(auth()->user()->wallet->address),
            'address' => auth()->user()->wallet->address,
        ];
    }

    // rates
    public function rates($convert)
    {
        $res = Http::get('https://api.nomics.com/v1/currencies/ticker', [
            'key' => '340467462defaca3767be1c420b0fb0733216793',
            'ids' => 'BTC,ETH,USDT',
            'interval' => '1d',
            'convert' => strtoupper($convert),
        ]);

        return $res->json();
    }

    // sign
    public function sign($currency)
    {
        switch (strtolower($currency)) {
            case 'cad':
                # code...
                return '$';
                break;

            case 'gbp':
                # code...
                return '£';
                break;
            case 'eur':
                # code...
                return '€';
                break;
            default:
                # code...
                return '$';
                break;
        }
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
