<?php

namespace App\Http\Requests;

use App\Exceptions\ApiException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class ApiRequest extends FormRequest
{
    //Вызов искл, если провалена функция авторицазии
   public function failedAuthorization()
   {
       throw new ApiException('Authorization failed', 401);
   }
    //Вызов искл, если провалена функция валидации
   public function failedValidation(Validator $validator)
   {
       throw new ApiException('Validation failed', 422 , $validator->errors());
   }
}
