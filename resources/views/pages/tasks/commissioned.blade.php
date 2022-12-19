@extends('pages.tasks.master')
@section('tasks-content')
<div class="row">
    <div class="col-md-12">
        <div class="card p-1">
            <div class="card-header p-4 pb-0 m-0">
                <h4>{{$title}}</h4>
            </div>
            <div class="card-body p-4">
                @if (count(auth()->user()->tasksDelegated) > 0)
                    <table class="table">
                        <thead>
                            <th width="3%"></th>
                            <th class="text-center" width="auto">
                                {{ __('modules.title') }}
                            </th>
                            <th class="text-center" width="15%">
                                {{ __('modules.affiliated_client') }}
                            </th>
                            <th class="text-center" width="10%">
                                {{ __('modules.priority') }}
                            </th>
                            <th class="text-center" width="15%">
                                {{ __('modules.deadline') }}
                            </th> 
                            <th class="text-center" width="15%">
                                {{ __('modules.assigned_to') }}
                            </th>
                            <th class="text-center" width="10%">
                                {{ __('modules.actions') }}
                            </th>      
                        </thead>
                        <tbody>
                            @foreach (auth()->user()->tasksDelegated as $task)
                                <tr id="{{$task->id}}" class="{{ $task->completed_at != null ? 'text-decoration-line-through':'' }}">
                                    <td class="text-center align-middle"><input type="checkbox" class="form-check-input" onclick="taskChecked(this, '{{$task->id}}')"{{ $task->completed_at != null ? 'checked':'' }}></td>
                                    <td width="auto" class="align-middle">
                                        <div class="fw-bold">{{$task->title}}</div>
                                        <div>{{$task->message}}</div>
                                    </td>
                                    @if ($task->client())
                                        <td class="text-center align-middle">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <a class="" href="{{ route('clients.show', $task->client->id) }}">
                                                        <img class="rounded-circle" width="40" height="40" src="{{ asset($task->client->avatar) }}">
                                                        {{ $task->client->name() }}
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    @else
                                    <td>
                                        {{ __('modules.tasks_client_none') }}
                                    </td>
                                    @endif
                                    <td class="text-center align-middle"><span class="{{$task->priority_class()}}fw-bold">{{$task->priority()}}</span></td>
                                    <td class="text-center align-middle">
                                        <div>
                                            {{$task->deadline_at->diffForHumans()}}
                                        </div>
                                        <div class="fs-7">
                                            {{$task->deadline_at->format('d-m H:i')}}
                                        </div>
                                    </td>
                                    <td class="text-center align-middle">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <a class="" href="{{ route('clients.show', $task->target->id) }}">
                                                    <img class="rounded-circle" width="40" height="40" src="{{ asset($task->target->avatar) }}">
                                                    {{ $task->target->name() }}
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center align-middle">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <a href="{{ route('tasks.edit', $task->id) }}"><i class="bi bi-pencil-square fs-5 me-2"></i></a>
                                                <a href="{{ route('tasks.delete', $task->id) }}"><i class="bi bi-trash-fill fs-5"></i></a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>  
                            @endforeach
                        </tbody>
                    </table>         
                @else
                    {{ __('modules.no_tasks') }}
                @endif
            </div>
        </div>
    </div>
</div>


@endsection