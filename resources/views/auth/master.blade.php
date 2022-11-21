<?php
// global static variables
$theme = 'wave-light';
?>
@include('layouts.header')
<body>
    <div id="app">
        <main class="blank-content">
            <div class="row flexbox-container">
                
                @yield('content')
            </div>
        </main>
    @include('layouts.footer')
