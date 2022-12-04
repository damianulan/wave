@extends('layouts.app')
@section('content')
<div class="row mb-3">
    <div class="col-12">
        <div class="card p-1">
            <div class="card-header m-0">
                <nav>
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">{{__('menus.modules')}}</li>
                      <li class="breadcrumb-item active" aria-current="page">{{__('menus.tasks')}}</li>
                    </ol>
                </nav>
                <h2 class="page-header">
                    {{__('menus.tasks')}} 
                </h2>
            </div>
        </div>
    </div>
</div>
@include('components.alerts')
@include('pages.tasks.nav')
@yield('tasks-content')
@include('pages.tasks.create')
@endsection