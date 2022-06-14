<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DoctorRequest;
use App\Models\Doctor;
use Symfony\Component\HttpFoundation\JsonResponse;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        $doctors = Doctor::simplePaginate(5);
        if ($doctors->isEmpty()) {
            return $this->notFound('Nenhum médico encontrado.');
        }

        return $this->successWithArgs($doctors);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DoctorRequest $request): JsonResponse
    {
        Doctor::create($request->validated());
        return $this->created('Médico criado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): JsonResponse
    {
        $doctor = Doctor::find($id);
        if (empty($doctor)) {
            return $this->notFound('Médico não encontrado.');
        }

        return $this->successWithArgs($doctor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DoctorRequest $request, $id): JsonResponse
    {
        $doctor = Doctor::find($id);
        if (empty($doctor)) {
            return $this->notFound('Médico não encontrado.');
        }

        $doctor->update($request->validated());
        return $this->successWithArgs($doctor);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): JsonResponse
    {
        $doctor = Doctor::find($id);
        if (empty($doctor)) {
            return $this->notFound('Médico não encontrado.');
        }

        $doctor->delete();
        return $this->success('Médico removido com sucesso.');
    }
}
