<div class="tab-pane fade" id="modules-tab" role="tabpanel" aria-labelledby="modules">
    <div class="header">
        {{__('menus.modules')}}
      </div>
      <div class="alert alert-primary mb-3">
        <i class="bi bi-info-circle-fill me-1"></i> {{__('messages.settings_modules_info')}}<br>{{__('messages.read_risks')}} <a target="_blank" href="#">{{__('messages.docs_link')}}</a>.
      </div>
      <div class="row ps-3">
        <div class="col-md-12 px-4">
            <form method="post" action="{{route('settings.modulesSave')}}" novalidate>
                @method('post')
                @csrf
                <table class="table list-settings">
                    <tbody>
                        <tr>
                            <th scope="row">
                                <input class="form-check-input" type="checkbox" name="tasks"{{$modules['tasks']=='1' ? ' checked':''}}>
                            </th>
                            <td class="name">
                                {{__('menus.tasks')}}
                            </td>
                            <td>
                                {{__('menus.tasks_description')}}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <input class="form-check-input" type="checkbox" name="products"{{$modules['products']=='1' ? ' checked':''}}>
                            </th>
                            <td class="name">
                                {{__('menus.products')}}
                            </td>
                            <td>
                                {{__('menus.products_description')}}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <input class="form-check-input" type="checkbox" name="loyalties"{{$modules['loyalties']=='1' ? ' checked':''}}>
                            </th>
                            <td class="name">
                                {{__('menus.loyalties')}}
                            </td>
                            <td>
                                {{__('menus.loyalties_description')}}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <input class="form-check-input" type="checkbox" name="analytics"{{$modules['analytics']=='1' ? ' checked':''}}>
                            </th>
                            <td class="name">
                                {{__('menus.analytics')}}
                            </td>
                            <td>
                                {{__('menus.analytics_description')}}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <input class="form-check-input" type="checkbox" name="finances"{{$modules['finances']=='1' ? ' checked':''}}>
                            </th>
                            <td class="name">
                                {{__('menus.finances')}}
                            </td>
                            <td>
                                {{__('menus.finances_description')}}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <input class="form-check-input" type="checkbox" name="tags"{{$modules['tags']=='1' ? ' checked':''}}>
                            </th>
                            <td class="name">
                                {{__('menus.tags')}}
                            </td>
                            <td>
                                {{__('menus.tags_description')}}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <button type="submit" class="btn btn-primary fw-bold">{{__('buttons.submit')}}</button>
            </form>
        </div>
      </div>
</div>