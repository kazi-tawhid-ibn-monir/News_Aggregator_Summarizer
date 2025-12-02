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
        // Step 1: Clear button pressed?
        if ($request->has('clear')) {
            return back()->with('summary', null)->withInput([]);
        }

        // Step 2: Validation
        $request->validate([
            'text' => 'required|string|min:20',
        ]);

        $text = $request->input('text');

        try {
            // Step 3: API config
            $apiUrl = config('services.summarizer.url');
            $apiKey = config('services.summarizer.key');

            // Step 4: Fallback if API missing
            if (!$apiUrl || !$apiKey) {
                $summary = $this->localFallbackSummary($text);
                return back()->withInput()->with('summary', $summary);
            }

            // Step 5: Make API Request
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $apiKey,
                'Accept'        => 'application/json',
            ])->post($apiUrl, [
                'inputs' => $text,
            ]);

            if ($response->failed()) {
                return back()->withInput()->with('error', 'API request failed.');
            }

            $data = $response->json();

            // Step 6: UNIVERSAL RESPONSE PARSER
            $summary = null;

            // Format A
            if (isset($data[0]['summary_text'])) {
                $summary = $data[0]['summary_text'];
            }

            // Format B
            if (!$summary && isset($data[0]['generated_text'])) {
                $summary = $data[0]['generated_text'];
            }

            // Format C
            if (!$summary && isset($data['summary'])) {
                $summary = $data['summary'];
            }

            // Format D
            if (!$summary && isset($data['generated_text'])) {
                $summary = $data['generated_text'];
            }

            // Still no summary?
            if (!$summary) {
                return back()->withInput()->with('error', 'API did not return a valid summary.');
            }

            return back()->withInput()->with('summary', $summary);

        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'API Error: ' . $e->getMessage());
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
