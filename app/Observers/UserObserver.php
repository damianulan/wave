<?php

namespace App\Observers;

use App\Models\User;
use App\Models\Log;
use App\Models\Activity;

class UserObserver
{
    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    public $afterCommit = true;

    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {
        if(auth()->check()){

            $log = new Activity();
            $log->user_id = auth()->user()->id;
            $log->ip = request()->ip();
            $log->action = "create";
            $log->model = 'users';
            $log->target_id = $user->id;
            $log->save();
        }
    }

    /**
     * Handle the User "updated" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function updated(User $user)
    {        
        if(auth()->check()){
            if(!$user->isDirty('status') || !$user->isDirty('force_passwordchange')){
                $log = new Activity();
                $log->user_id = auth()->user()->id;
                $log->ip = request()->ip();
                $log->action = "edit";
                $log->model = 'users';
                $log->target_id = $user->id;
                $log->save();
            }
        }
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        if(auth()->check()){
            $log = new Activity();
            $log->user_id = auth()->user()->id;
            $log->ip = request()->ip();
            $log->action = "destroy";
            $log->model = 'users';
            $log->target_id = $user->id;
            $log->save();
        }    
    }

    /**
     * Handle the User "restored" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        if(auth()->check()){
            $log = new Activity();
            $log->user_id = auth()->user()->id;
            $log->ip = request()->ip();
            $log->action = "destroy";
            $log->model = 'users';
            $log->target_id = $user->id;
            $log->save();
        }   
    }

    /**
     * Handle the User "force deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
