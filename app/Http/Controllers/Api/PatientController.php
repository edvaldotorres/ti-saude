<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PatientRequest;
use App\Models\Patient;
use Symfony\Component\HttpFoundation\JsonResponse;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        $patients = Patient::simplePaginate(5);
        if ($patients->isEmpty()) {
            return $this->notFound('Nenhum paciente encontrado.');
        }

        return $this->successWithArgs($patients);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PatientRequest $request): JsonResponse
    {
        Patient::create($request->validated());
        return $this->created('Paciente criado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): JsonResponse
    {
        $patient = Patient::find($id);
        if (empty($patient)) {
            return $this->notFound('Paciente não encontrado.');
        }

        return $this->successWithArgs($patient);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PatientRequest $request, $id): JsonResponse
    {
        $patient = Patient::find($id);
        if (empty($patient)) {
            return $this->notFound('Paciente não encontrado.');
        }

        $patient->update($request->validated());
        return $this->successWithArgs($patient);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): JsonResponse
    {
        $patient = Patient::find($id);
        if (empty($patient)) {
            return $this->notFound('Paciente não encontrado.');
        }

        $patient->delete();
        return $this->success('Paciente excluído com sucesso.');
    }
}
