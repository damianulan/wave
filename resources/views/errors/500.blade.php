<?php $title = __('alerts.error.500'); ?>
@extends('errors.master')

@section('content')
<div class="container py-5">
    <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid py-5 text-center">
            <h1 class="display-5 fw-bold">{{$title}}</h1>
                <img class="img-fluid py-4" width="50%" height="50%" src="{{asset('images/pages/maintenance.jpg')}}">
            <p class="fs-4">Hello, We are deeply sorry, but this website is under a planned maintenance, and we are working hard to bring it back.</p>
            <p class="fs-5">Please try again soon.</p>
        </div>
    </div>
</div>
@endsection