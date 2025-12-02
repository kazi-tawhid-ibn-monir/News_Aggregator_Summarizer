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
        'text' => 'required|string|min:20',
    ]);

    $text = $request->input('text');

    try {
        // Read config from .env
        $apiUrl = config('services.summarizer.url');
        $apiKey = config('services.summarizer.key');

        if (!$apiUrl || !$apiKey) {
            $summary = $this->localFallbackSummary($text);

            return back()
                ->withInput()
                ->with('summary', $summary);
        }

        $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $apiKey,
                'Accept'        => 'application/json',
            ])
            ->post($apiUrl, [
                'text' => $text,
                'length' => 'short',
            ]);

        if ($response->failed()) {
            return back()
                ->withInput()
                ->with('error', 'Summarization API request failed. Please try again later.');
        }

        $data = $response->json();
        $summary = $data['summary'] ?? null;

        if (!$summary) {
            return back()
                ->withInput()
                ->with('error', 'The AI API did not return a valid summary.');
        }

        // Step 7: Success → send summary to UI
        return back()
            ->withInput()
            ->with('summary', $summary);

    } catch (\Exception $e) {
        return back()
            ->withInput()
            ->with('error', 'Something went wrong while calling the AI API.');
    }
}
protected function localFallbackSummary(string $text): string
{
    $sentences = preg_split('/(?<=[.?!])\s+/', trim($text));
    if (!$sentences) {
        return 'Could not generate a summary from the provided text.';
    }

    $summarySentences = array_slice($sentences, 0, 3);
    return implode(' ', $summarySentences);
}
}