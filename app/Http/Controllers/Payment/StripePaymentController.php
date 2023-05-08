<?php

namespace App\Http\Controllers\Payment;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Stripe;

class StripePaymentController extends Controller
{
    public function show(){
        return view('content.payment.checkout');
    }

    public function post(Request $request){

        // Set your secret key. Remember to switch to your live secret key in production.
        // See your keys here: https://dashboard.stripe.com/apikeys
        \Stripe\Stripe::setApiKey(env("STRIPE_SECRET", ""));

        // The price ID passed from the front end.
        $priceId = $request->priceId;

        $session = \Stripe\Checkout\Session::create([
        'success_url' => url("/payment-checkout"),
        'cancel_url' => url("/payment-checkout"),
        'mode' => 'subscription',
        'line_items' => [[
            'price' => $priceId,
            'quantity' => 1,
        ]],
        ]);

        if($session->url == "/checkout"){
            return redirect($session->url)->with('success', "Plano assinado com sucesso.");
        } else {
            return redirect($session->url)->with('error', "Erro ao assinar o plano. Tente novamente.");
        }
        
    }
}