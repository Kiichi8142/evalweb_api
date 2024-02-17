<?php

namespace App\Http\Controllers;

use App\Models\EvaluationItem;
use App\Http\Requests\StoreEvaluationItemRequest;
use App\Http\Requests\UpdateEvaluationItemRequest;
use App\Http\Resources\EvaluationItemResource;

class EvaluationItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return EvaluationItemResource::collection(EvaluationItem::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEvaluationItemRequest $request)
    {
        $item = EvaluationItem::create($request->validated());

        return EvaluationItemResource::make($item);
    }

    /**
     * Display the specified resource.
     */
    public function show(EvaluationItem $item)
    {
        return EvaluationItemResource::make($item);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEvaluationItemRequest $request, EvaluationItem $item)
    {
        $item->update($request->validated());

        return EvaluationItemResource::make($item);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EvaluationItem $item)
    {
        //
    }
}
