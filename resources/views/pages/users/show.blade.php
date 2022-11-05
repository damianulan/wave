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
                    <a href="{{route('users.edit', $user->id)}}" class="mx-1 mt-2 fs-3" data-mdb-toggle="tooltip" data-mdb-placement="bottom" data-mdb-original-title="{{__('buttons.add_note')}}"><i class="bi bi-journal-plus"></i></a>
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
                                        <a class="fs-5 ms-2" href="#" data-mdb-toggle="tooltip" data-mdb-placement="bottom" data-mdb-original-title="{{__('buttons.watch')}}"><i class="bi bi-eye-fill"></i></a>
                                        <a class="fs-5 ms-2" href="#" data-mdb-toggle="tooltip" data-mdb-placement="bottom" data-mdb-original-title="{{__('forms.permissions')}}" data-bs-toggle="modal" data-bs-target="#permissions"><i class="bi bi-shield-lock-fill"></i></a>
                                        <a class="fs-5 ms-2" href="#" data-mdb-toggle="tooltip" data-mdb-placement="bottom" data-mdb-original-title="{{__('forms.notifications')}}"><i class="bi bi-bell-fill"></i></a>
                                        <a class="fs-5 ms-2" href="#" data-mdb-toggle="tooltip" data-mdb-placement="bottom" data-mdb-original-title="{{__('buttons.reset_password')}}"><i class="bi bi-send-check-fill"></i></a>
                                        <a class="fs-5 ms-2" href="#" data-mdb-toggle="tooltip" data-mdb-placement="bottom" data-mdb-original-title="{{__('buttons.show_logs')}}"><i class="bi bi-person-badge-fill"></i></a>
                                        @can('users/edit')
                                            @if ($user->isActive())
                                                <a class="fs-5 ms-2" href="{{route('users.block', $user->id)}}" data-mdb-toggle="tooltip" data-mdb-placement="bottom" data-mdb-original-title="{{__('buttons.block')}}"><i class="bi bi-key-fill"></i></a>
                                            @else
                                                <a class="fs-5 ms-2" href="{{route('users.unblock', $user->id)}}" data-mdb-toggle="tooltip" data-mdb-placement="bottom" data-mdb-original-title="{{__('buttons.unblock')}}"><i class="bi bi-key-fill"></i></a>
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
        <div class="card">
            <div class="card-header p-4 pb-0 m-0">
                <h3>{{__('forms.recent_activity')}}</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="view-list">
                            <tbody>
                                @if (count($logs))
                                    @foreach ($logs as $log)
                                        <tr>
                                            <td class="pl-2">
                                                <h5 class="text-bold-400">
                                                <strong>{{$title}}</strong> {{' ' . __('activities.' . $log->action . '_' . $log->data['table'])}} 
                                                <strong><a href="{{route($log->data['table'] . '.' . $log->action, $log->data['id'])}}">{{$user->getTargetData($log)->name}}</a></strong>
                                                </h5>
                                            </td>
                                            <td class="px-2"><a data-toggle="tooltip" data-placement="top" title="{{date('d-m-Y H:i:s', strtotime($log->created_at))}}"><h6 class="text-muted">{{(new Carbon\Carbon($log->created_at))->diffForHumans()}}</h6></a></td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td><span class="ms-3 fs-6">{{__('messages.no_data')}}</span></td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="permissions" tabindex="-1" aria-labelledby="permissionsLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="columnChooserLabel">{{__('menus.permissions')}}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{__('buttons.close')}}"></button>
        </div>
        <form action="{{route('users.permissions', $user->id)}}" method="post">
            @csrf
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="alert alert-primary fs-7">
                            <i class="bi bi-info-circle"></i> {{__('menus.choose_columns_info')}}
                          </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('buttons.close')}}</button>
              <button type="submit" class="btn btn-primary">{{__('buttons.save')}}</button>
            </div>
        </form>

      </div>
    </div>
</div>
@endsection