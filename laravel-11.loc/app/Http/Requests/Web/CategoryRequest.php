<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    // Правило авторизации
    public function authorize(): bool
    {
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
