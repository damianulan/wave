@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="alert alert-primary shadow">
            <h4 class="alert-heading">
                Alert title
            </h4>
            <p class="mx-2 mb-0">Alert</p>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card card-hello">
            <div class="card-body text-center">
                <div class="avatar-xl">
                    <div class="avatar-content text-center shadow">
                        <i class="bi-heart"></i>
                    </div>
                </div>
                <h2 class="text-center">Hello, Damian</h2>
                <p class="text-center">What's the plan for today?</p>
            </div>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">{{ __('Dashboard') }}</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
