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
<div class="row my-3">
    <div class="col-12">
        <div class="row p-2">
            <div class="col-md-12">
                <a class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addTask">{{__('modules.add_task')}}</a>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card p-1">
            <div class="card-header p-4 pb-0 m-0">
                <h4>{{__('modules.my_tasks')}}</h4>
            </div>
            <div class="card-body p-4">
                <table class="table">
                    <tbody>
                        <tr>
                            <td class="text-center align-middle" width="3%"><livewire:tasks.mark-done/></td>
                            <td width="auto">
                                <div class="fw-bold">Title</div>
                                <div>Contents</div>
                            </td>
                            <td class="text-center align-middle" width="7%"><span class="text-danger fw-bold">Urgent</span></td>
                            <td class="text-center align-middle" width="15%">{{\Carbon\Carbon::now()->addDays(5)->diffForHumans()}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@include('pages.tasks.create')
@section('page-scripts')
<script>


</script>
@endsection

@endsection