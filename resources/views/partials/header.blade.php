<header style="background: linear-gradient(90deg,#667eea 0%,#764ba2 100%); padding: 20px;">
    <nav style="display:flex;justify-content:space-between;align-items:center;max-width:1100px;margin:auto;">
        <a href="{{ route('home') }}" style="color:white;font-size:1.8em;font-weight:bold;text-decoration:none;">📰 News Aggregator</a>
        <ul style="list-style:none;display:flex;gap:24px;margin:0;padding:0;">
            <li>
                <a href="{{ route('home') }}" 
                   style="color:white;text-decoration:none;{{ request()->routeIs('home') ? 'border-bottom:2px solid #10b981;padding-bottom:4px;' : '' }}">
                    Home
                </a>
            </li>
            <li>
                <a href="{{ route('local-news') }}" 
                   style="color:white;text-decoration:none;{{ request()->routeIs('local-news') ? 'border-bottom:2px solid #10b981;padding-bottom:4px;' : '' }}">
                    Local News
                </a>
            </li>
            <li>
                <a href="{{ route('international-news') }}" 
                   style="color:white;text-decoration:none;{{ request()->routeIs('international-news') ? 'border-bottom:2px solid #10b981;padding-bottom:4px;' : '' }}">
                    International News
                </a>
            </li>
            <li>
                <a href="{{ route('summarizer') }}" 
                   style="color:white;text-decoration:none;{{ request()->routeIs('summarizer') ? 'border-bottom:2px solid #10b981;padding-bottom:4px;' : '' }}">
                    Summarizer
                </a>
            </li>
            <li>
                <a href="{{ route('news-submission') }}" 
                   style="color:white;text-decoration:none;{{ request()->routeIs('news-submission') ? 'border-bottom:2px solid #10b981;padding-bottom:4px;' : '' }}">
                    Submit News
                </a>
            </li>
        </ul>
    </nav>
</header>
