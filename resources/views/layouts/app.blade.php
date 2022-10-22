<?php
// global static variables
$theme = 'wave-light';
?>
@include('layouts.header')
<body>
    <div id="app">
        @include('layouts.navbar')
        @include('layouts.top')
        <main id="main" class="content <?php if(isset($_COOKIE['menu-collapsed'])&&$_COOKIE['menu-collapsed']==true){ echo 'menu-collapsed'; }?>">
            <div class="top-menu-shadow"></div>
            <div class="content-wrapper">
                @yield('content')
            </div>
        </main>
@include('layouts.footer')
