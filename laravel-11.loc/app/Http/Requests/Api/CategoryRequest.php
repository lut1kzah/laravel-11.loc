<?php

namespace App\Http\Requests\Api;

use App\Exceptions\ApiException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CategoryRequest extends ApiRequest
{
    // Правило авторизации
    public function authorize(): bool
    {
        $user = Auth::user();
        if (!($user->role->code === 'admin')) {
            return false;
        }
        return true;
    }

    // Правила валидации данных
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:64',
        ];
    }

    // Кастомизация сообщений об ошибках валидации
    public function messages(): array {
        return [
            'name.required' => 'Название категории обязательно для заполнения',
            'name.max' => 'Название категории должно состоять максимум из 64 символов',
        ];
    }
}
