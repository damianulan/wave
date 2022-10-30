<?php $title = 'Maintenance'; ?>
@extends('errors.master')

@section('content')
<div class="container py-5">
    <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid py-5 text-center">
            <h1 class="display-5 fw-bold">Suspended!</h1>
                <img class="img-fluid py-4" width="50%" height="50%" src="{{asset('images/pages/maintenance.jpg')}}">
            <p class="fs-4">Your account has been suspended by the administrator.</p>
            <p class="fs-5">If there's a mistake, please contact with the system's administrator.</p>
        </div>
    </div>
</div>
@endsection