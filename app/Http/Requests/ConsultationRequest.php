<?php

namespace App\Http\Requests;

class ConsultationRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'cons_code' => (!empty($this->route('consulta')) ? 'required|string|max:255|unique:consultations,cons_code,' . $this->route('consulta') : 'required|string|max:255|unique:consultations,cons_code'),
            'doctor_id' => 'required|integer|exists:doctors,id',
            'patient_id' => 'required|integer|exists:patients,id',
            'consultation_type' => 'required|in:0,1',
            'cons_date' => 'required|date|date_format:d/m/Y',
            'cons_time' => 'required|date_format:H:i',
        ];
    }
}
