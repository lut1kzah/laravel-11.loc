<?php

namespace App\Http\Requests\Api;

use App\Exceptions\ApiException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class ApiRequest extends FormRequest
{
    //Вызов искл, если провалена функция авторицазии
   public function failedAuthorization()
   {
       throw new ApiException('Forbidden', 403);
   }
    //Вызов искл, если провалена функция валидации
   public function failedValidation(Validator $validator)
   {
       throw new ApiException('Unprocessable content', 422 , $validator->errors());
   }
}
