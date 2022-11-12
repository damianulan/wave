@extends('layouts.app')
@section('content')
<div class="row mb-3">
    <div class="col-12">
        <div class="card p-1">
            <div class="card-header m-0">
                <nav>
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">{{__('menus.administration')}}</li>
                      <li class="breadcrumb-item active" aria-current="page">{{__('menus.tags')}}</li>
                    </ol>
                </nav>
                <h2 class="page-header">
                    {{__('menus.tags')}} 
                </h2>
            </div>
        </div>
    </div>
</div>
@include('components.alerts')
<div class="row my-3">
    <div class="col-12">
        <div class="card p-1">
            <div class="row">
                <div class="col-md-12">
                    <div class="card-body pt-2 px-4">
                        <input id="demo-input" type="text" value="rgb(255, 128, 0)" />

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#demo-input').colorpicker();
      
      // Example using an event, to change the color of the #demo div background:
      $('#demo-input').on('colorpickerChange', function(event) {
        $('#demo').css('background-color', event.color.toString());
      });});

  </script>
@endsection