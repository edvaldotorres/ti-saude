<?php

namespace App\Http\Requests;

class ProceedingRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'proc_code' => (!empty($this->route('procedimento')) ? 'required|string|max:255|unique:proceedings,proc_code,' . $this->route('procedimento') : 'required|string|max:255|unique:proceedings,proc_code'),
            'proc_name' => 'required|string|max:255',
            'proc_price' => 'required|numeric',
        ];
    }
}
