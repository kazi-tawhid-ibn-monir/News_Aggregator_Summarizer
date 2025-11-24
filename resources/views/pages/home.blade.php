@extends('layouts.app')
@section('title', 'Home')

@section('content')
    <div class="container">
        <h1>Welcome to Intelligent News Aggregator</h1>
        <p>This web platform helps you stay informed with the latest local and international news, and quickly summarize articles using AI.</p>
        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(270px,1fr));gap:28px;margin-top:32px;">
        @foreach ([
            ['title' => 'AI Revolutionizes News Summaries', 'excerpt' => 'New AI models can analyze and summarize global articles in seconds.', 'source' => 'TechCrunch'],
            ['title' => 'Bangladesh Wins Cricket Series', 'excerpt' => 'A thrilling victory puts Bangladesh on top in the latest test match.', 'source' => 'BBC Sports'],
            ['title' => 'Weather Alert: Heavy Rain Predicted', 'excerpt' => 'Meteorologists warn of a severe weather event in the region.', 'source' => 'Daily Star'],
        ] as $news)
            <div style="
                background:#fff;
                border-radius:12px;
                box-shadow:0 2px 8px #667eea33;
                padding:20px;
                text-align:left;
                ">
                <h3 style="color:#667eea;margin-bottom:8px;">{{ $news['title'] }}</h3>
                <p style="margin-bottom:10px;">{{ $news['excerpt'] }}</p>
                <span style="font-size:0.95em;color:#888;">{{ $news['source'] }}</span>
            </div>
        @endforeach
        </div>
    </div>
@endsection
