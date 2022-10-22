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
            $date = date('d-m-Y H:i:s', strtotime($log->created_at));
            return $date;
        }else{
            return null;
        }

    }

    /**
     * @param integer $rows
     */
    public function getActivity($rows)
    {
        $logs = Log::select('action', 'data', 'created_at')->where('user_id', $this->id)->whereNotIn('action', ['login', 'login_failed'])->orderBy('created_at')->take($rows)->get();
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

}