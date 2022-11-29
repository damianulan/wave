<div class="modal fade" id="addTask" tabindex="-1" aria-labelledby="addTaskLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title fw-bold text-primary" id="addTaskLabel"><i class="bi bi-key-fill me-2 text-primary"></i>{{__('modules.add_task')}}</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{__('buttons.close')}}"></button>
        </div>
        <form action="{{route('tasks.create')}}"  method="post">
            @csrf
            <div class="modal-body">
                <div class="row mx-4 my-2">
                    <div class="col-12 p-1">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="controls">
                                        <label>{{__('modules.title')}}</label>
                                        <input name="title" type="text" class="form-control" placeholder="{{__('modules.title')}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="controls">
                                        <label>{{__('modules.title')}}</label>
                                        <textarea name="contents" type="text" class="form-control" placeholder="{{__('modules.message')}}"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="controls">
                                        <label>{{__('modules.priority')}}</label>
                                        <select name="priority" type="text" class="form-control" placeholder="{{__('modules.priority')}}">
                                            <option value="1">{{__('modules.priority_1')}}</option>
                                            <option value="0">{{__('modules.priority_0')}}</option>
                                            <option value="2">{{__('modules.priority_2')}}</option>
                                            <option value="3">{{__('modules.priority_3')}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <div class="controls">
                                        <label>{{__('modules.affiliate')}}</label>
                                        <select name="affiliated_client" type="text" class="form-control" placeholder="{{__('modules.affiliate')}}">
                                            <option value="-1">{{__('vocabulary.choose')}}</option>
                                            @foreach ($clients as $client)
                                                <option value="{{$client->id}}">{{$client->name()}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                                                <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="controls">
                                        <label>{{__('modules.deadline')}}</label>
                                        <input id="datepicker_1" name="deadline" type="text" class="form-control date-input" placeholder="dd/mm/yyyy" value="{{old('deadline')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <div class="controls">
                                        <label>{{__('modules.assign_to')}}</label>
                                        <select name="assigned_to" type="text" class="form-control" placeholder="{{__('modules.assign_to')}}">
                                            @foreach ($users as $user)
                                                <option value="{{$user->id}}">{{$user->name()}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
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
