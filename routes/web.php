<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('price', function () {
    return view('price');
});

Route::get('wallet', function () {
    return view('wallet');
});

Route::get('about', function () {
    return view('about');
});

Route::get('career', function () {
    return view('career');
});

Route::get('terms', function () {
    return redirect(url('faqs'));
});

Route::get('privacy', function () {
    return redirect(url('faqs'));
});

Route::get('faqs', function () {
    return view('faqs');
});

Route::get('contact', function () {
    return view('contact');
});

Route::post('contact', function (Request $request) {
    $request->validate([
        'name' => 'required|string',
        'email' => 'required|email',
        'message' => 'required|string|max:191',
    ]);

    alert()->success('Message sent');

    return back();
})->name('contact');

Auth::routes(['verify' => true, 'register' => true, 'login' => true]);

Route::prefix('dashboard')->middleware(['auth', 'verified'])->group(function () {

    #home
    Route::get('', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

    #exchange
    Route::prefix('exchange')->group(function () {

        Route::get('', [App\Http\Controllers\ExchangeController::class, 'index'])->name('exchange');

        Route::post('buy', [App\Http\Controllers\ExchangeController::class, 'buy'])->name('buy');

        Route::post('sell', [App\Http\Controllers\ExchangeController::class, 'sell'])->name('sell');

        Route::post('send', [App\Http\Controllers\ExchangeController::class, 'send'])->name('send');
    });

    #account
    Route::prefix('account')->group(function () {

        Route::get('', [App\Http\Controllers\AccountController::class, 'index'])->name('account');
    });

    #settings
    Route::prefix('settings')->group(function () {

        Route::get('', [App\Http\Controllers\SettingsController::class, 'profile'])->name('settings');

        Route::post('update-user-profile', [App\Http\Controllers\SettingsController::class, 'updateUserProfile'])->name('update-user-profile');

        Route::post('update-contact-profile', [App\Http\Controllers\SettingsController::class, 'updateContactProfile'])->name('update-contact-profile');

        Route::post('update-personal-info', [App\Http\Controllers\SettingsController::class, 'updatePersonalInfo'])->name('update-personal-info');

        Route::get('preferences', [App\Http\Controllers\SettingsController::class, 'preferences'])->name('preferences');

        Route::post('update-preferences', [App\Http\Controllers\SettingsController::class, 'updatePreferences'])->name('update-preferences');

        Route::post('update-notifier', [App\Http\Controllers\SettingsController::class, 'updateNotifier'])->name('update-notifier');

        Route::get('security', [App\Http\Controllers\SettingsController::class, 'security'])->name('security');

        Route::post('update-password', [App\Http\Controllers\SettingsController::class, 'updatePassword'])->name('update-password');

        Route::get('accounts', [App\Http\Controllers\SettingsController::class, 'accounts'])->name('accounts');
    });

    #activities
    Route::prefix('activities')->group(function () {

        Route::get('', [App\Http\Controllers\ActivityController::class, 'index'])->name('activities');
    });
});
