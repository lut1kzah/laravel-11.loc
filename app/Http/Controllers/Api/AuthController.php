<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\ApiException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\RegisterRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    // Регистрация
    public function register(RegisterRequest $request){
        $role_user = Role::where('code','user')->first();
        $path = null;

        if ($request->has('avatar')) {
            $path = $request->file('avatar')->store('avatars', 'public');
        }

        $user = User::create([
            ...$request->validated(),'avatar' => $path, 'role_id' => $role_user->id,
        ]);

        $user->api_token = Hash::make(Str::random(60));
        $user->save();

        return response()->json([
            'user' => $user,
            'token' => $user->api_token,
        ])->setStatusCode(201);
    }
    //Аутентификация
    public function login(Request $request){
       if (!Auth::attempt($request->only('email', 'password'))){
           throw new ApiException('Unauthorized',401);
       }
       $user = Auth::user();
       $user->api_token = Hash::make(Str::random(60));
       $user->save();
       return response()->json([
           'user' => $user,
           'token' => $user->api_token,
       ])->setStatusCode(200);
    }
    public function logout(Request $request){
        $user = Auth::user();
        $user->api_token = null;
        $user->save();
        return response()->json([])->setStatusCode(200);
    }
}
