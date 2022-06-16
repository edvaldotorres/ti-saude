<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlanRequest;
use App\Models\Plan;
use Symfony\Component\HttpFoundation\JsonResponse;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        $plans = Plan::simplePaginate(5);
        if ($plans->isEmpty()) {
            return $this->notFound('Nenhum plano de saúde encontrado.');
        }

        return $this->successWithArgs($plans);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlanRequest $request): JsonResponse
    {
        Plan::create($request->validated());
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
        $plan = Plan::find($id);
        if (empty($plan)) {
            return $this->notFound('Plano de saúde não encontrado.');
        }

        return $this->successWithArgs($plan);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PlanRequest $request, $id): JsonResponse
    {
        $plan = Plan::find($id);
        if (empty($plan)) {
            return $this->notFound('Plano de saúde não encontrado.');
        }

        $plan->update($request->validated());
        return $this->successWithArgs($plan);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): JsonResponse
    {
        $plan = Plan::find($id);
        if (empty($plan)) {
            return $this->notFound('Plano de saúde não encontrado.');
        }

        $plan->delete();
        return $this->success('Plano de saúde excluído com sucesso.');
    }
}
