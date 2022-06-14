<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProceedingRequest;
use App\Models\Proceeding;
use Symfony\Component\HttpFoundation\JsonResponse;

class ProceedingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        $proceedings = Proceeding::simplePaginate(5);
        if ($proceedings->isEmpty()) {
            return $this->notFound('Nenhum procedimento encontrado.');
        }

        return $this->successWithArgs($proceedings);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProceedingRequest $request): JsonResponse
    {
        Proceeding::create($request->validated());
        return $this->created('Procedimento criado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): JsonResponse
    {
        $proceeding = Proceeding::find($id);
        if (empty($proceeding)) {
            return $this->notFound('Procedimento não encontrado.');
        }

        return $this->successWithArgs($proceeding);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProceedingRequest $request, $id): JsonResponse
    {
        $proceeding = Proceeding::find($id);
        if (empty($proceeding)) {
            return $this->notFound('Procedimento não encontrado.');
        }

        $proceeding->update($request->validated());
        return $this->successWithArgs($proceeding);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): JsonResponse
    {
        $proceeding = Proceeding::find($id);
        if (empty($proceeding)) {
            return $this->notFound('Procedimento não encontrado.');
        }

        $proceeding->delete();
        return $this->success('Procedimento excluído com sucesso.');
    }
}
