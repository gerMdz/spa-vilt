<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class ProjectController extends Controller
{
    public function index()
    {
        return Inertia::render('Projects/All', [
            'proyectos' => Project::all(),
            'coloresDisponibles' => Project::getAvailableTexts(),
            'iconsDisponibles' => Project::getAvailableIcons(),
            ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => [
                'required',
                'max:255',
                Rule::unique(Project::class)
            ],
            'description' => [
                'required',
                'max:255',
            ],
            'color' => [
                'required',
                'in:' . implode(',', Project::getAvailableTexts() )
            ],
            'icon_name' => [
                'required',
                'in:' . implode(',', Project::getAvailableIcons())
            ],
        ]);
        Project::create($request->all());
        return redirect()->route('proyectos.index');
    }
}
