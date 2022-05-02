@extends('layouts.main')

@section('styles')
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, Helvetica Neue, PingFang SC, Microsoft YaHei, Source Han Sans SC, Noto Sans CJK SC, WenQuanYi Micro Hei, sans-serif;
            font-size: 15px;
            color: #121212;
        }

        html,
        body {
            width: 100%;
            height: 100%;
            position: relative;
        }

        .poster-section {
            height: 100%;
            display: flex;
            justify-content: center;
            padding: 50px 10px 10px;
        }

        .poster-card {
            width: 500px;
            height: 809px;
            position: relative;
        }

        .poster-card+.poster-card {
            margin-left: 10px;
        }

        .card-title {
            font-size: 20px;
            padding-top: 6px;
            padding-bottom: 1px;
            display: inline-block;
            color: transparent;
            -webkit-background-clip: text;
            background-clip: text;
            background-image: linear-gradient(to right, #24c6dc, #514a9d);
        }

        .poster-card + .poster-card .card-title {
            background-image: linear-gradient(to right, #dd5e89, #f7bb97);
        }

        .card-figure {
            width: 500px;
            height: 809px;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 3px 5px 10px rgba(0, 0, 0, .3);
            position: relative;
            aspect-ratio: 1000/1618;
        }

        .card-figure img {
            width: 100%;
            height: 100%;
        }

        /* 辅助网格 */
        .card-figure:after {
            pointer-events: none;
            content: '';
            display: block;
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;

            background: linear-gradient(-90deg, rgba(0, 0, 0, .05) 1px, transparent 1px),
                linear-gradient(rgba(0, 0, 0, .05) 1px, transparent 1px),
                linear-gradient(-90deg, rgba(0, 0, 0, .04) 1px, transparent 1px),
                linear-gradient(rgba(0, 0, 0, .04) 1px, transparent 1px),
                linear-gradient(transparent 3px, transparent 3px, transparent 78px, transparent 78px),
                linear-gradient(-90deg, #aaa 1px, transparent 1px),
                linear-gradient(-90deg, transparent 3px, transparent 3px, transparent 78px, transparent 78px),
                linear-gradient(#aaa 1px, transparent 1px),
                transparent;
            background-size:
                4px 4px,
                4px 4px,
                80px 80px,
                80px 80px,
                80px 80px,
                80px 80px,
                80px 80px,
                80px 80px;
        }

    </style>
@endsection

@section('content')
    <div class="poster-section">
        <div class="poster-card">
            <h2 class="card-title">UI 稿</h2>
            <div class="card-figure">
                <img src="/static/czech-campaign/ui-mockup.jpg">
            </div>
        </div>
        <div class="poster-card">
            <h2 class="card-title">海报</h2>
            <div class="card-figure">
                <img class="card-image" src="{{ $img->encoded }}">
            </div>

        </div>
    </div>
@endsection
