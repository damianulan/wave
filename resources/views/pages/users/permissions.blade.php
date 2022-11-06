<div class="modal fade" id="permissions" tabindex="-1" aria-labelledby="permissionsLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title fw-bold text-primary" id="permissionsLabel"><i class="bi bi-shield-lock-fill me-2 text-primary"></i>{{__('menus.permissions')}}</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{__('buttons.close')}}"></button>
        </div>
        <form action="{{route('users.permissions', $user->id)}}" method="post">
            @csrf
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="alert alert-primary fs-7">
                            <i class="bi bi-info-circle"></i> {{__('menus.permissions_info')}}<p class="mb-0 mt-1 text-end"><a href="" target="_blank">{{__('messages.learn')}}</a></p>
                          </div>
                    </div>
                </div>
                <div class="row border mx-4 my-2">
                    <div class="col-12 p-1">
                        <div class="table-responsive rounded px-1 table-hover">
                            <h6 class="border-bottom py-2 mx-1 mb-0 fw-bold">{{__('forms.modules')}}</h6>
                            <table class="table table-borderless">
                                <thead>
                                    <tr class="fs-6">
                                        <th></th>
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
                                            <input type="checkbox" name="clients/view" class="form-check-input" {{$user->can('clients/view') ? 'checked' : ''}}>
                                        </td>
                                        <td>
                                            <input type="checkbox" name="clients/view" class="form-check-input" {{$user->can('clients/view') ? 'checked' : ''}}>
                                        </td>
                                        <td>
                                            <input type="checkbox" name="clients/view" class="form-check-input" {{$user->can('clients/view') ? 'checked' : ''}}>
                                        </td>
                                        <td>
                                            <input type="checkbox" name="clients/view" class="form-check-input" {{$user->can('clients/view') ? 'checked' : ''}}>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>{{__('menus.clients')}}</td>
                                        <td>
                                            <input type="checkbox" name="clients/view" class="form-check-input" {{$user->can('clients/view') ? 'checked' : ''}}>
                                        </td>
                                        <td>
                                            <input type="checkbox" name="clients/view" class="form-check-input" {{$user->can('clients/view') ? 'checked' : ''}}>
                                        </td>
                                        <td>
                                            <input type="checkbox" name="clients/view" class="form-check-input" {{$user->can('clients/view') ? 'checked' : ''}}>
                                        </td>
                                        <td>
                                            <input type="checkbox" name="clients/view" class="form-check-input" {{$user->can('clients/view') ? 'checked' : ''}}>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>{{__('menus.products')}}</td>
                                        <td>
                                            <input type="checkbox" name="clients/view" class="form-check-input" {{$user->can('clients/view') ? 'checked' : ''}}>
                                        </td>
                                        <td>
                                            <input type="checkbox" name="clients/view" class="form-check-input" {{$user->can('clients/view') ? 'checked' : ''}}>
                                        </td>
                                        <td>
                                            <input type="checkbox" name="clients/view" class="form-check-input" {{$user->can('clients/view') ? 'checked' : ''}}>
                                        </td>
                                        <td>
                                            <input type="checkbox" name="clients/view" class="form-check-input" {{$user->can('clients/view') ? 'checked' : ''}}>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>{{__('menus.services')}}</td>
                                        <td>
                                            <input type="checkbox" name="clients/view" class="form-check-input" {{$user->can('clients/view') ? 'checked' : ''}}>
                                        </td>
                                        <td>
                                            <input type="checkbox" name="clients/view" class="form-check-input" {{$user->can('clients/view') ? 'checked' : ''}}>
                                        </td>
                                        <td>
                                            <input type="checkbox" name="clients/view" class="form-check-input" {{$user->can('clients/view') ? 'checked' : ''}}>
                                        </td>
                                        <td>
                                            <input type="checkbox" name="clients/view" class="form-check-input" {{$user->can('clients/view') ? 'checked' : ''}}>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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
