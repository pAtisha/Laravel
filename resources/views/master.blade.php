<?php
/**
 * Created by PhpStorm.
 * User: Antonio
 * Date: 7/17/2017
 * Time: 6:40 PM
 */?>
<html>
<head>
    <title> @yield('title') </title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <link href="{{ asset('css/roboto.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/material.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/ripples.min.css') }}" rel="stylesheet">
</head>
<body>
@include('shared.navbar')
@yield('content')
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/ripples.min.js') }}"></script>
<script src="{{ asset('js/material.min.js') }}"></script>
<script>
    $(document).ready(function()
    {
        $.material.init();
    });
</script>
</body>
</html>
