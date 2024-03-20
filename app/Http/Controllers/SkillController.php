<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\In;
use Inertia\Inertia;

class SkillController extends Controller
{
    public function index()
    {

        return Inertia::render('Skills/All', [
            'habilidades' => Skill::all()
        ]);
    }
}
