@extends('layouts.app')
@section('content')
@include('components.alerts')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header p-4 pb-0 m-0">
                <h2 class="page-header">{{$user->firstname . ' ' . $user->lastname}}</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="users-view-image">
                        <img src="{{asset($user->avatar)}}" class="rounded w-100 mb-2 pe-3 ms-1" alt="avatar">
                    </div>
                    <div class="col-12 col-sm-9 col-md-6 col-lg-5">
                        <table class="view-list">
                            <tbody>
                                <tr>
                                    <td class="fw-bold">
                                        {{__('forms.nickname')}}
                                    </td>
                                    <td>
                                        {{$user->nickname}}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">
                                        {{__('forms.email')}}
                                    </td>
                                    <td>
                                        {{$user->email}}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">
                                        {{__('forms.role')}}
                                    </td>
                                    <td>
                                        {{$role}}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">
                                        {{__('forms.last_login')}}
                                    </td>
                                    <td>
                                        {{$user->lastLogin() ? $user->lastLogin():__('forms.no_record')}}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-12 col-md-12 col-lg-5">
                        <table class="view-list">
                            <tbody>
                                <tr>
                                    <td class="fw-bold">
                                        {{__('forms.location')}}
                                    </td>
                                    <td>
                                        {{isset($user->location) ? $user->location->name:__('forms.none')}}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">
                                        {{__('forms.tags')}}
                                    </td>
                                    <td>
                                        {{isset($user->tags) ? $user->tags->name:__('forms.none')}}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">
                                        {{__('forms.actions')}}
                                    </td>
                                    <td>
                                        <a class="fs-5 ms-2" href="#" data-mdb-toggle="tooltip" data-mdb-placement="bottom" data-mdb-original-title="{{__('forms.permissions')}}"><i class="bi bi-shield-lock-fill"></i></a>
                                        <a class="fs-5 ms-2" href="#" data-mdb-toggle="tooltip" data-mdb-placement="bottom" data-mdb-original-title="{{__('forms.notifications')}}"><i class="bi bi-bell-fill"></i></a>
                                        <a class="fs-5 ms-2" href="#" data-mdb-toggle="tooltip" data-mdb-placement="bottom" data-mdb-original-title="{{__('forms.permissions')}}"><i class="bi bi-shield-lock-fill"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="row">
                    <div class="col-12">
                        <form method="POST" action="{{route('users.destroy', $user->id)}}" novalidate>
                            @method("DELETE")
                            @csrf
                            <a href="{{route('users.edit', $user->id)}}" class="btn btn-primary me-2 mt-2"><i class="bi bi-pencil-fill me-2"></i> {{__('buttons.edit')}}</a>
                            <button type="submit" class="btn btn-primary mt-2"><i class="bi bi-trash-fill me-2"></i> {{__('buttons.delete')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection