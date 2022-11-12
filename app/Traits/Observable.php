<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Support\Facades\DB;

trait Observable
{

    public function getObservedUsers(): array
    {
        $observed = DB::table('users_watching_users')->select('user_id')->where(['watcher_id' => $this->id])->get();
        $result = [];
        if(count($observed)){
            foreach ($observed as $o){
                $user = User::findOrFail($o->id);
                $result[] = $user;
            }
        }
        return $result;
    }

    public function isUserObservedByThisUser(User $user): bool
    {
        $observed = DB::table('users_watching_users')->select('user_id')->where(['watcher_id' => $this->id, 'user_id' => $user->id])->get();
        if(count($observed)){
            return true;
        }
        return false;
    }

    public function isThisUserObservedByUser(User $user): bool
    {
        $observed = DB::table('users_watching_users')->select('user_id')->where(['watcher_id' => $user->id, 'user_id' => $this->id])->get();
        if(count($observed)){
            return true;
        }
        return false;
    }

    public function watch(): bool
    {
        $isAlreadyObserving = DB::table('users_watching_users')->where([
            'watcher_id' => auth()->user()->id,
            'user_id' => $this->id,
        ])->exists();

        if (!$isAlreadyObserving){
            $insert = DB::table('users_watching_users')->insert([
                'watcher_id' => auth()->user()->id,
                'user_id' => $this->id,
            ]);
            if($insert){
                $this->noteActivity('watch', 'users');
                return true;
            }
        }

        return false;
    }

    public function unwatch(): bool
    {
        $delete = DB::table('users_watching_users')->where([
            'watcher_id' => auth()->user()->id,
            'user_id' => $this->id,
        ])->delete();
        if($delete){
            $this->noteActivity('unwatch', 'users');
            return true;
        }
        return false;
    }


}