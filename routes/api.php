<?php

use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('find', function (Request $request) {

    if ($wallet = Wallet::where('address', $request->address)->first())
        return response()->json([
            'status' => false,
            'message' => 'Not found.',
        ]);

        return response()->json([
            'status' => true,
            'client' => $wallet->user->name,
            'wallet' => $wallet,
        ]);
});
