<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class Config extends Model
{
    use HasFactory, UUID;

    protected $table = 'config';
    protected $primaryKey = 'id';

    public $timestamps = false;
    
    protected $fillable = [
        'type',
        'slug',
        'value'
    ];

    public static function owner()
    {
        $config = Config::where(['slug' => 'owner'])->get();
        return User::findOrFail($config[0]->value);
    }

    public static function setModules()
    {
        $all = Config::where(['type' => 'modules'])->get();
        $modules = [];
        foreach ($all as $rule){
            $modules[$rule->slug] = $rule->value;
        }
        Session::put('modules', $modules);
        return true;
    }

    public static function hasModule($module): bool
    {
        if(Session::missing('modules')){
            Config::setModules();
        }
        $modules = Session::get('modules');
        if($modules[$module] == '1'){
            return true;
        }
        return false;
    }

    public static function getModulesDB(): array {
        $config = Config::where(['type' => 'modules'])->get();
        $modules = [];
        foreach ($config as $rule){
            $modules[$rule->slug] = $rule->value;
        }

        return $modules;
    }

    public static function setTheme()
    {
        $rule = Config::where(['slug' => 'theme'])->get();
        Session::put('theme', $rule);
        return true;
    }

    public static function getTheme()
    {
        $theme = '';
        if(Auth::check()){
            if(Session::has('theme')){
                $theme = Session::get('theme');
            } else {
                $rule = Config::where(['slug' => 'theme'])->get();
                $theme = $rule[0]->value;
            }
        } else {
            $theme = 'wave-light';
        }
        return $theme;
    }

    public static function getLocale()
    {
        $locale = Config::where(['slug' => 'locale'])->get()[0];
        return $locale->value;
    }

    public static function getAvatarFemale()
    {
        $avatar = Config::where(['slug' => 'avatarfemale'])->get()[0];
        return $avatar->slug;
    }

    public static function getAvatarMale()
    {
        $avatar = Config::where(['slug' => 'avatarmale'])->get()[0];
        return $avatar->slug;
    }
}
