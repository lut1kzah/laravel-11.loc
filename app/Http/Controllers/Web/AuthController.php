<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function ShowFormLogin(){
        return view('auth.login');
    }
    public function login(Request $request){
        $user = Auth::attempt($request->only('email','password'));

        if(Auth::attempt($request->only('email','password'))){
            $request->session()->regenerate();
            return redirect()->route('home');
        }else{
            return back()->withErrors(['error'=> 'Not login or password']);
        }
    }
    public function logout(Request $request){
        Auth::logout();
        return redirect()->route('login');
    }
}
