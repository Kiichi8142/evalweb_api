<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EvaluationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "description" => $this->description,
            "is_completed" => (bool) $this->isCompleted,
            "items" => EvaluationItemResource::collection($this->items),
            "employee" => EmployeeResource::make($this->employee),
            "assessor" => EmployeeResource::make($this->user->employee),
            "sections" => $this->sections,
        ];
    }
}
