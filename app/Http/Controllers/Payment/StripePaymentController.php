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
        $email = auth()->user()->email;

        $creditCardToken = $request->stripeToken;

        $user = User::where("email", $email)->first();
        $user->newSubscription('default', 'price_monthly')->create($creditCardToken, [
            'email' => $email, 'description' => 'Primeiro plano de assinatura'
        ]);
    }
}