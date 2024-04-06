<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Evaluation;
use App\Models\EvaluationItem;
use App\Models\Team;
use App\Models\Template;
use Illuminate\Http\Request;

class AddEvaluationToEmployeeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Template $template)
    {
        $questions = $template->questions;

        if ($questions->isEmpty()) {
            return response()->json(['message' => 'This template has no questions.'], 403);
        }

        $teams = Team::all();

        if ($teams->isEmpty()) {
            return response()->json(['message' => 'No teams to assign.'], 403);
        }

        $employees = Employee::all();

        if ($employees->isEmpty()) {
            return response()->json(['message' => 'No employees record found.'], 403);
        }

        // define acc for created evaluation
        $createdEvaluations = collect([]);

        foreach ($teams as $team) {
            $manager = $team->manager_id;
            $emps = $team->employees;

            // make evaluation for everyone in team
            // self evaluation
            foreach ($emps as $emp) {
                $eval = Evaluation::factory()->for($emp)->for($template)->create([
                    "user_id" => $emp->id
                ]);
                $createdEvaluations->push($eval);

                // make evaluation for manager or the above eval
                if($emp->id != $manager) {
                    $manager_evaluations = Evaluation::factory()->for($emp)->for($template)->create([
                        "user_id" => $manager,
                        "accessor_eval_id" => $eval->id
                    ]);
                    $createdEvaluations->push($manager_evaluations);
                }
            }
        }

        // checking if the evaluation successfully created
        if ($createdEvaluations->isEmpty()) {
            return response()->json(['message' => 'Failed to create evaluation for employee'], 403);
        }

        $createdItems = collect([]);

        foreach ($createdEvaluations as $evaluation) {
            foreach ($template->questions as $question) {
                $template->sections()->syncWithoutDetaching($question->section);
                $item = EvaluationItem::factory()->for($question)->for($evaluation)->for($question->section)->create();
                $createdItems->push($item);
            }
        }

        return response()->json(['message' => 'Created ' . $createdEvaluations->count() . ' evaluations with ' . $createdItems->count() . ' items'], 200);
    }
}
