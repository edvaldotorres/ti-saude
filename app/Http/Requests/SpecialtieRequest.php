<?php

namespace App\Http\Requests;

class SpecialtieRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'spec_code' => (!empty($this->route('especialidade')) ? 'required|string|max:255|unique:specialties,spec_code,' . $this->route('especialidade') : 'required|string|max:255|unique:specialties,spec_code'),
            'spec_name' => 'required|string|max:255',
        ];
    }
}
