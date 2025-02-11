<?php

namespace App\Http\Requests\Api;

use App\Exceptions\ApiException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CategoryRequest extends ApiRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = Auth::user();
        if (!($user->role->code === 'admin')) {
            return false;
        }
        return true;
    }


    public function rules(): array
    {
        return [
            'name' => 'required|string|max:64',
        ];
    }
    public function messages(): array{
        return [
            'name.required' => 'Поле имя обязательное!!!',
            'name.max' => 'Поле 64 max',
        ];
    }
}
