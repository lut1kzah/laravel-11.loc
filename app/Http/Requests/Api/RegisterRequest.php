<?php

namespace App\Http\Requests\Api;

class RegisterRequest extends ApiRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'surname' => 'required|string|max:32|min:2',
            'name' => 'required|string|max:32,min:2',
            'patronymic' => 'nullable|string|max:64,min:2',
            'sex'=> 'required|boolean',
            'birth_date'=> 'required|date',
            'avatar' => 'nullable|mimes:jpeg,png,jpg,svg|max:4096',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|max:255,min:2',
            'nickname' => 'required|string|max:32|min:2|unique:users',
            'phone' => 'nullable|string|max:16|min:10|unique:users',
        ];
    }
    //errors
    public function messages(): array{
        return [
            'surname.required' => 'Поле фамилия обязательное!!!',
            'name.required' => 'Поле имя обязательное!!!',
            'sex.required' => 'Пол обязателен!!!',
            'birth_date.required' => 'Поле ДР обязательное!!!',
            'email.required' => 'Поле почта обязательное!!!',
            'password.required' => 'Поле пороль обязательное!!!',
            'nickname.required' => 'nick nado nado',
            'surname.max' => 'Фамилия должна состоять максимум из 32 символов!',
            'avatar.max' => 'Аватар должна состоять максимум из 4MB!',
            'name.max' => 'Имя должна состоять максимум из 32 символов!',
            'email.max' => 'Почта должна состоять максимум из 32 символов!',
            'password.max' => 'Пороль должна состоять максимум из 255 символов!',
            'patronymic.max' => 'Отчество должна состоять максимум из 64 символов!',
            'sex.boolean' => 'Пол должен содержать значение 0/1',
            'birth_date.date' => 'Дата должна быть в формате 0000-00-00',
            'avatar.mimes' => 'Файл должен быть формата jpeg,png,jpg,svg',
            'email.email' => 'Электронная почта должна иметь формат эл.адресса ',
            'email.unique' => 'Данная эл.почта занята другим пользователем, введите свою НЕзарегестрированную почту',
            'phone.unique' => 'Данная phone занята другим пользователем, введите свою НЕзарегестрированную почту',
            'nickname.unique' => 'Данная nick занята другим пользователем, введите свою НЕзарегестрированную почту',
        ];
    }
}
