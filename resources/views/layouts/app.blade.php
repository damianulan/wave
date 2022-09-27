<?php
// global static variables
$theme = 'wave-light';
?>
@include('layouts.header')
<body>
    <div id="app">
        @include('layouts.navbar')
        @include('layouts.top')
        <main class="content">
            <div class="top-menu-shadow"></div>
            <div class="content-wrapper">
                @yield('content')
            </div>
        </main>
@include('layouts.footer')
