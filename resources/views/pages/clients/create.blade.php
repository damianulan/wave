@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card p-1">
            <div class="card-header m-0">
                <nav>
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">{{__('menus.modules')}}</li>
                      <li class="breadcrumb-item" aria-current="page"><a href="">{{__('menus.clients')}}</a></li>
                      <li class="breadcrumb-item active" aria-current="page">{{__('menus.create')}}</li>
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
<div class="row mt-4">
    <div class="col-md-12">
        <div class="card p-5">
            <div class="card-body">
                <form class="needs-validation" method="POST" action="{{route('clients.store')}}" enctype="multipart/form-data" novalidate>
                    @method("POST")
                    @csrf
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <h5 class="mb-2">{{__('forms.basic')}}</h5>

                            <div class="form-group">
                                <div class="controls">
                                    <label>{{__('forms.name')}}</label>
                                    <input name="firstname" type="text" class="form-control" placeholder="{{__('forms.name')}}" required value="{{old('firstname')}}">
                                    <div class="valid-feedback">{{__('validation.valid-feedback')}}</div>
                                    <div class="invalid-feedback">{{__('validation.required', ['attribute' => __('forms.firstname')])}}</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="controls">
                                    <label>{{__('forms.lastname')}}</label>
                                    <input name="lastname" type="text" class="form-control" placeholder="{{__('forms.lastname')}}" required value="{{old('lastname')}}">
                                    <div class="valid-feedback">{{__('validation.valid-feedback')}}</div>
                                    <div class="invalid-feedback">{{__('validation.required', ['attribute' => __('forms.lastname')])}}</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="controls">
                                    <label>{{__('forms.email')}}</label>
                                    <input name="email" type="email" class="form-control" placeholder="{{__('forms.email')}}" value="{{old('email')}}">
                                    <div class="valid-feedback">{{__('validation.valid-feedback')}}</div>
                                    <div class="invalid-feedback">{{__('validation.required', ['attribute' => __('forms.email')])}}</div>
                                    <div class="invalid-feedback">{{__('validation.email', ['attribute' => __('forms.email')])}}</div>
                                    @error('email')
                                    <div class="text-danger mt-1">{{__('validation.email', ['attribute' => __('forms.email')])}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="controls">
                                    <label>{{__('forms.phone')}}</label>
                                    <input name="phone" type="text" class="form-control" placeholder="{{__('forms.phone_placeholder')}}" value="{{old('phone')}}">
                                    @error('phone')
                                        <div class="text-danger mt-1">{{__('validation.phone')}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <h5 class="mb-2">{{__('forms.personal_information')}}</h5>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>{{__('forms.birthdate')}}</label>
                                            <input id="datepicker_1" name="birth" type="text" class="form-control" placeholder="dd/mm/yyyy" value="{{old('birthdate')}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="controls">
                                    <label>{{__('forms.city')}}</label>
                                    <input name="city" type="text" class="form-control" placeholder="{{__('forms.city')}}" value="{{old('city')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>{{__('forms.gender')}}</label>
                                <ul class="list-unstyled mb-0">
                                    <li class="d-inline-block mr-2">
                                        <fieldset>
                                            <div class="vs-radio-con">
                                                <input type="radio" name="gender" value="1" {{old('gender')=='1' ? 'checked':''}}>
                                                <span class="vs-radio">
                                                    <span class="vs-radio--border"></span>
                                                    <span class="vs-radio--circle"></span>
                                                </span>
                                                {{__('forms.male')}}
                                            </div>
                                        </fieldset>
                                    </li>
                                    <li class="d-inline-block mr-2">
                                        <fieldset>
                                            <div class="vs-radio-con">
                                                <input type="radio" name="gender" value="0"{{null!==old('gender') ? '':' checked'}}{{old('gender')=='0' ? 'checked':''}}>
                                                <span class="vs-radio">
                                                    <span class="vs-radio--border"></span>
                                                    <span class="vs-radio--circle"></span>
                                                </span>
                                                {{__('forms.female')}}
                                            </div>
                                        </fieldset>
                                    </li>
                                </ul>
                                @error('gender')
                                <div class="text-danger mt-1">{{__('validation.required', ['attribute' => __('forms.gender')])}}</div>
                                @enderror
                            </div>
                        </div>              
                    </div>
                    <div class="row">
                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                            <button type="submit" class="btn btn-primary glow mb-1 me-2">{{__('buttons.save')}}</button>
                            <button type="reset" class="btn btn-secondary glow mb-1 me-2">{{__('buttons.reset_data')}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@section('page-scripts')
<script>
    (() => {
      'use strict';
    
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      const forms = document.querySelectorAll('.needs-validation');
    
      // Loop over them and prevent submission
      Array.prototype.slice.call(forms).forEach((form) => {
        form.addEventListener('submit', (event) => {
          if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    })();

</script>
@endsection
@endsection