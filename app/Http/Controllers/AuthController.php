<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginView(){
        return view('peserta.login');
    }
    public function checkLogin(FormLoginRequest $formLoginRequest){
        //validated
        $validated = $formLoginRequest->validated();
        //jika sudah di validasi oleh form validation
        if ( Auth::attempt($validated) )
        {
            $user = Auth::user();
            $route = match($user->role){
                'peserta' => route('peserta.index'),
                'admin' => route('backoffice'),
                'petugas' => route('backoffice'),
            };
            return redirect($route,302);
        } else {
            return redirect()->back()->with([
                'email' => "Email atau password salah!"
            ]);
        }
    }
}
