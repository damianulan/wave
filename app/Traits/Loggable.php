<?php

namespace App\Traits;

use App\Models\User;
use App\Models\Log;
use Illuminate\Support\Facades\DB;

trait Loggable
{
    /**
     * @return mixed
     */
    public function lastLogin()
    {
        $log = Log::select('created_at')->where([
            'user_id' => $this->id,
            'action' => 'login'
            ])->orderBy('created_at')->first();
        if($log != null){
            $date = date('d-m-Y H:i', strtotime($log->created_at));
            return $date;
        }else{
            return null;
        }

    }

    /**
     * @param integer $rows
     */
    public function getActivity($rows = null)
    {
        $logs = Log::select('action', 'data', 'created_at')->where('user_id', $this->id)->whereNotIn('action', ['login', 'login_failed'])->orderBy('created_at');
        if($rows == null){
            $logs = $logs->get();
        } else {
            $logs = $logs->take($rows)->get();
        }
        return $logs;
    }

    public function getLogs($rows = null){
        $logs = Log::select('action', 'data', 'created_at')->where('user_id', $this->id)->where(function ($query){
            $query->where('action', 'login')->orWhere('action', 'login_failed');
        })->orderBy('created_at');
        if($rows == null){
            $logs = $logs->get();
        } else {
            $logs = $logs->take($rows)->get();
        }
        return $logs;
    }

    /**
     * @param Log
     */
    public function getTargetData(Log $log)
    {
        $query = "select name from " . $log->data['table'] . " where id like '" . $log->data['id'] . "'";
        $target = DB::select($query)[0];
        return $target;
    }

    public function hasAnyLog(): bool
    {
        if(Log::where(['user_id' => $this->id, 'action' => 'login'])->exists())
        {
            return true;
        }
        return false;
    }

    public function makeLogin($ip)
    {
        Log::create([
            'user_id' => $this->id,
            'ip' => $ip,
            'action' => 'login'
        ]);
        return true;
    }

    public function makeLoginFailed($ip)
    {
        Log::create([
            'user_id' => $this->id,
            'ip' => $ip,
            'action' => 'login_failed'
        ]);
        return true;
    }

}