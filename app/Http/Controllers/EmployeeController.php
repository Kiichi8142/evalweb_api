<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Http\Resources\EmployeeResource;
use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return EmployeeResource::collection(Employee::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        $employee = Employee::create($request->validated());

        User::factory()->for($employee)->create([
            'name' => $employee->firstname . ' ' . $employee->lastname
        ]);

        return EmployeeResource::make($employee);
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return EmployeeResource::make($employee);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $employee->update($request->validated());

        return EmployeeResource::make($employee);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {

        $evaluations = $employee->evaluations;
        if ($evaluations) {
            foreach ($evaluations as $evaluation) {
                $evaluation->delete();
            }
        }

        if ($employee->team->manager_id == $employee->id) {
            $team = Team::find($employee->team)->first();
            $team->manager_id = null;
            $team->save();
        }

        if ($employee->user) {
            $employee->user->delete();
        }

        $employee->delete();

        return response()->noContent();
    }
}
