@extends('layouts.app')
@section('title', 'News Submission')
@section('content')
    <div class="container">
        <h1>News Submission</h1>
        <p>Latest news from your country and region.</p>
        <p>Stay informed with updates on news submissions, editorial guidelines, and contribution stories.</p>
    </div>
    <div id="news-submission-app">
        <news-submission-component></news-submission-component>
    </div>
@endsection
