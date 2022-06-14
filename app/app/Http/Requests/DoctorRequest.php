<?php

namespace App\Http\Requests;

class DoctorRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'doc_name' => 'required|string',
            'doc_crm' => 'required|string',
            'specialtie_id' => 'required|integer|exists:specialties,id',
        ];
    }
}
