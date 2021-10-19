@php
    $config = [
    'locale' => $locale = app()->getLocale(),
    'locales' => config('app.locales'),
    'numberFormat' => config('app.number_format'),
    'inProduction' => app()->environment('production'),
    'environment' => config('app.env'),
    'debug' => config('app.debug'),
    ];
@endphp
    <!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1.0">
    <meta name="robots" content="{{config('app.meta.robots')}}">

    <title>{{ config('app.name') }}</title>

    <link rel="stylesheet" href="{{ mix('dist/css/app.css') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('/safari-pinned-tab.svg') }}" color="#8dc512">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
</head>

<body>
<div id="app"></div>
<script>
    window.config = @json($config);
</script>
<script src="{{ mix('dist/js/app.js') }}"></script>

</body>

</html>
