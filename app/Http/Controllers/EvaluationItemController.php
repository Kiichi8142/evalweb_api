<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use App\Models\EvaluationItem;
use App\Http\Requests\StoreEvaluationItemRequest;
use App\Http\Requests\UpdateEvaluationItemRequest;
use App\Http\Resources\EvaluationItemResource;
use Illuminate\Http\Request;

class EvaluationItemController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(EvaluationItem::class, 'item');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $userId = $request->user()->id;
        $items = Evaluation::with('items')
            ->where('user_id', $userId)
            ->get()
            ->flatMap(function ($evaluation) {
                return $evaluation->items;
            });

        return EvaluationItemResource::collection($items);
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
