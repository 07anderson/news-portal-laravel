<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use App\Models\Category;

class DashboardController extends Controller
{
    public function __invoke()
    {
        return view('dashboard', [
            'newsCount' => News::count(),
            'published' => News::where('is_published', true)->count(),
            'drafts' => News::where('is_published', false)->count(),
            'usersCount' => User::count(),
            'categoriesCount' => Category::count(),
            'latestNews' => News::latest()->take(5)->get(),
        ]);
    }
}
