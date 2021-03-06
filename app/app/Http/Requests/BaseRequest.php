<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;

class BaseRequest extends FormRequest
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
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório',
            'string' => 'O campo :attribute deve ser uma string',
            'max' => 'O campo :attribute deve ter no máximo :max caracteres',
            'date' => 'O campo :attribute deve ser uma data válida',
            'date_format' => 'O campo :attribute deve ser uma data válida',
            'numeric' => 'O campo :attribute deve ser um número',
            'exists' => 'O campo :attribute não existe',
            'in' => 'O campo :attribute deve ser um valor válido',
            'date_format.H:i' => 'O campo :attribute deve ser uma hora válida',
            'email' => 'O campo :attribute deve ser um e-mail válido',
            'unique' => 'O campo :attribute já existe',
            'min' => 'O campo :attribute deve ter no mínimo :min caracteres',
        ];
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator $validator
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function failedValidation($validator): void
    {
        throw new HttpResponseException(response()->json([
            'messenge'   => current($validator->errors()->all()),
        ], Response::HTTP_BAD_REQUEST));
    }
}
