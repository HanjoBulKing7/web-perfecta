<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;

class StripeController extends Controller
{
    public function showPaymentForm()
    {
        return view('payment.form');
    }

    public function processPayment(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
            'stripeToken' => 'required',
        ]);

        Stripe::setApiKey(config('services.stripe.secret'));

        try {
            $charge = Charge::create([
                'amount' => $request->amount * 100, // Stripe usa centavos
                'currency' => 'usd',
                'source' => $request->stripeToken,
                'description' => 'Pago desde Laravel App',
            ]);

            return back()->with('success', 'Pago realizado exitosamente! ID: ' . $charge->id);
        } catch (\Exception $e) {
            return back()->with('error', 'Error en el pago: ' . $e->getMessage());
        }
    }
}