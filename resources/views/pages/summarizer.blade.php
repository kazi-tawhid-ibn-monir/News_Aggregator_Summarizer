@extends('layouts.app')
@section('title', 'Summarizer')
@section('content')
    <div class="container">
        <h1>Summarizer</h1>
        <p>Latest news from your country and region.</p>
        <div id="summarizer-app">
            <summarizer-component>hello</summarizer-component>
        </div>
    </div>
@endsection
