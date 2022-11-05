@extends('layouts.app')
@section('content')
<div class="row mb-3">
    <div class="col-12">
        <div class="card p-1">
            <div class="card-header m-0">
                <nav>
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">{{__('menus.administration')}}</li>
                      <li class="breadcrumb-item active" aria-current="page">{{__('menus.settings')}}</li>
                    </ol>
                </nav>
                <h2 class="page-header">
                    {{__('menus.settings')}} 
                </h2>
            </div>
        </div>
    </div>
</div>
@include('components.alerts')
<div class="row my-3">
    <div class="col-12">
        <div class="card p-1">
            @include('pages.settings.layouts.nav')
            <div class="row">
                <div class="col-md-12">
                    <div class="card-body pt-2 px-4">
                        <div class="tab-content" id="ex-with-icons-content">
                            <div class="tab-pane fade show active" id="index-tab" role="tabpanel" aria-labelledby="index">
                              <div class="header">
                                {{__('menus.settings_site')}}
                              </div>
                              <div class="row ps-3">
                                <div class="col-md-3">
                                    <form>
                                        <table class="table list-settings">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        {{__('menus.lang')}}
                                                    </td>
                                                    <td>
                                                        <select class="form-select form-select-sm fs-6" name="locale">
                                                            @foreach (config('app.available_locales') as $locale)
                                                                <option value="{{$locale}}"{{$locale==config('app.locale') ? ' selected':''}}>{{__('locales.' . $locale)}}</option>
                                                            @endforeach  
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        {{__('menus.theme')}}
                                                    </td>
                                                    <td>
                                                        <select class="form-select form-select-sm fs-6" name="theme">
                                                            @foreach ($themes as $theme)
                                                                <option value="{{$theme}}"{{$theme==$config['theme']['value'] ? ' selected':''}}>{{$theme}}</option>
                                                            @endforeach  
                                                        </select>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                              </div>
                            </div>
                            @include('pages.settings.modules')
                            @include('pages.settings.notifications')
                            @include('pages.settings.products')
                            @include('pages.settings.loyalties')
                            @include('pages.settings.tasks')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection