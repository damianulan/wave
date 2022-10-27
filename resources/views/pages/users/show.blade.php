@extends('layouts.app')
@section('content')
@include('components.alerts')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header p-4 pb-0 m-0">
                <h2 class="page-header">{{$user->firstname . ' ' . $user->lastname}}
                    <a href="{{route('users.edit', $user->id)}}" class="ms-3 me-1 mt-2 fs-4" data-mdb-toggle="tooltip" data-mdb-placement="bottom" data-mdb-original-title="{{__('buttons.edit')}}"><i class="bi bi-pencil"></i></a>
                    <a href="{{route('users.edit', $user->id)}}" class="mx-1 mt-2 fs-3" data-mdb-toggle="tooltip" data-mdb-placement="bottom" data-mdb-original-title="{{__('buttons.add_task')}}"><i class="bi bi-check2-circle"></i></a>
                    <a href="{{route('users.edit', $user->id)}}" class="mx-1 mt-2 fs-3" data-mdb-toggle="tooltip" data-mdb-placement="bottom" data-mdb-original-title="{{__('buttons.add_note')}}"><i class="bi bi-journal-plus"></i></a>
                </h2>
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
                                        <a class="fs-5 ms-2" href="#" data-mdb-toggle="tooltip" data-mdb-placement="bottom" data-mdb-original-title="{{__('buttons.watch')}}"><i class="bi bi-eye-fill"></i></a>
                                        <a class="fs-5 ms-2" href="#" data-mdb-toggle="tooltip" data-mdb-placement="bottom" data-mdb-original-title="{{__('forms.permissions')}}"><i class="bi bi-shield-lock-fill"></i></a>
                                        <a class="fs-5 ms-2" href="#" data-mdb-toggle="tooltip" data-mdb-placement="bottom" data-mdb-original-title="{{__('forms.notifications')}}"><i class="bi bi-bell-fill"></i></a>
                                        <a class="fs-5 ms-2" href="#" data-mdb-toggle="tooltip" data-mdb-placement="bottom" data-mdb-original-title="{{__('buttons.reset_password')}}"><i class="bi bi-send-check-fill"></i></a>
                                        <a class="fs-5 ms-2" href="#" data-mdb-toggle="tooltip" data-mdb-placement="bottom" data-mdb-original-title="{{__('buttons.block')}}"><i class="bi bi-slash-circle-fill"></i></a>
                                        <a class="fs-5 ms-2" href="#" data-mdb-toggle="tooltip" data-mdb-placement="bottom" data-mdb-original-title="{{__('buttons.delete')}}"><i class="bi bi-trash-fill"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection