@extends('layouts.app')
@section('content')
@include('components.alerts')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header p-4 pb-0 m-0">
                <h2 class="page-header">{{$client->name()}}
                    <a href="{{route('clients.edit', $client->id)}}" class="ms-3 me-1 mt-2 fs-4" data-mdb-toggle="tooltip" data-mdb-placement="bottom" data-mdb-original-title="{{__('buttons.edit')}}"><i class="bi bi-pencil"></i></a>
                    <a href="{{route('clients.edit', $client->id)}}" class="mx-1 mt-2 fs-3" data-mdb-toggle="tooltip" data-mdb-placement="bottom" data-mdb-original-title="{{__('buttons.add_task')}}"><i class="bi bi-check2-circle"></i></a>
                    <a href="{{route('clients.edit', $client->id)}}" class="mx-1 mt-2 fs-3" data-mdb-toggle="tooltip" data-mdb-placement="bottom" data-mdb-original-title="{{__('buttons.add_note')}}" data-bs-toggle="modal" data-bs-target="#note"><i class="bi bi-journal-plus"></i></a>
                </h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="users-view-image ms-2">
                        <img src="{{asset($client->avatar)}}" class="rounded-circle mb-2 mx-1" alt="avatar" width="120" height="120">
                    </div>
                    <div class="col-12 col-sm-9 col-md-6 col-lg-5">
                        <table class="view-list">
                            <tbody>
                                <tr>
                                    <td class="fw-bold">
                                        {{__('forms.email')}}
                                    </td>
                                    <td>
                                        {{$client->email}}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">
                                        {{__('forms.phone')}}
                                    </td>
                                    <td>
                                        {{$client->phone!=null ? $client->phone:__('forms.no_record')}}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">
                                        {{__('forms.hasaccount')}}
                                    </td>
                                    <td>
                                        @if ($client->ifhasAccount())
                                        <span class="badge badge-status badge-success">{{$client->hasAccount()}}</span>
                                        @else
                                        <span class="badge badge-status badge-warning">{{$client->hasAccount()}}</span>
                                        @endif
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
                                        {{__('forms.tags')}}
                                    </td>
                                    <td>
                                        @if ($client->hasAnyTag())
                                            @foreach ($client->tags as $tag)
                                                <span class="badge badge-tag" style="background-color: {{$tag->color}}"><i class="bi bi-tag-fill text-white"></i>{{$tag->name}}</span>
                                            @endforeach
                                        @else
                                            {{__('forms.none')}}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">
                                        {{__('forms.hair_length')}}
                                    </td>
                                    <td>
                                        <span class="badge badge-status badge-primary">{{$client->hairLength()}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">
                                        {{__('forms.actions')}}
                                    </td>
                                    <td>
                                        <a class="fs-5 ms-2" href="#" data-mdb-toggle="tooltip" data-mdb-placement="bottom" data-mdb-original-title="{{__('forms.notifications')}}"><i class="bi bi-bell-fill"></i></a>
                                        <a class="fs-5 ms-2" href="#" data-mdb-toggle="tooltip" data-mdb-placement="bottom" data-mdb-original-title="{{__('buttons.reset_password')}}"><i class="bi bi-send-check-fill"></i></a>
                                        <a class="fs-5 ms-2" href="#" data-mdb-toggle="tooltip" data-mdb-placement="bottom" data-mdb-original-title="{{__('buttons.send_invitation')}}"><i class="bi bi-send-plus-fill"></i></a>
                                        <a class="fs-5 ms-2" href="#" data-mdb-toggle="tooltip" data-mdb-placement="bottom" data-mdb-original-title="{{__('buttons.show_logs')}}"><i class="bi bi-person-badge-fill"></i></a>
                                        <a class="fs-5 ms-2" href="#" data-mdb-toggle="tooltip" data-mdb-placement="bottom" data-mdb-original-title="{{__('buttons.merge')}}"><i class="bi bi-intersect"></i></a>

                                        <a class="fs-5 ms-2" href="{{route('clients.delete', $client->id)}}" data-mdb-toggle="tooltip" data-mdb-placement="bottom" data-mdb-original-title="{{__('buttons.delete')}}"><i class="bi bi-trash-fill"></i></a>
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
                    <div class="col-12">
                        <table class="view-list">
                            <tbody>
                                <tr>
                                    <td class="fw-bold">
                                        {{__('forms.birthdate')}}
                                    </td>
                                    <td>
                                        {{$client->birthdate!=null ? $client->birthdate->format('d.m.Y'):__('forms.no_record')}}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">
                                        {{__('forms.city')}}
                                    </td>
                                    <td>
                                        {{$client->city!=null ? $client->city:__('forms.no_record')}}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8 pe-3">
        <div class="card card-profile">
            <div class="card-header p-4 pb-0 m-0">
                <h3>{{__('forms.visits')}}</h3>
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
                    @foreach ($client->notes as $note)
                    <div class="col-md-6 shadow me-2">
                        <figure class="p-3">
                            <blockquote class="blockquote fs-6">
                                @foreach ($note->text as $line)
                                    <p>{{$line}}</p>
                                @endforeach
                            </blockquote> 
                            <figcaption class="blockquote-footer m-0 float-right">
                                <strong>{{$note->author()->name()}}</strong> | <cite>{{$note->created_at->diffForHumans()}}</cite><a href="{{route('clients.note.delete', $note->id)}}"><i class="bi bi-x-lg text-danger fs-6 ms-2"></i></a>
                            </figcaption>
                        </figure>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection