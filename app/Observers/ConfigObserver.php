<?php

namespace App\Observers;
use App\Models\Log;
use App\Models\Config;

class ConfigObserver
{
    public function updated(Config $config)
    {
        if(auth()->check()){

            $log = new Log();
            $log->user_id = auth()->user()->id;
            $log->ip = request()->ip();
            $log->action = "edit";
            $log->data = [
                'table' => 'config',
                'id' => $config->id
            ];
            $log->save();
        }
    }
}
