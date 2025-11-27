<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class LocalNewsController extends Controller
{
    public function index(Request $request)
    {
        // শুধু Local / Bangladesh ক্যাটাগরির নিউজ নেব
        $query = News::query()
            ->where(function ($q) {
                $q->where('category', 'Local')
                  ->orWhere('category', 'Bangladesh');
            });

        // Search থাকলে apply করব
        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'like', '%' . $searchTerm . '%')
                  ->orWhere('excerpt', 'like', '%' . $searchTerm . '%');
            });
        }

        // সর্বোচ্চ ১২টা নিউজ
        $localNews = $query->latest('published_at')->take(12)->get();

        return view('pages.local-news', compact('localNews'));
    }
}
