@extends('layouts.app')
@section('title', 'Home')

@section('content')
<div style="width:100%;padding:10 40px;margin:auto;">
    <!-- Hero/Featured Section -->
    <div style="background:linear-gradient(135deg,#667eea 0%,#764ba2 100%);border-radius:16px;padding:48px;color:white;text-align:center;margin-bottom:40px;">
        <h1 style="font-size:2.5em;margin-bottom:16px;">Welcome to Intelligent News Aggregator</h1>
        <p style="font-size:1.2em;margin-bottom:24px;">Stay informed with the latest local and international news, powered by AI</p>
        <a href="{{ route('summarizer') }}" style="background:#10b981;color:white;padding:15px 35px;border-radius:8px;text-decoration:none;font-weight:600;display:inline-block;">
            Try AI Summarizer →
        </a>
    </div>

    <!-- Search Bar -->
    <div style="background:#fff;border-radius:12px;box-shadow:0 4px 12px rgba(102,126,234,0.15);padding:24px;margin-bottom:40px;">
        <form method="GET" action="{{ route('home') }}" style="display:flex;gap:12px;align-items:center;">
            <input 
                type="text" 
                name="search" 
                value="{{ request('search') }}" 
                placeholder="🔍 Search news by title or keywords..." 
                style="flex:1;padding:14px 20px;border:2px solid #e5e7eb;border-radius:8px;font-size:1em;outline:none;transition:border 0.2s;"
                onfocus="this.style.borderColor='#667eea'"
                onblur="this.style.borderColor='#e5e7eb'"
            >
            <button 
                type="submit" 
                style="background:#667eea;color:white;padding:14px 32px;border:none;border-radius:8px;font-weight:600;cursor:pointer;transition:background 0.2s;"
                onmouseover="this.style.background='#5568d3'"
                onmouseout="this.style.background='#667eea'"
            >
                Search
            </button>
            @if(request('search'))
                <a 
                    href="{{ route('home') }}" 
                    style="background:#f3f4f6;color:#667eea;padding:14px 24px;border-radius:8px;text-decoration:none;font-weight:600;"
                >
                    Clear
                </a>
            @endif
        </form>
    </div>

    <!-- Category Filter -->
    <div style="margin-bottom:28px; text-align:center;">
        @foreach (['All', 'Tech', 'Sports', 'Politics', 'Health', 'Education'] as $cat)
            <a href="{{ request()->fullUrlWithQuery(['category' => $cat]) }}"
               style="display:inline-block;margin:0 8px 8px 0;padding:10px 22px;border-radius:20px;
               font-weight:500;text-decoration:none;
               background:{{ request('category', 'All') === $cat ? '#667eea' : '#f3f4f6' }};
               color:{{ request('category', 'All') === $cat ? '#fff' : '#667eea' }};
               box-shadow:0 2px 6px #667eea11;transition:background 0.2s;">
               {{ $cat }}
            </a>
        @endforeach
    </div>

    <!-- Latest Headlines News Grid -->
    <h2 style="color:#667eea;margin-bottom:24px;font-size:1.8em;">📌 Latest Headlines</h2>
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:24px;margin-bottom:40px;">
        @forelse ($newsItems as $news)
            <div style="background:#fff;border-radius:12px;box-shadow:0 2px 8px rgba(102,126,234,0.1);padding:20px;transition:transform 0.2s,box-shadow 0.2s;cursor:pointer;" 
                 onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='0 8px 16px rgba(102,126,234,0.2)';" 
                 onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 2px 8px rgba(102,126,234,0.1)';">
                <h3 style="color:#667eea;margin-bottom:12px;font-size:1.1em;">{{ $news->title }}</h3>
                <div style="font-size:0.95em;color:#10b981;margin-bottom:8px;">
                    <strong>{{ $news->category }}</strong>
                </div>
                <p style="color:#666;margin-bottom:12px;line-height:1.5;">{{ $news->excerpt }}</p>
                <div style="display:flex;justify-content:space-between;align-items:center;">
                    <span style="font-size:0.9em;color:#888;">{{ $news->source }}</span>
                    <span style="font-size:0.85em;color:#aaa;">{{ $news->published_at->diffForHumans() }}</span>
                </div>
            </div>
        @empty
            <div style="grid-column:1/-1;text-align:center;padding:40px;color:#888;">
                @if(request('search'))
                    No news found for "{{ request('search') }}". Try a different search term.
                @else
                    No news available in this category.
                @endif
            </div>
        @endforelse
    </div>
</div>
@endsection
