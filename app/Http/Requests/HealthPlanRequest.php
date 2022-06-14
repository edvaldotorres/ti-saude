<?php

namespace App\Http\Requests;

class HealthPlanRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'hp_description' => 'required',
            'hp_telephone' => 'required|string',
        ];
    }
}
