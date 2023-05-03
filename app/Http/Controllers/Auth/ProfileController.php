<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    public function show(){
        return view('content.auth.update-profile');
    }

    /**
     * Handle account update request
     * 
     * @param UpdateRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) 
    {
        $email = auth()->user()->email;
        $user = User::where('email', $email)->first();

        $user->name = $request->name;
        $user->cep = $request->cep;
        $user->address = $request->address;
        $user->number = $request->number;
        $user->complement = $request->complement;
        $user->neighborhood = $request->neighborhood;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->phone = $request->phone;
        $user->save();

        return redirect('/profile')->with('success', "Conta atualizada com sucesso.");
    }
}