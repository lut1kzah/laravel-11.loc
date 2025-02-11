<?php

namespace App\Http\Requests\Api;

use App\Exceptions\ApiException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class ApiRequest extends FormRequest
{
    // Делаем вызов исключения, если провалена функция авторизации
    public function failedAuthorization()
    {
        throw new ApiException('Forbidden', 403);
    }
    // Делаем вызов исключения, если провалена функция валидации данных
    public function failedValidation(Validator $validator)
    {
        throw new ApiException('Validation failed', 422, $validator->errors());
    }
}
