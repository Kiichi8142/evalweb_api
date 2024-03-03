<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use App\Http\Requests\StoreEvaluationRequest;
use App\Http\Requests\StoreEvaluationSectionRequest;
use App\Http\Requests\UpdateEvaluationRequest;
use App\Http\Resources\EvaluationResource;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Evaluation::class);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return EvaluationResource::collection(auth()->user()->evaluations()->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEvaluationRequest $request)
    {
        $evaluation = $request->user()->evaluations()->create($request->validated());

        return EvaluationResource::make($evaluation);
    }

    /**
     * Display the specified resource.
     */
    public function show(Evaluation $evaluation)
    {
        return EvaluationResource::make($evaluation);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEvaluationRequest $request, Evaluation $evaluation)
    {
        $evaluation->update($request->validated());

        return EvaluationResource::make($evaluation);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evaluation $evaluation)
    {
        //
    }
}
