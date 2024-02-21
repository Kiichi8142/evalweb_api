<?php

namespace App\Http\Resources;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TeamResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "name" => $this->name,
            "department" => $this->department,
            "manager" => Employee::select('id', 'firstname', 'lastname', 'position')->findOr($this->manager_id, function () {
                return "None";
            }),
        ];
    }
}
