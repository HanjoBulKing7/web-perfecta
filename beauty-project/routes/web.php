<?php
use App\Http\Controllers\StripeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/payment', 
[StripeController::class, 'showPaymentForm'])->name('payment.form');
Route::post('/payment', 
[StripeController::class, 'processPayment'])->name('payment.process');