<?php

namespace App\Observers;
use App\Models\Activity;
use App\Models\Config;

class ConfigObserver
{
    public function updated(Config $config)
    {
        if(auth()->check()){

            $log = new Activity();
            $log->user_id = auth()->user()->id;
            $log->ip = request()->ip();
            $log->action = "edit";
            $log->model = 'config';
            $log->target_id = $config->id;
            $log->save();
        }
    }
}
