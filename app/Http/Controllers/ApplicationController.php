<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Programme;
use App\Models\University;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ApplicationController extends Controller
{
    public function create(Request $request)
    {
        return Inertia::render('Apply/Create', [
            'universities' => University::where('is_active', true)->select('id', 'name')->get(),
            'selected_programme' => $request->has('programme_id') 
                ? Programme::with('university')->find($request->programme_id) 
                : null,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'university_id' => 'required|exists:universities,id',
            'programme_id' => 'required|exists:programmes,id',
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'nationality' => 'required|string|max:100',
            'personal_statement' => 'nullable|string|max:2000',
        ]);

        $application = Application::create($validated);

        return redirect()->route('home')->with('success', "Application submitted! Reference: {$application->reference}");
    }
}
