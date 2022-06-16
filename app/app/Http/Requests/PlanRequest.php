<?php

namespace App\Http\Requests;

class PlanRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'plan_description' => 'required',
            'plan_telephone' => 'required|string',
        ];
    }
}
