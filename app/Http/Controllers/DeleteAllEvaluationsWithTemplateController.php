<?php

namespace App\Http\Controllers;

use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DeleteAllEvaluationsWithTemplateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $data = $request->validate([
            'template_id' => "required|exists:templates,id",
        ]);

        Log::info('Deleteing all evaluations requested for template id ' . $data);

        $template = Template::with('questions')->find($data)->first();

        $evaluations = $template->evaluations;

        if ($evaluations->isEmpty()) {
            return response()->json(['message' => 'No teams to assign.'], 403);
        }

        foreach ($evaluations as $evaluation) {
            $evaluation->delete();
        }

        return response()->noContent();
    }
}
