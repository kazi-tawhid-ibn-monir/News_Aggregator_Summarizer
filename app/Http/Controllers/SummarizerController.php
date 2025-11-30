<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SummarizerController extends Controller
{
    public function index()
    {
        return view('pages.summarizer', [
            'summary' => session('summary'),
        ]);
    }

    public function summarize(Request $request)
    {
        $request->validate([
            'text' => 'required|string|min:50',
        ]);

        $text = $request->input('text');

        // For now: placeholder summary so you can see the UI working
        $fakeSummary = 'This is a placeholder summary. In the next step it will come from a real AI API based on your pasted news text.';

        return back()
            ->withInput()
            ->with('summary', $fakeSummary);
    }
}
