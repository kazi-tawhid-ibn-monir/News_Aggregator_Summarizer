@extends('layouts.app')
@section('title', 'Home')

@section('content')
    <div style="width:100%;padding:0;">
    <!-- Hero/Featured Section - Full Width -->
    <div style="background:linear-gradient(135deg,#667eea 0%,#764ba2 100%);padding:64px 40px;color:white;text-align:center;">
        <div style="max-width:900px;margin:auto;">
            <h1 style="font-size:2.8em;margin-bottom:16px;font-weight:700;">Welcome to Intelligent News Aggregator</h1>
            <p style="font-size:1.3em;margin-bottom:28px;opacity:0.95;">Stay informed with the latest local and international news, powered by AI</p>
            <a href="{{ route('summarizer') }}" style="background:#10b981;color:white;padding:16px 40px;border-radius:8px;text-decoration:none;font-weight:600;display:inline-block;font-size:1.1em;">
                Try AI Summarizer →
            </a>
        </div>
    </div>

    <!-- Main Content Container -->
    <div style="max-width:1400px;margin:auto;padding:40px 40px;">
        
        <!-- Featured News -->
        <div style="background:#fff;border-radius:12px;box-shadow:0 4px 12px rgba(102,126,234,0.15);padding:40px;margin-bottom:48px;">
            <h2 style="color:#667eea;margin-bottom:28px;font-size:2em;font-weight:600;">🔥 Featured Story</h2>
            <div style="display:grid;grid-template-columns:1.2fr 1fr;gap:40px;align-items:center;">
                <div>
                    <h3 style="color:#333;font-size:1.6em;margin-bottom:16px;font-weight:600;">AI Revolutionizes Global News Industry</h3>
                    <p style="color:#666;line-height:1.7;margin-bottom:20px;font-size:1.05em;">
                        Artificial intelligence is transforming how we consume and understand news. 
                        New summarization technologies are making it easier than ever to stay informed 
                        in our fast-paced world.
                    </p>
                    <span style="color:#888;font-size:0.95em;">TechCrunch • 2 hours ago</span>
                </div>
                <div style="background:#f3f4f6;border-radius:12px;height:280px;display:flex;align-items:center;justify-content:center;">
                    <span style="color:#999;font-size:1.3em;">📰 Featured Image</span>
                </div>
            </div>
        </div>

        <!-- Latest Headlines -->
        <h2 style="color:#667eea;margin-bottom:28px;font-size:2em;font-weight:600;">📌 Latest Headlines</h2>
        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(320px,1fr));gap:28px;margin-bottom:48px;">
            @foreach ([
                ['title' => 'Bangladesh Economy Shows Strong Growth', 'excerpt' => 'Latest reports indicate positive economic indicators across multiple sectors.', 'source' => 'The Daily Star', 'time' => '3 hours ago'],
                ['title' => 'Global Climate Summit Reaches Agreement', 'excerpt' => 'World leaders commit to ambitious carbon reduction targets.', 'source' => 'BBC News', 'time' => '5 hours ago'],
                ['title' => 'Tech Giants Announce AI Partnership', 'excerpt' => 'Major technology companies join forces to advance artificial intelligence research.', 'source' => 'Reuters', 'time' => '6 hours ago'],
                ['title' => 'Sports: Cricket World Cup Update', 'excerpt' => 'Exciting matches continue as teams compete for championship glory.', 'source' => 'ESPN', 'time' => '8 hours ago'],
                ['title' => 'New Healthcare Initiative Launched', 'excerpt' => 'Government announces nationwide program to improve medical services.', 'source' => 'Health Today', 'time' => '10 hours ago'],
                ['title' => 'Education Reform Plans Unveiled', 'excerpt' => 'Ministry of Education reveals comprehensive plans for curriculum changes.', 'source' => 'Education Weekly', 'time' => '12 hours ago'],
            ] as $news)
                <div style="background:#fff;border-radius:12px;box-shadow:0 2px 10px rgba(102,126,234,0.1);padding:24px;transition:all 0.3s;cursor:pointer;" 
                     onmouseover="this.style.transform='translateY(-6px)';this.style.boxShadow='0 12px 24px rgba(102,126,234,0.18)';" 
                     onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 2px 10px rgba(102,126,234,0.1)';">
                    <h3 style="color:#667eea;margin-bottom:14px;font-size:1.15em;font-weight:600;">{{ $news['title'] }}</h3>
                    <p style="color:#666;margin-bottom:16px;line-height:1.6;font-size:0.98em;">{{ $news['excerpt'] }}</p>
                    <div style="display:flex;justify-content:space-between;align-items:center;">
                        <span style="font-size:0.9em;color:#888;font-weight:500;">{{ $news['source'] }}</span>
                        <span style="font-size:0.85em;color:#aaa;">{{ $news['time'] }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
