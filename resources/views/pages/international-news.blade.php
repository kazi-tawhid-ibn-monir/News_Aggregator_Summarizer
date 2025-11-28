@extends('layouts.app')
@section('title', 'International News')

@section('content')
<style>
    .news-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 28px;
        width: 100%;
        margin-bottom: 50px;
    }

    .news-card {
        background: #fff;
        border-radius: 16px;
        padding: 24px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        border: 2px solid #f3f4f6;
        transition: all 0.4s cubic-bezier(0.23,1,0.320,1);
        display: flex;
        flex-direction: column;
        height: 100%;
        position: relative;
        overflow: hidden;
    }

    .news-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 35px rgba(0,0,0,0.15);
        border-color: #ec4899;
    }

    .news-card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 16px;
        position: relative;
        z-index: 1;
    }

    .category-badge {
        background: linear-gradient(135deg,#fce7f3,#fed7aa);
        color: #be185d;
        padding: 6px 14px;
        border-radius: 50px;
        font-size: 0.8em;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .time-badge {
        color: #9ca3af;
        font-size: 0.8em;
        font-weight: 600;
    }

    .news-card-title {
        font-size: 1.1em;
        color: #1f2937;
        margin: 0 0 14px;
        line-height: 1.5;
        font-weight: 700;
        position: relative;
        z-index: 1;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        min-height: 56px;
    }

    .news-card-excerpt {
        color: #4b5563;
        font-size: 0.95em;
        line-height: 1.6;
        flex: 1;
        margin: 0 0 16px;
        position: relative;
        z-index: 1;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .news-card-divider {
        height: 2px;
        background: linear-gradient(90deg,#ec4899 0%,transparent 100%);
        margin-bottom: 14px;
        position: relative;
        z-index: 1;
    }

    .news-card-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: relative;
        z-index: 1;
        gap: 12px;
        margin-top: auto;
    }

    .source-info {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 0.85em;
        color: #6b7280;
        font-weight: 500;
        flex: 1;
        min-width: 0;
    }

    .source-info span:last-child {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .read-more {
        color: #ec4899;
        font-weight: 700;
        font-size: 0.9em;
        white-space: nowrap;
        flex-shrink: 0;
    }

    @media (max-width: 1024px) {
        .news-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 768px) {
        .news-grid {
            grid-template-columns: 1fr;
        }

        .news-card-title {
            font-size: 1em;
            min-height: 48px;
        }
    }
</style>

<div style="background:#f9fafb;min-height:100vh;padding:40px 20px;">
    <div style="max-width:1400px;margin:0 auto;">

        <!-- Hero Banner -->
        <div style="background:linear-gradient(135deg,#ec4899 0%,#f97316 50%,#eab308 100%);
                    border-radius:20px;padding:50px 40px;color:white;margin-bottom:40px;
                    box-shadow:0 10px 30px rgba(236,72,153,0.3);">
            <h1 style="font-size:3em;margin:0 0 12px;font-weight:800;">🌍 International News</h1>
            <p style="font-size:1.15em;opacity:0.95;margin:0;max-width:600px;">
                বিশ্বব্যাপী সর্বশেষ ঘটনা, রাজনৈতিক উন্নয়ন এবং প্রযুক্তিগত অগ্রগতি সবকিছুর খবর।
            </p>
        </div>

        <!-- Search Bar -->
        <form method="GET" action="{{ route('international-news') }}" 
              style="background:#fff;border-radius:50px;box-shadow:0 8px 20px rgba(0,0,0,0.12);
                     padding:10px 16px;display:flex;align-items:center;gap:14px;margin-bottom:32px;
                     border:2px solid #f3f4f6;">
            <span style="font-size:1.4em;">🔍</span>
            <input type="text" name="search" value="{{ request('search') }}" 
                   placeholder="অনুসন্ধান করুন: US Election, Europe Trade, Space Mission..." 
                   style="flex:1;border:none;outline:none;font-size:1em;padding:10px 8px;color:#1f2937;">
            <button type="submit" 
                    style="background:linear-gradient(135deg,#ec4899 0%,#f97316 100%);
                           color:white;border:none;border-radius:50px;padding:12px 32px;
                           font-weight:700;cursor:pointer;margin-right:4px;">
                Search
            </button>
        </form>

        <!-- Heading -->
        <div style="display:flex;align-items:center;gap:12px;margin-bottom:32px;">
            <h2 style="color:#1f2937;font-size:1.8em;margin:0;font-weight:700;">📡 বিশ্বের সর্বশেষ খবর</h2>
            <div style="flex:1;height:3px;background:linear-gradient(90deg,#ec4899 0%,#f97316 100%);border-radius:999px;max-width:200px;"></div>
        </div>

        <!-- News Grid -->
        @if($internationalNews->count())
            <div class="news-grid">
                @foreach($internationalNews as $news)
                    <a href="{{ route('news.show', $news->id) }}" style="text-decoration:none;color:inherit;display:block;">
                        <div class="news-card">
                            <!-- Category Badge -->
                            <div class="news-card-header">
                                <span class="category-badge">{{ $news->category }}</span>
                                <span class="time-badge">⏱️ {{ $news->published_at->diffForHumans() }}</span>
                            </div>

                            <!-- Title -->
                            <h3 class="news-card-title">{{ $news->title }}</h3>

                            <!-- Excerpt -->
                            <p class="news-card-excerpt">{{ $news->excerpt }}</p>

                            <!-- Divider -->
                            <div class="news-card-divider"></div>

                            <!-- Footer -->
                            <div class="news-card-footer">
                                <div class="source-info">
                                    <span>📰</span>
                                    <span>{{ $news->source }}</span>
                                </div>
                                <span class="read-more">আরও →</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @else
            <div style="background:linear-gradient(135deg,#fef2f2 0%,#fee2e2 100%);
                        border:3px dashed #fecaca;border-radius:16px;padding:50px;
                        text-align:center;color:#991b1b;">
                <h2 style="font-size:1.6em;margin:0 0 12px;font-weight:700;">🔍 কোনো আন্তর্জাতিক নিউজ পাওয়া যায়নি</h2>
                <p style="margin:0 0 20px;font-size:1.05em;">আপনার অনুসন্ধান ফিল্টার পরিবর্তন করে আবার চেষ্টা করুন।</p>
                <a href="{{ route('international-news') }}" 
                   style="display:inline-block;background:#ec4899;color:white;padding:12px 28px;
                          border-radius:50px;text-decoration:none;font-weight:600;
                          transition:all 0.3s;">
                    সব খবর দেখুন
                </a>
            </div>
        @endif

        <!-- Info Box -->
        <div style="background:linear-gradient(135deg,#f0fdf4 0%,#dbeafe 100%);
                    border-left:5px solid #10b981;border-radius:12px;padding:24px;
                    box-shadow:0 4px 12px rgba(16,185,129,0.15);
                    margin-top:40px;">
            <p style="margin:0;color:#166534;font-size:0.95em;line-height:1.6;">
                <strong>💡 টিপস:</strong> আমাদের International News সেকশন বিশ্বব্যাপী সবচেয়ে গুরুত্বপূর্ণ খবরগুলি আপনার সামনে তুলে ধরে।
            </p>
        </div>

    </div>
</div>
@endsection
