<?php

namespace App\Http\Requests;

class PatientRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        /**
         * Get the validation rules that apply to the request.      
         *
         * @return array<string, mixed>
         */
        return [
            'pat_name' => 'required|string|max:255',
            'pat_birth' => 'required|date|date_format:d/m/Y',
            'pat_telephone' => 'required|array',
        ];
    }
}
