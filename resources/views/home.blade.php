@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="alert alert-primary">
            <h4 class="alert-heading">
                {{__('messages.in_progress')}}
            </h4>
            <p class="mx-2 mb-0">{{__('messages.demo')}}</p>
            <p class="mx-2 mb-0"><a target="_blank" href="#">{{__('messages.learn')}}</a></p>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card card-hello">
            <div class="card-body text-center">
                <div class="avatar-xl">
                    <div class="avatar-content text-center shadow">
                        <div style="width:40px;height:40px;">
                            <i class="{{__($icon)}}"></i>
                        </div>

                    </div>
                </div>
                <h2 class="text-center">{{__('vocabulary.hello')}}, {{auth()->user()->firstname}}</h2>
                <p class="text-center">{{__($welcome)}}</p>
            </div>
        </div>
    </div>
</div>
@include('components.alerts')
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
