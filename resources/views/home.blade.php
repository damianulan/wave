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
<div class="row justify-content-center mt-4">
    <div class="col-md-12">
        <div class="card">
            <h4 class="card-header p-3 pb-0 m-0">{{ __('Dashboard') }}</h4>

            <div class="card-body">
            </div>
        </div>
    </div>
</div>
<div class="row mt-4">
    <div class="col-md-4">
        <div class="card">
            <h4 class="card-header p-3 pb-0 m-0"><i class="bi bi-activity"></i> {{ __('forms.recent_activity') }}</h4>
            <div class="card-body p-4">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <table class="table">
                            <tbody>
                                @if(count($logs) > 0)
                                    @foreach ($logs as $log)
                                        <tr>
                                            <td><span class="fw-bold">{{__('vocabulary.you')}}</span> {{__('activities.'.$log->action, ['target' => $log->getTargetData()->name()]) }}</td>
                                            <td>{{$log->created_at->diffForHumans()}}</td>
                                        </tr>   
                                    @endforeach
                                @else
                                        <tr>
                                            <td>{{__('messages.no_data')}}</td>
                                        </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
