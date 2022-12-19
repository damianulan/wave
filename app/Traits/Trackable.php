<?php

namespace App\Traits;

use App\Models\Activity;
use Illuminate\Support\Facades\DB;

trait Trackable
{

    public function noteActivity(string $action, string $model)
    {
        $log = new Activity();
        $log->user_id = auth()->user()->id;
        $log->ip = request()->ip();
        $log->action = $action;
        $log->model = $model;
        $log->target_id = $this->id;
        $log->save();
    }

    public function getActivity(int $rows = null)
    {
        if($rows != null){
            return Activity::where('user_id', $this->id)->orderByDesc('created_at')->take($rows)->get();
        }
        return Activity::where('user_id', $this->id)->orderByDesc('created_at')->get();
    }

    public function getTrackingInfo()
    {
        return Activity::where('target_id', $this->id)->orderByDesc('created_at')->get();
    }

}