<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => 'required|exists:users,email',
            'product' => 'required|exists:products,name',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        Log::error($validator->errors());
        $errors = $validator->errors();

        throw new HttpResponseException(
            response()->json([
                'success' => false,
                'errors' => $errors
            ], JsonResponse::HTTP_BAD_REQUEST)
        );
    }
}
