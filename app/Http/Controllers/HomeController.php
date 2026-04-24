<?php

namespace App\Http\Controllers;

use App\Models\University;
use App\Models\Programme;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        return Inertia::render('Home', [
            'stats' => [
                'universities_count' => University::count(),
                'programmes_count' => Programme::count(),
            ],
            'featured_universities' => University::where('is_featured', true)->orWhere('id', '>', 0)->limit(3)->get(),
        ]);
    }
}
