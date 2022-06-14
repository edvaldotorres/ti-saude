<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\HealthPlanRequest;
use App\Models\HealthPlan;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class HealthPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        $healthPlans = HealthPlan::simplePaginate(5);
        if ($healthPlans->isEmpty()) {
            return $this->notFound('Nenhum plano de saúde encontrado.');
        }

        return $this->successWithArgs($healthPlans);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HealthPlanRequest $request): JsonResponse
    {
        HealthPlan::create($request->validated());
        return $this->created('Plano de saúde criado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): JsonResponse
    {
        $healthPlan = HealthPlan::find($id);
        if (empty($healthPlan)) {
            return $this->notFound('Plano de saúde não encontrado.');
        }

        return $this->successWithArgs($healthPlan);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HealthPlanRequest $request, $id): JsonResponse
    {
        $healthPlan = HealthPlan::find($id);
        if (empty($healthPlan)) {
            return $this->notFound('Plano de saúde não encontrado.');
        }

        $healthPlan->update($request->validated());
        return $this->successWithArgs($healthPlan);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): JsonResponse
    {
        $healthPlan = HealthPlan::find($id);
        if (empty($healthPlan)) {
            return $this->notFound('Plano de saúde não encontrado.');
        }

        $healthPlan->delete();
        return $this->success('Plano de saúde excluído com sucesso.');
    }
}
