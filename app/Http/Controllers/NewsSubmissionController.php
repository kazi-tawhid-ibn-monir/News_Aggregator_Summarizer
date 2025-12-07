<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsSubmissionController extends Controller
{
    public function create()
    {
        return view('pages.news-submission');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'excerpt'     => 'required|string|max:500',
            'content'     => 'required|string',
            'category'    => 'required|string|max:100',
            'source'      => 'nullable|string|max:150',
        ]);

        News::create([
            'title'        => $data['title'],
            'excerpt'      => $data['excerpt'],
            'content'      => $data['content'],
            'category'     => $data['category'],
            'source'       => $data['source'] ?: 'User Submitted',
            'published_at' => now(),
        ]);

        return redirect()
            ->route('news-submission')
            ->with('success', 'Thank you! Your news has been submitted.');
    }
}
