@extends('layouts.app')
@section('title', 'AI Summarizer')

@section('content')
<div class="summarizer-page">
    <div class="summarizer-container">

        <section class="summarizer-hero">
            <h1 class="summarizer-title">AI News Summarizer</h1>
            <p class="summarizer-subtitle">
                Paste any news article or long text and let the AI generate a short, readable summary.
            </p>
        </section>

        @if ($errors->any())
            <div class="summarizer-alert summarizer-alert-error">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        @if (session('error'))
            <div class="summarizer-alert summarizer-alert-error">
                {{ session('error') }}
            </div>
        @endif

        <section class="summarizer-layout">
            <form method="POST" action="{{ route('summarizer.run') }}" class="summarizer-form">
                @csrf

                <div class="summarizer-field">
                    <label for="text" class="summarizer-label">Original text</label>
                    <textarea id="text" name="text" rows="10"
                              class="summarizer-textarea"
                              placeholder="Paste a news article or long text here...">{{ old('text') }}</textarea>
                    <p class="summarizer-hint">
                        Tip: Use at least a few paragraphs of news content for better summaries.
                    </p>
                </div>

                <div class="summarizer-actions">
                    <button type="submit" class="summarizer-button-primary">
                        Generate Summary
                    </button>
                   <button type="submit" name="clear" value="1" class="summarizer-button-secondary">
                       Clear
                    </button>

                </div>
            </form>

            <div class="summarizer-result-wrapper">
                <h2 class="summarizer-result-title">AI Summary</h2>

                @if (session('summary'))
                    <div class="summarizer-result-card">
                        <p class="summarizer-result-text">
                            {{ session('summary') }}
                        </p>
                    </div>
                @else
                    <div class="summarizer-result-placeholder">
                        Paste some text on the left and click “Generate Summary” to see the AI output here.
                    </div>
                @endif
            </div>
        </section>

    </div>
</div>
@endsection

