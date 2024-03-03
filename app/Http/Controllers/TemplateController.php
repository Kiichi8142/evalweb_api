<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSectionTemplateRequest;
use App\Models\Template;
use App\Http\Requests\StoreTemplateRequest;
use App\Http\Requests\UpdateTemplateRequest;
use App\Http\Resources\TemplateResource;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return TemplateResource::collection(Template::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTemplateRequest $request)
    {
        $template = Template::create($request->validated());

        return TemplateResource::make($template);
    }

    /**
     * Display the specified resource.
     */
    public function show(Template $template)
    {
        return TemplateResource::make($template);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTemplateRequest $request, Template $template)
    {
        $template->update($request->validated());

        return TemplateResource::make($template);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Template $template)
    {
        $template->delete();

        return response()->noContent();
    }

    public function addSections(StoreSectionTemplateRequest $request, Template $template)
    {
        $template->sections()->syncWithoutDetaching($request->sections);

        return 'Attached';
    }

    public function removeSections(StoreSectionTemplateRequest $request, Template $template)
    {
        $template->sections()->detach($request->sections);

        return response()->noContent();
    }
}
