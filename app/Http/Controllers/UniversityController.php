<?php

namespace App\Http\Controllers;

use App\Models\University;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UniversityController extends Controller
{
    public function index(Request $request)
    {
        $query = University::query()->where('is_active', true);

        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('location', 'like', '%' . $request->search . '%');
        }

        if ($request->has('type')) {
            $query->where('type', $request->type);
        }

        return Inertia::render('Universities/Index', [
            'universities' => $query->withCount('programmes')->get(),
            'filters' => $request->only(['search', 'type'])
        ]);
    }

    public function show(University $university)
    {
        return Inertia::render('Universities/Show', [
            'university' => $university->load(['programmes' => function($q) {
                $q->where('is_active', true);
            }]),
        ]);
    }
}
