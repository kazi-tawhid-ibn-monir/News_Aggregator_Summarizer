@extends('layouts.app')
@section('title', 'Submit News')

@section('content')
<div class="submit-page">
    <div class="submit-container">

        <section class="submit-hero">
            <h1 class="submit-title">Submit a News Story</h1>
            <p class="submit-subtitle">
                Share local or international news with the community. Submissions may appear on the site after review.
            </p>
        </section>

        @if (session('success'))
            <div class="submit-alert submit-alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="submit-alert submit-alert-error">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form action="{{ route('news-submission.store') }}" method="POST" class="submit-form">
            @csrf

            <div class="submit-field">
                <label for="title" class="submit-label">Title</label>
                <input type="text" id="title" name="title" class="submit-input"
                       value="{{ old('title') }}" required>
            </div>

            <div class="submit-field">
                <label for="excerpt" class="submit-label">Short summary (excerpt)</label>
                <textarea id="excerpt" name="excerpt" rows="3" class="submit-textarea" required>{{ old('excerpt') }}</textarea>
            </div>

            <div class="submit-field">
                <label for="content" class="submit-label">Full content</label>
                <textarea id="content" name="content" rows="8" class="submit-textarea" required>{{ old('content') }}</textarea>
            </div>

            <div class="submit-row">
                <div class="submit-field">
                    <label for="category" class="submit-label">Category</label>
                    <select id="category" name="category" class="submit-select" required>
                        <option value="">Select a category</option>
                        <option value="Local" {{ old('category') == 'Local' ? 'selected' : '' }}>Local</option>
                        <option value="Bangladesh" {{ old('category') == 'Bangladesh' ? 'selected' : '' }}>Bangladesh</option>
                        <option value="International" {{ old('category') == 'International' ? 'selected' : '' }}>International</option>
                        <option value="World" {{ old('category') == 'World' ? 'selected' : '' }}>World</option>
                        <option value="Politics" {{ old('category') == 'Politics' ? 'selected' : '' }}>Politics</option>
                        <option value="Tech" {{ old('category') == 'Tech' ? 'selected' : '' }}>Tech</option>
                    </select>
                </div>

                <div class="submit-field">
                    <label for="source" class="submit-label">Source (optional)</label>
                    <input type="text" id="source" name="source" class="submit-input"
                           value="{{ old('source') }}" placeholder="e.g. Prothom Alo, BBC, User">
                </div>
            </div>

            <div class="submit-actions">
                <button type="submit" class="submit-button-primary">Submit News</button>
                <button type="reset" class="submit-button-secondary">Clear</button>
            </div>
        </form>

    </div>
</div>
@endsection
