<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Role;
use App\Models\Config;
use App\Models\Permission;
use Illuminate\Support\Facades\Storage;
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

    public function getThemes(): array
    {
        $storage = Storage::disk('themes')->directories();
        $themes = [];
        foreach ($storage as $dir){
            if($dir !== 'vendors'){
                $themes[] = $dir;
            }
        }
        return $themes;
    }

    public function dateFromInput($input) {
        if($input != null){
            return date("Y-m-d", strtotime($input));
        }
        return null;
    }

    public function getAvatarDefault($gender = null)
    {
        $g = '0';
        if($gender != null){
            $g = $gender;
        }
        if($g == '0'){
            return Config::getAvatarFemale();
        } elseif ($g == '1'){
            return Config::getAvatarMale();
        }

        return null;
    }

    public function birthdateFromInput($input) {
        if($input != null){
            return date("Y-m-d", strtotime($input));
        }
        return null;
    }

}
