<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\RegisterRequest;
use App\Models\Role;
use App\Models\User;
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

    public function showFormRegister(Request $request)
    {
       return view('auth.register');
    }
    public function register(RegisterRequest $request)
    {
        $role_user = Role::where('code','user')->first();
        $path = null;

        if ($request->has('avatar')) {
            $path = $request->file('avatar')->store('avatars', 'public');
        }

        $user = User::create([
            ...$request->validated(),'avatar' => $path, 'role_id' => $role_user->id,
        ]);
        Auth::login($user);
        return redirect()->route('home');
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect()->route('login');
    }
}
