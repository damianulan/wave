<div class="row border m-3">
    <div class="col-6 p-3">
        <div class="table-responsive rounded px-1 ">
            <h6 class="border-bottom py-1 mx-1 mb-0 font-medium-2"><i class="feather icon-lock mr-50 "></i>{{__('forms.permissions')}}</h6>
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th>{{__('forms.modules')}}</th>
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
                            <div class="custom-control custom-checkbox"><input type="checkbox" name="read-users" id="users-checkbox1" class="custom-control-input"><label class="custom-control-label" for="users-checkbox1"></label>                                                                
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox"><input type="checkbox" name="write-users" id="users-checkbox2" class="custom-control-input"><label class="custom-control-label" for="users-checkbox2"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox"><input type="checkbox" name="create-users" id="users-checkbox3" class="custom-control-input"><label class="custom-control-label" for="users-checkbox3"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox"><input type="checkbox" name="delete-users" id="users-checkbox4" class="custom-control-input">
                                <label class="custom-control-label" for="users-checkbox4"></label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>{{__('menus.clients')}}</td>
                        <td>
                            <div class="custom-control custom-checkbox"><input type="checkbox" name="read-clients" id="users-checkbox5" class="custom-control-input"><label class="custom-control-label" for="users-checkbox5"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox"><input type="checkbox" name="write-clients" id="users-checkbox6" class="custom-control-input">
                                <label class="custom-control-label" for="users-checkbox6"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox"><input type="checkbox" name="create-clients" id="users-checkbox7" class="custom-control-input"><label class="custom-control-label" for="users-checkbox7"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox"><input type="checkbox" name="delete-clients" id="users-checkbox8" class="custom-control-input">
                                <label class="custom-control-label" for="users-checkbox8"></label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>{{__('menus.products')}}</td>
                        <td>
                            <div class="custom-control custom-checkbox"><input type="checkbox" name="read-products" id="users-checkbox9" class="custom-control-input">
                                <label class="custom-control-label" for="users-checkbox9"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox"><input type="checkbox" name="write-products" id="users-checkbox10" class="custom-control-input">
                                <label class="custom-control-label" for="users-checkbox10"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox"><input type="checkbox" name="create-products" id="users-checkbox11" class="custom-control-input"><label class="custom-control-label" for="users-checkbox11"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox"><input type="checkbox" name="delete-products" id="users-checkbox12" class="custom-control-input"><label class="custom-control-label" for="users-checkbox12"></label>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-6 p-3">
        <h6 class="border-bottom py-1 mx-1 mb-0 font-medium-2"><i class="feather icon-lock mr-50 "></i>{{__('forms.access')}}</h6>
        <div class="row m-3">
            <div class="custom-control custom-switch custom-control-inline">

                <input name="manage-business" type="checkbox" class="custom-control-input" id="accountSwitch1">
                <label class="custom-control-label mr-1" for="accountSwitch1"></label>
                <span class="switch-label w-100">{{__('forms.manage_business')}}</span>
            </div>
        </div>
        <div class="row m-3">
            <div class="custom-control custom-switch custom-control-inline">

                <input name="manage-loyalties" type="checkbox" class="custom-control-input" id="accountSwitch2">
                <label class="custom-control-label mr-1" for="accountSwitch2"></label>
                <span class="switch-label w-100">{{__('forms.manage_loyalties')}}</span>
            </div>
        </div>
    </div>
</div>