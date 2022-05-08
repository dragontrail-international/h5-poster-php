@extends('layouts.main', ['title' => 'H5 Poster PHP'])

@section('styles')
    <link rel="stylesheet" href="/vendor/github-markdown.min.css">
    <style>
        .container {
            max-width: 920px;
            margin: 40px auto;
        }

    </style>
@endsection

@section('content')
    <div class='container markdown-body'>
        {!! $html !!}
    </div>
@endsection
