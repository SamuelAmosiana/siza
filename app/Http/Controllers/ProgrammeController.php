<?php

namespace App\Http\Controllers;

use App\Models\Programme;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProgrammeController extends Controller
{
    public function index(Request $request)
    {
        $query = Programme::query()
            ->with('university')
            ->where('is_active', true);

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhereHas('university', function($uq) use ($search) {
                      $uq->where('name', 'like', "%{$search}%");
                  });
            });
        }

        if ($request->has('level')) {
            $query->where('level', $request->level);
        }

        return Inertia::render('Programmes/Index', [
            'programmes' => $query->latest()->get(),
            'filters' => $request->only(['search', 'level'])
        ]);
    }
}
