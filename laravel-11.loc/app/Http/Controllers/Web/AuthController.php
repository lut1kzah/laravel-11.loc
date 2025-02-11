<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\RegisterRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    // Показать форму входа
    public function showFormLogin() {
        return view('auth.login');
    }

    // Аутентификация
    public function login(Request $request) {

        if (Auth::attempt($request->only('email', 'password'))) {
           $request->session()->regenerate();
           return redirect()->route('home');
        } else {
            return back()->withErrors(['error' => 'Не правильный логин или пароль']);
        }
    }

    // Показать форму регистрации
    public function showFormRegister(Request $request) {
        return view('auth.register');
    }

    // Регистрация
    public function register(RegisterRequest $request) {
        // Извлечение ID роли 'пользователь'
        $role_user = Role::where('code', 'user')->first();

        $path = null;

        // Сохранение аватара пользователя
        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('avatars', 'public');
        }

        // Создание пользователя
        $user = User::create([
            ...$request->validated(), 'avatar' => $path, 'role_id' => $role_user->id
        ]);

        // Аутентификация
        Auth::login($user);

        // Ответ
        return redirect()->route('home');
    }

    // Выход
    public function logout(Request $request) {
        Auth::logout();
        return redirect()->route('home');
    }
}
