<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SpecialtieRequest;
use App\Models\Specialtie;
use Symfony\Component\HttpFoundation\JsonResponse;

class SpecialtieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        $specialties = Specialtie::simplePaginate(5);
        if ($specialties->isEmpty()) {
            return $this->notFound('Nenhuma especialidade encontrada.');
        }

        return $this->successWithArgs($specialties);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SpecialtieRequest $request): JsonResponse
    {
        Specialtie::create($request->validated());
        return $this->created('Especialidade criada com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): JsonResponse
    {
        $specialtie = Specialtie::find($id);
        if (empty($specialtie)) {
            return $this->notFound('Especialidade não encontrada.');
        }

        return $this->successWithArgs($specialtie);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SpecialtieRequest $request, $id): JsonResponse
    {
        $specialtie = Specialtie::find($id);
        if (empty($specialtie)) {
            return $this->notFound('Especialidade não encontrada.');
        }

        $specialtie->update($request->validated());
        return $this->successWithArgs($specialtie);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): JsonResponse
    {
        $specialtie = Specialtie::find($id);
        if (empty($specialtie)) {
            return $this->notFound('Especialidade não encontrada.');
        }

        $specialtie->delete();
        return $this->success('Especialidade removida com sucesso.');
    }
}
