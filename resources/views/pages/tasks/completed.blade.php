@extends('pages.tasks.master')
@section('tasks-content')
<div class="row">
    <div class="col-md-12">
        <div class="card p-1">
            <div class="card-header p-4 pb-0 m-0">
                <h4>{{$title}}</h4>
            </div>
            <div class="card-body p-4">
                @if (count(auth()->user()->tasksCompleted) > 0)
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
                                {{ __('modules.author') }}
                            </th>      
                        </thead>
                        <tbody>
                            @foreach (auth()->user()->tasksCompleted as $task)
                                <tr id="{{$task->id}}" class="text-decoration-line-through">
                                    <td class="text-center align-middle"><input type="checkbox" class="form-check-input" onclick="taskChecked(this, '{{$task->id}}')" checked></td>
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
                                                <a class="" href="{{ route('clients.show', $task->author->id) }}">
                                                    <img class="rounded-circle" width="40" height="40" src="{{ asset($task->author->avatar) }}">
                                                    {{ $task->author->name() }}
                                                </a>
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
@section('page-scripts')
<script>
    function taskChecked(e, id){
        var elementId = '#'+id;
        $(elementId).toggleClass('text-decoration-line-through');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        if(e.checked){
            var url = "{{url('/')}}" + "/tasks/" + id + "/done";
        } else {
            var url = "{{url('/')}}" + "/tasks/" + id + "/undone";
        }

        $.get(url, function (response) {
            if(!response.success){
                alert(response.error);
            }
        });

    }
</script>
@endsection

@endsection