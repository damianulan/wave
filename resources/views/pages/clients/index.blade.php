@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card p-1">
            <div class="card-header m-0">
                <nav>
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">{{__('menus.apps')}}</li>
                      <li class="breadcrumb-item active" aria-current="page">{{__('menus.clients')}}</li>
                    </ol>
                </nav>
                <h2 class="page-header">
                    {{__('menus.clients')}} 
                    <a href="{{route('clients.create')}}" data-mdb-toggle="tooltip" data-mdb-placement="right" title="{{__('buttons.add_new')}}"><i class="text-primary fs-6 bi-person-plus"></i></a>
                </h2>
            </div>
        </div>
    </div>
</div>
@include('components.alerts')
{!! $tableView !!}
@endsection