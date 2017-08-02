<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8" />
    <title>@yield('title', env('META_TITLE'))</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="@yield('keywords', env('META_KEYWORDS'))" />
    <meta name="description" content="@yield('description', env('META_DESCRIPTION'))" />
    <link rel="canonical" href="@yield('og_url', url('') )" />
    <meta property="og:title" content="@yield('og_title', env('META_TITLE'))" />
    <meta property="og:type" content="{{ env('META_OG_TYPE') }}" />
    <meta property="og:url" content="@yield('og_url', url('') )" />
    <meta property="og:image" content="@yield('og_image', env('META_OG_IMAGE'))" />
    <meta property="og:image:width" content="@yield('og_image_width', env('META_IMAGE_WIDTH'))" />
    <meta property="og:image:height" content="@yield('og_image_height', env('META_IMAGE_HEIGHT'))" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/stylesheets/style.css?v2' ) }}" />
    <link rel="favicon" type="image/x-icon" src="{{ asset('/assets/images/favicon.png') }}" />
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-102549957-1', 'auto');
        ga('send', 'pageview');
    </script>
    @stack('head_ads')
</head>
<body>
<div id="wrapper">
    @include('blocks.header')
    <div class="container main clearfix">
        @yield('content')
    </div>
</div>
@include('blocks.footer')
<script type="text/javascript" src="{{ url('assets/javascripts/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/javascripts/jquery.sticky.min.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/javascripts/audioplayer.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/javascripts/main.min.js') }}"></script>
@stack('scripts')
</body>
</html>
