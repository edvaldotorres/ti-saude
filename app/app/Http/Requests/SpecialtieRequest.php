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
            'spec_name' => 'required|string|max:255',
        ];
    }
}
