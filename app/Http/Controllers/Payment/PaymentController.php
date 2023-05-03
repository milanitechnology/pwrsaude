<?php

namespace App\Http\Controllers\Payment;
use App\Http\Controllers\Controller;
use App\Models\PaymentDetails;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function show(){
        $users_id = auth()->user()->id;
        $payment = PaymentDetails::where("users_id", $users_id)->first();
        return view('content.payment.details', compact('payment'));
    }

    /**
     * Grava informações de pagamento do usuário
     * 
     * @param PaymentRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) 
    {
        $users_id = auth()->user()->id;

        if(is_null(PaymentDetails::where("users_id", $users_id)->first())){
            $countRows = 0;
        } else {
            $countRows = PaymentDetails::where("users_id", $users_id)->first()->count();
        }
       
        if($countRows == 0){
            $details = [
                'users_id' => $users_id,
                'payment_form' => $request->payment_form,
                'name' => $request->name,
                'number' => $request->number,
                'cvc' => $request->cvc,
                'expiration_month' => $request->expiration_month,
                'expiration_year' => $request->expiration_year,
            ];
            
            PaymentDetails::create($details); 
        } else {
            $payment = PaymentDetails::where('users_id', $users_id)->first();

            $payment->payment_form = $request->payment_form;
            $payment->name = $request->name;
            $payment->number = $request->number;
            $payment->cvc = $request->cvc;
            $payment->expiration_month = $request->expiration_month;
            $payment->expiration_year = $request->expiration_year;
            $payment->save();
        }

        return redirect('/payment-details')->with('success', "Forma de Pagamento cadastrada com sucesso.");
    }
}