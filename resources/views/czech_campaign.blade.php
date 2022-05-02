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
        }

        .poster-section {
            height: 100%;
            display: flex;
            justify-content: center;
            padding: 50px 10px 10px;
        }

        .poster-card {
            position: relative;
        }

        .poster-card+.poster-card {
            margin-left: 10px;
        }

        /* 因为要用伪元素放网格，这个就不放在 poster-card 内部区域啦，拉出去 */
        .card-title {
            font-size: 20px;
            position: absolute;
            margin-top: -40px;
        }

        .card-image {
            max-width: 100%;
            max-height: 100%;
            border-radius: 5px;
            box-shadow: 1px 1px 5px rgba(0, 0, 0, .3);
            position: relative;
        }

        /* 辅助网格 */
        .poster-card:after {
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
            <img class="card-image" src="/static/czech-campaign/ui-mockup.jpg">
        </div>
        <div class="poster-card">
            <h2 class="card-title">海报</h2>
            <img class="card-image" src="{{ $img->encoded }}">
        </div>
    </div>

    <a class="github-fork-ribbon" href="https://github.com/dragon-trail-interactive/h5-poster-php"
        data-ribbon="Fork me on GitHub" title="Fork me on GitHub">Fork me on GitHub</a>
@endsection
