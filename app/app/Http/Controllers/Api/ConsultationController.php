<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ConsultationRequest;
use App\Models\Consultation;
use Symfony\Component\HttpFoundation\JsonResponse;

class ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        $consultations = Consultation::simplePaginate(5);
        if ($consultations->isEmpty()) {
            return $this->notFound('Nenhuma consulta encontrada.');
        }

        return $this->successWithArgs($consultations);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ConsultationRequest $request): JsonResponse
    {
        $consultation = Consultation::create($request->validated());
        $consultation->proceedings()->attach($request->get('proceeding_id'));

        return $this->created('Consulta criada com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): JsonResponse
    {
        $consultation = Consultation::find($id);
        if (empty($consultation)) {
            return $this->notFound('Consulta não encontrada.');
        }

        return $this->successWithArgs($consultation);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ConsultationRequest $request, $id): JsonResponse
    {
        $consultation = Consultation::find($id);
        if (empty($consultation)) {
            return $this->notFound('Consulta não encontrada.');
        }

        $consultation->update($request->validated());
        $consultation->proceedings()->sync($request->get('proceeding_id'));
        
        return $this->successWithArgs($consultation);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): JsonResponse
    {
        $consultation = Consultation::find($id);
        if (empty($consultation)) {
            return $this->notFound('Consulta não encontrada.');
        }

        $consultation->delete();
        return $this->success('Consulta removida com sucesso.');
    }
}
