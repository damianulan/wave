@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card p-1">
            <div class="card-header m-0">
                <nav>
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">{{__('menus.administration')}}</li>
                      <li class="breadcrumb-item" aria-current="page"><a href="">{{__('menus.users')}}</a></li>
                      <li class="breadcrumb-item active" aria-current="page">{{__('menus.create')}}</li>
                    </ol>
                </nav>
                <h2 class="page-header">
                    {{__('menus.users')}} 
                    <a href="{{route('users.create')}}" data-mdb-toggle="tooltip" data-mdb-placement="right" title="{{__('buttons.add_new')}}"><i class="text-primary fs-6 bi-person-plus"></i></a>
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
                <form method="POST" action="{{route('users.store')}}" enctype="multipart/form-data">
                    @method("POST")
                    @csrf
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <div class="controls">
                                    <label for="account-nickname">{{__('forms.nickname')}}</label>
                                    <input name="nickname" type="text" class="form-control"  id="account-nickname" placeholder="{{__('forms.nickname')}}" required data-validation-required-message="{{__('validation.required', ['attribute' => __('forms.nickname')])}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="controls">
                                    <label>{{__('forms.name')}}</label>
                                    <input name="firstname" type="text" class="form-control" placeholder="{{__('forms.name')}}" required data-validation-required-message="{{__('validation.required', ['attribute' => __('forms.name')])}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="controls">
                                    <label>{{__('forms.lastname')}}</label>
                                    <input name="lastname" type="text" class="form-control" placeholder="{{__('forms.lastname')}}" required data-validation-required-message="This name field is required">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="controls">
                                    <label>{{__('forms.email')}}</label><a data-toggle="tooltip" data-placement="right" title="{{__('alerts.create_user_email_info')}}"> <i class="text-warning feather icon-info"></i></a>
                                    <input name="email" type="email" class="form-control" placeholder="{{__('forms.email')}}" required data-validation-required-message="This email field is required">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="controls">
                                    <label>{{__('forms.password')}}</label>
                                    <input name="password" type="password" class="form-control" placeholder="{{__('forms.password')}}" required data-validation-required-message="This password field is required">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>{{__('forms.role')}}</label><a href="knowledge.html"><i class="feather icon-info text-info mx-25"></i></a>
                                <select name="rolePicker" class="form-control" required>
                                    @foreach ($roles as $role)
                                    <option value="{{$role->id}}">{{__('forms.' . $role->slug)}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>{{__('forms.location')}}</label>
                                <select name="location_id" class="form-control">
                                    <option value="-1">{{__('vocabulary.none')}}</option>
                                    @foreach ($locations as $location)
                                        <option value="{{$location->id}}">{{$location->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>{{__('forms.language')}}</label>
                                <select name="locale" class="form-control">
                                    @foreach (config('app.available_locales') as $locale)
                                        <option value="{{$locale}}">{{__('locales.' . $locale)}}</option>
                                    @endforeach
                                    
                                </select>
                            </div>
                        </div>                 
                    </div>
                    <div class="row mt-3">
                        <div class="col-12 col-sm-6">
                            <h5 class="mb-2"><i class="feather icon-user mr-25"></i>{{__('forms.personal_information')}}</h5>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>{{__('forms.birthdate')}}</label>
                                            <input name="birthdate" type="text" class="form-control pickadate-months-year format-picker" placeholder="{{__('forms.birthdate')}}" data-validation-required-message="This birthdate field is required">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="controls">
                                    <label>{{__('forms.pesel')}}</label>
                                    <input name="pesel" type="text" class="form-control" placeholder="{{__('forms.pesel_placeholder')}}" data-validation-required-message="This name field is required">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="controls">
                                    <label>{{__('forms.phone')}}</label>
                                    <input name="phone" type="text" class="form-control" placeholder="{{__('forms.phone_placeholder')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>{{__('forms.gender')}}</label>
                                <ul class="list-unstyled mb-0">
                                    <li class="d-inline-block mr-2">
                                        <fieldset>
                                            <div class="vs-radio-con">
                                                <input type="radio" name="gender" value="1" checked>
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
                                                <input type="radio" name="gender" value="0">
                                                <span class="vs-radio">
                                                    <span class="vs-radio--border"></span>
                                                    <span class="vs-radio--circle"></span>
                                                </span>
                                                {{__('forms.female')}}
                                            </div>
                                        </fieldset>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <h5 class="mb-2 mt-2 mt-sm-0"><i class="feather icon-map-pin mr-25"></i>{{__('forms.address')}}</h5>
                            <div class="form-group">
                                <div class="controls">
                                    <label>{{__('forms.address')}}</label>
                                    <input name="address" type="text" class="form-control" placeholder="{{__('forms.address_placeholder')}}" data-validation-required-message="This Address field is required">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="controls">
                                    <label>{{__('forms.zip')}}</label>
                                    <input name="zipcode" type="text" class="form-control" placeholder="{{__('forms.zip')}}" data-validation-required-message="This ZIP code field is required">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="controls">
                                    <label>{{__('forms.city')}}</label>
                                    <input name="city" type="text" class="form-control" placeholder="{{__('forms.city')}}" data-validation-required-message="This Time Zone field is required">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="controls">
                                    <label>{{__('forms.state')}}</label>
                                    <input name="state" type="text" class="form-control" placeholder="{{__('forms.state')}}" data-validation-required-message="This Time Zone field is required">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="controls">
                                    <label>{{__('forms.country')}}</label>
                                    <input name="country" type="text" class="form-control" placeholder="{{__('forms.country')}}" data-validation-required-message="This Time Zone field is required">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row border m-3">
                        <div class="col-6 p-3">
                            <div class="table-responsive rounded px-1 ">
                                <h6 class="border-bottom py-1 mx-1 mb-0 font-medium-2"><i class="feather icon-lock mr-50 "></i>{{__('forms.permissions')}}</h6>
                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th>{{__('forms.modules')}}</th>
                                            <th>{{__('forms.read')}}</th>
                                            <th>{{__('forms.write')}}</th>
                                            <th>{{__('forms.create')}}</th>
                                            <th>{{__('forms.delete')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            
                                            <td>{{__('menus.users')}}</td>
                                            <td>
                                                <div class="custom-control custom-checkbox"><input type="checkbox" name="read-users" id="users-checkbox1" class="custom-control-input"><label class="custom-control-label" for="users-checkbox1"></label>                                                                
                                                </div>
                                            </td>
                                            <td>
                                                <div class="custom-control custom-checkbox"><input type="checkbox" name="write-users" id="users-checkbox2" class="custom-control-input"><label class="custom-control-label" for="users-checkbox2"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="custom-control custom-checkbox"><input type="checkbox" name="create-users" id="users-checkbox3" class="custom-control-input"><label class="custom-control-label" for="users-checkbox3"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="custom-control custom-checkbox"><input type="checkbox" name="delete-users" id="users-checkbox4" class="custom-control-input">
                                                    <label class="custom-control-label" for="users-checkbox4"></label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>{{__('menus.clients')}}</td>
                                            <td>
                                                <div class="custom-control custom-checkbox"><input type="checkbox" name="read-clients" id="users-checkbox5" class="custom-control-input"><label class="custom-control-label" for="users-checkbox5"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="custom-control custom-checkbox"><input type="checkbox" name="write-clients" id="users-checkbox6" class="custom-control-input">
                                                    <label class="custom-control-label" for="users-checkbox6"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="custom-control custom-checkbox"><input type="checkbox" name="create-clients" id="users-checkbox7" class="custom-control-input"><label class="custom-control-label" for="users-checkbox7"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="custom-control custom-checkbox"><input type="checkbox" name="delete-clients" id="users-checkbox8" class="custom-control-input">
                                                    <label class="custom-control-label" for="users-checkbox8"></label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>{{__('menus.products')}}</td>
                                            <td>
                                                <div class="custom-control custom-checkbox"><input type="checkbox" name="read-products" id="users-checkbox9" class="custom-control-input">
                                                    <label class="custom-control-label" for="users-checkbox9"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="custom-control custom-checkbox"><input type="checkbox" name="write-products" id="users-checkbox10" class="custom-control-input">
                                                    <label class="custom-control-label" for="users-checkbox10"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="custom-control custom-checkbox"><input type="checkbox" name="create-products" id="users-checkbox11" class="custom-control-input"><label class="custom-control-label" for="users-checkbox11"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="custom-control custom-checkbox"><input type="checkbox" name="delete-products" id="users-checkbox12" class="custom-control-input"><label class="custom-control-label" for="users-checkbox12"></label>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-6 p-3">
                            <h6 class="border-bottom py-1 mx-1 mb-0 font-medium-2"><i class="feather icon-lock mr-50 "></i>{{__('forms.access')}}</h6>
                            <div class="row m-3">
                                <div class="custom-control custom-switch custom-control-inline">

                                    <input name="manage-business" type="checkbox" class="custom-control-input" id="accountSwitch1">
                                    <label class="custom-control-label mr-1" for="accountSwitch1"></label>
                                    <span class="switch-label w-100">{{__('forms.manage_business')}}</span>
                                </div>
                            </div>
                            <div class="row m-3">
                                <div class="custom-control custom-switch custom-control-inline">

                                    <input name="manage-loyalties" type="checkbox" class="custom-control-input" id="accountSwitch2">
                                    <label class="custom-control-label mr-1" for="accountSwitch2"></label>
                                    <span class="switch-label w-100">{{__('forms.manage_loyalties')}}</span>
                                </div>
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

@endsection