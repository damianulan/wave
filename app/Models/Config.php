<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class Config extends Model
{
    use HasFactory;

    protected $table = 'config';
    protected $primaryKey = 'id';

    public $timestamps = false;
    
    protected $fillable = [
        'type',
        'slug',
        'value'
    ];

    public static function get(): array
    {

        if(!Cache::has('config') || empty(Cache::get('config'))){
            self::loadConfigToCache();
        }
        return Cache::get('config');
    }

    public static function owner()
    {
        $config = self::get()['app']['owner'];
        return User::findOrFail($config[0]->value);
    }

    public static function hasModule($module): bool
    {
        $modules = self::getModules();
        if($modules[$module] == '1'){
            return true;
        }
        return false;
    }

    public static function getModules(): array {
        return self::get()['modules'];
    }

    public static function getApp() {
        return self::get()['app'];
    }

    public static function getTheme()
    {
        return self::get()['app']['theme'];
    }

    public static function getLocale()
    {
        return self::get()['app']['locale'];
    }

    public static function getAvatarFemale()
    {
        return self::get()['app']['avatarfemale'];
    }

    public static function getAvatarMale()
    {
        return self::get()['app']['avatarmale'];
    }

    public static function build()
    {
        return self::get()['app']['build'];
    }

    public static function upgrade(): bool
    {
        $build = Config::where(['slug' => 'build'])->get()->first();
        $build->value = date('YmdHi', time());
        if($build->update()){
            self::loadConfigToCache();
            return true;
        }
        return false;
    }

    public static function loadConfigToCache() {
        $config = [];
        $rows = Config::all();
        foreach ($rows as $row){
            $config[$row->type][$row->slug] = $row->value;
        }
        if($config > 0){
            if(Cache::has('config')){
                Cache::forget('config');
            }
            Cache::forever('config', $config);
            return true;
        }
    
        return false;
    }
}
