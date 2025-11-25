<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $query = News::query();
        
        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('title', 'like', '%' . $searchTerm . '%')
                  ->orWhere('excerpt', 'like', '%' . $searchTerm . '%');
            });
        }
        
        // Category filter
        if ($request->has('category') && $request->category != 'All') {
            $query->where('category', $request->category);
        }
        
        $newsItems = $query->latest('published_at')->take(12)->get();
        
        return view('pages.home', compact('newsItems'));
    }
}
