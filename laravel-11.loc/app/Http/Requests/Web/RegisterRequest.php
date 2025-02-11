<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'surname' => 'required|string|max:32',
            'name' => 'required|string|max:32',
            'patronymic' => 'nullable|string|max:64',
            'sex' => 'required|boolean',
            'birth_date'=> 'required|date',
            'avatar'=> 'nullable|mimes:jpeg,png,jpg,svg|max:4096',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|max:255|confirmed',
        ];
    }
    // Кастомизация сообщений об ошибках валидации
    public function messages(): array {
        return [
            'surname.required' => 'Фамилия обязательна для заполнения',
            'name.required' => 'Имя обязательно для заполнения',
            'sex.required' => 'Пол обязателен для заполнения',
            'birth_date.required' => 'Дата рождения обязательна для заполнения',
            'email.required' => 'Электронная почта обязательна для заполнения',
            'password.required' => 'Пароль обязателен для заполнения',
            'surname.max' => 'Фамилия должна состоять максимум из 32 символов',
            'name.max' => 'Имя должно состоять максимум из 32 символов',
            'patronymic.max' => 'Отчество должно состоять максимум из 64 символов',
            'avatar.max' => 'Аватар не должен превышать 4 MB',
            'email.max' => 'Электронная почта должна состоять максимум из 255 символов',
            'password.max' => 'Пароль должен состоять максимум из 255 символов',
            'sex.boolean' => 'Пол должен содержать значение 0 или 1',
            'birth_date.date' => 'Дата рождения должна быть в формате YYYY-MM-DD',
            'avatar.mimes' => 'Файл должен быть формата jpeg, png, jpg, svg',
            'email.email' => 'Электронная почта должна быть в правильном формате электронного адреса',
            'email.unique' => 'Данная электронная почта уже используется другим пользователем',
            'password.confirmed' => 'Пароли не совпадают',
        ];
    }
}
