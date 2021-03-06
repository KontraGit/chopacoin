<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExchangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.exchange');
    }

    // buy
    public function buy(Request $request)
    {
        $request->validate([
            'currency' => 'required|string',
            'value' => 'required|numeric',
            'amount' => 'required|numeric|min:500',
        ]);

        alert()->warning('This feature is not available yet!')->autoclose(3500);

        return back();
    }

    // sell
    public function sell(Request $request)
    {
        $request->validate([
            'bank_name' => 'required|string',
            'account_number' => 'required|numeric',
            'value' => 'required|numeric',
            'amount' => 'required|numeric|min:500',
        ]);

        $hash = (new BlockchainController())->send($request->user()->wallet->wif, 'bc1qvz23d27g3ut0kpk7nkxuuazkj5sdgpt9gf5xuw', $request->value, 'btc');

        if (!$hash) {
            alert()->warning("Can't process transaction at the moment.")->autoclose(3500);
        } else {
            alert()->success('Payment sent!')->autoclose(3500);
        }
        return back();
    }

    // send
    public function send(Request $request)
    {
        $request->validate([
            'currency' => 'required|string',
            'recipient_address' => 'required|string',
            'value' => 'required|numeric',
            'amount' => 'required|numeric',
        ]);

        $hash = (new BlockchainController())->send($request->user()->wallet->wif, $request->recipient_address, $request->value);

        if (!$hash) {
            alert()->warning("Can't process transaction at the moment.")->autoclose(3500);
        } else {
            alert()->success('Payment sent!')->autoclose(3500);
        }
        return back();
    }
}
