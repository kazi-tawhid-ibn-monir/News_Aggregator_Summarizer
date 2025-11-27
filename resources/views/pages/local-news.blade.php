@extends('layouts.app')
@section('title', 'Local News')

@section('content')
<div style="max-width:1200px;margin:0 auto;padding:0 20px;">

    <!-- Hero Banner -->
    <div style="background:linear-gradient(135deg,#10b981 0%,#6366f1 50%,#8b5cf6 100%);border-radius:16px;padding:40px;color:white;margin:30px 0;">
        <h1 style="font-size:2.5em;margin-bottom:12px;">🇧🇩 Bangladesh Local News</h1>
        <p style="font-size:1.1em;opacity:0.95;margin:0;">আপনার এলাকার সর্বশেষ খবর এবং উন্নয়ন খবর এক জায়গায়।</p>
    </div>

    <!-- Search Bar -->
    <form method="GET" action="{{ route('local-news') }}" style="background:#fff;border-radius:50px;box-shadow:0 4px 15px rgba(0,0,0,0.1);padding:8px 12px;display:flex;align-items:center;gap:12px;margin-bottom:32px;border:1px solid #e5e7eb;">
        <span style="font-size:1.3em;margin-left:8px;">🔍</span>
        <input type="text" name="search" value="{{ request('search') }}" placeholder="যেমন: ঢাকা, চট্টগ্রাম, ট্রাফিক..." style="flex:1;border:none;outline:none;font-size:1em;padding:10px;">
        <button type="submit" style="background:#6366f1;color:white;border:none;border-radius:50px;padding:12px 28px;font-weight:600;cursor:pointer;margin-right:4px;">Search</button>
    </form>

    <!-- Heading -->
    <h2 style="color:#1f2937;font-size:1.6em;margin-bottom:24px;">📍 সর্বশেষ স্থানীয় খবর</h2>

    <!-- News Grid -->
    @if($localNews->count())
        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:24px;margin-bottom:40px;">
            @foreach($localNews as $news)
                <a href="{{ route('news.show', $news->id) }}" style="text-decoration:none;color:inherit;">
                    <div style="background:#fff;border-radius:14px;padding:20px;box-shadow:0 3px 12px rgba(0,0,0,0.08);border:1px solid #e5e7eb;transition:all 0.3s ease;height:100%;display:flex;flex-direction:column;" onmouseover="this.style.transform='translateY(-6px)';this.style.boxShadow='0 12px 24px rgba(0,0,0,0.15)';this.style.borderColor='#6366f1';" onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 3px 12px rgba(0,0,0,0.08)';this.style.borderColor='#e5e7eb';">
                        
                        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:12px;">
                            <span style="background:#dbeafe;color:#1e40af;padding:4px 12px;border-radius:999px;font-size:0.85em;font-weight:600;">{{ $news->category }}</span>
                            <span style="color:#9ca3af;font-size:0.85em;">{{ $news->published_at->diffForHumans() }}</span>
                        </div>

                        <h3 style="font-size:1.1em;color:#1f2937;margin:0 0 10px;line-height:1.4;">{{ $news->title }}</h3>

                        <p style="color:#4b5563;font-size:0.95em;line-height:1.5;flex:1;margin:0 0 12px;">{{ $news->excerpt }}</p>

                        <div style="display:flex;justify-content:space-between;align-items:center;color:#6b7280;font-size:0.9em;border-top:1px solid #e5e7eb;padding-top:12px;">
                            <span>📰 {{ $news->source }}</span>
                            <span style="color:#6366f1;font-weight:600;">আরও পড়ুন →</span>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    @else
        <div style="background:#fef2f2;border:2px solid #fecaca;border-radius:12px;padding:32px;text-align:center;color:#991b1b;">
            <h3 style="margin:0 0 8px;">কোনো লোকাল নিউজ পাওয়া যায়নি</h3>
            <p style="margin:0;">ডাটা যোগ করুন এবং আবার চেষ্টা করুন।</p>
        </div>
    @endif

</div>
@endsection
