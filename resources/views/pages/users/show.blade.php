@extends('layouts.app')
@section('content')
@include('components.alerts')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header p-4 pb-0 m-0">
                <h2 class="page-header">{{$user->name()}}
                    <a href="{{route('users.edit', $user->id)}}" class="ms-3 me-1 mt-2 fs-4" data-mdb-toggle="tooltip" data-mdb-placement="bottom" data-mdb-original-title="{{__('buttons.edit')}}"><i class="bi bi-pencil"></i></a>
                    <a href="{{route('users.edit', $user->id)}}" class="mx-1 mt-2 fs-3" data-mdb-toggle="tooltip" data-mdb-placement="bottom" data-mdb-original-title="{{__('buttons.add_task')}}"><i class="bi bi-check2-circle"></i></a>
                    <a href="{{route('users.edit', $user->id)}}" class="mx-1 mt-2 fs-3" data-mdb-toggle="tooltip" data-mdb-placement="bottom" data-mdb-original-title="{{__('buttons.add_note')}}" data-bs-toggle="modal" data-bs-target="#note"><i class="bi bi-journal-plus"></i></a>
                </h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="users-view-image ms-2">
                        <img src="{{asset($user->avatar)}}" class="rounded-circle mb-2 mx-1" alt="avatar" width="120" height="120">
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
                                        {{__('forms.phone')}}
                                    </td>
                                    <td>
                                        {{$user->phone}}
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
                                        {{$user->locationName()}}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">
                                        {{__('forms.tags')}}
                                    </td>
                                    <td>
                                        @if ($user->hasAnyTag())
                                            @foreach ($user->tags as $tag)
                                                <span class="badge badge-tag" style="background-color: {{$tag->color}}"><i class="bi bi-tag-fill text-white"></i>{{$tag->name}}</span>
                                            @endforeach
                                        @else
                                            {{__('forms.none')}}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">
                                        {{__('forms.status')}}
                                    </td>
                                    <td>
                                        <span class="badge badge-status badge-{{$user->status=='1' ? 'primary':'dark'}}">{{__('forms.status_'.$user->status)}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">
                                        {{__('forms.actions')}}
                                    </td>
                                    <td>
                                        @if($user->isThisUserObservedByUser(auth()->user()))
                                            <a class="fs-5 ms-2" href="{{route('users.unwatch', $user->id)}}" data-mdb-toggle="tooltip" data-mdb-placement="bottom" data-mdb-original-title="{{__('buttons.unwatch')}}"><i class="bi bi-eye-slash-fill"></i></a>
                                        @else
                                            <a class="fs-5 ms-2" href="{{route('users.watch', $user->id)}}" data-mdb-toggle="tooltip" data-mdb-placement="bottom" data-mdb-original-title="{{__('buttons.watch')}}"><i class="bi bi-eye-fill"></i></a>
                                        @endif
                                        <a class="fs-5 ms-2" href="#" data-mdb-toggle="tooltip" data-mdb-placement="bottom" data-mdb-original-title="{{__('forms.permissions')}}" data-bs-toggle="modal" data-bs-target="#permissions"><i class="bi bi-key-fill"></i></a>
                                        <a class="fs-5 ms-2" href="#" data-mdb-toggle="tooltip" data-mdb-placement="bottom" data-mdb-original-title="{{__('forms.notifications')}}"><i class="bi bi-bell-fill"></i></a>
                                        <a class="fs-5 ms-2" href="#" data-mdb-toggle="tooltip" data-mdb-placement="bottom" data-mdb-original-title="{{__('buttons.reset_password')}}"><i class="bi bi-send-check-fill"></i></a>
                                        <a class="fs-5 ms-2" href="#" data-mdb-toggle="tooltip" data-mdb-placement="bottom" data-mdb-original-title="{{__('buttons.show_logs')}}"><i class="bi bi-person-badge-fill"></i></a>
                                        @can('users/edit')
                                            @if ($user->isActive())
                                                <a class="fs-5 ms-2" href="{{route('users.block', $user->id)}}" data-mdb-toggle="tooltip" data-mdb-placement="bottom" data-mdb-original-title="{{__('buttons.block')}}"><i class="bi bi-shield-fill"></i></a>
                                            @else
                                                <a class="fs-5 ms-2" href="{{route('users.unblock', $user->id)}}" data-mdb-toggle="tooltip" data-mdb-placement="bottom" data-mdb-original-title="{{__('buttons.unblock')}}"><i class="bi bi-shield-slash-fill"></i></a>
                                            @endif
                                        @endcan

                                        <a class="fs-5 ms-2" href="{{route('users.delete', $user->id)}}" data-mdb-toggle="tooltip" data-mdb-placement="bottom" data-mdb-original-title="{{__('buttons.delete')}}"><i class="bi bi-trash-fill"></i></a>
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
<div class="row mt-4">
    <div class="col-md-4 pe-3">
        <div class="card card-profile">
            <div class="card-header p-4 pb-0 m-0">
                <h3>{{__('forms.personal_information')}}</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 pe-3">
        <div class="card card-profile">
            <h4 class="card-header p-3 pb-0 m-0"><i class="bi bi-activity"></i> {{ __('forms.recent_activity') }}</h4>
            <div class="card-body p-4">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <table class="table">
                            <tbody>
                                @if (count($logs) > 0)
                                    @foreach ($logs as $log)
                                        <tr>
                                            <td><span class="fw-bold">{{$user->name()}}</span> {{__('activities.'.$log->action, ['target' => $log->getTargetData()->name()]) }}</td>
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
    <div class="col-md-4 pe-3">
        <div class="card card-profile">
            <div class="card-header p-4 pb-0 m-0">
                <h3>{{__('forms.statistics')}}</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mt-4">
    <div class="col-md-12">
        <div class="card card-profile">
            <div class="card-header p-4 pb-0 m-0">
                <h3>{{__('menus.services')}}</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mt-4">
    <div class="col-md-12">
        <div class="card card-profile">
            <div class="card-header p-4 pb-0 m-0">
                <h3>{{__('menus.notes')}}</h3>
            </div>
            <div class="card-body py-2 px-5 mb-4">
                <div class="row">
                    <div class="col-md-6 shadow">
                        @foreach ($user->notes as $note)
                            <figure>
                                <blockquote class="blockquote fs-6 p-3">
                                    @foreach ($note->text as $line)
                                        <p>{{$line}}</p>
                                    @endforeach
                                </blockquote>
                                <figcaption class="blockquote-footer m-0">
                                    <strong>{{$note->author()->name()}}</strong> | <cite>{{$note->created_at->diffForHumans()}}</cite>
                                </figcaption>
                            </figure>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('pages.users.permissions')
@include('pages.users.note')
@endsection