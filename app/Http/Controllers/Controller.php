<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Role;
use App\Models\Config;
use App\Models\Permission;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function roles()
    {
        return Role::where('slug', 'not like', 'root')->get();
    }

    public function permissions()
    {
        return Permission::all();
    }

    public function translateCheckboxValue($value)
    {
        if ($value != null){
            return '1';
        } else {
            return '0';
        }

    }

}
