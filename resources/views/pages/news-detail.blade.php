@extends('layouts.app')
@section('title', $news->title)

@section('content')
<div style="max-width:1200px;margin:0 auto;padding:0 20px;">
    
    <!-- Back Button -->
    <a href="{{ route('home') }}" style="display:inline-block;margin-bottom:24px;color:#667eea;text-decoration:none;font-weight:600;">
        ← Back to Homepage
    </a>

    <!-- Article Header -->
    <div style="margin-bottom:32px;">
        <span style="background:#667eea;color:white;padding:6px 16px;border-radius:20px;font-size:0.9em;font-weight:600;">
            {{ $news->category }}
        </span>
        <h1 style="color:#333;margin:20px 0;font-size:2.5em;line-height:1.2;">{{ $news->title }}</h1>
        <div style="display:flex;gap:20px;color:#888;font-size:0.95em;margin-bottom:24px;">
            <span>📰 {{ $news->source }}</span>
            <span>📅 {{ $news->published_at->format('F j, Y') }}</span>
            <span>🕒 {{ $news->published_at->diffForHumans() }}</span>
        </div>
    </div>

    <!-- Article Image Placeholder -->
    @if($news->image)
        <img src="{{ $news->image }}" alt="{{ $news->title }}" style="width:100%;border-radius:12px;margin-bottom:32px;">
    @else
        <div style="background:linear-gradient(135deg,#667eea 0%,#764ba2 100%);border-radius:12px;height:400px;display:flex;align-items:center;justify-content:center;margin-bottom:32px;">
            <span style="color:white;font-size:1.5em;">📰 News Image</span>
        </div>
    @endif

    <!-- Article Content -->
    <div style="background:#fff;border-radius:12px;padding:40px;box-shadow:0 2px 12px rgba(0,0,0,0.08);">
        <p style="font-size:1.2em;color:#666;line-height:1.8;margin-bottom:24px;font-weight:500;">
            {{ $news->excerpt }}
        </p>
        <div style="color:#444;line-height:1.8;font-size:1.05em;">
            {!! nl2br(e($news->content)) !!}
        </div>
    </div>

    <!-- Related/Navigation -->
    <div style="margin-top:40px;text-align:center;">
        <a href="{{ route('home') }}" style="background:#667eea;color:white;padding:14px 32px;border-radius:8px;text-decoration:none;font-weight:600;display:inline-block;">
            Read More News
        </a>
    </div>

</div>
@endsection
