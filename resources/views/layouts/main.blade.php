<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" sizes="180x180" href="/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon_io/favicon-16x16.png">
    <link rel="manifest" href="/favicon_io/site.webmanifest">

    <title>用 PHP 生成 H5 活动海报图</title>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/github-fork-ribbon-css/0.2.3/gh-fork-ribbon.min.css" />
    <style>
        /* github ribbon style */
        .github-fork-ribbon:before {
            background-color: #333;
        }

    </style>

    @yield('styles')

</head>

<body>

    @yield('content')

    <a class="github-fork-ribbon" href="https://github.com/dragon-trail-interactive/h5-poster-php"
        data-ribbon="Find me on GitHub" title="Find me on GitHub">Find me on GitHub</a>

</body>

</html>
