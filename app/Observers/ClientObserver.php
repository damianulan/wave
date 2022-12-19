<?php

namespace App\Observers;

use App\Models\Client;
use App\Models\Activity;

class ClientObserver
{

    /**
     * Handle the Client "created" event.
     *
     * @param  \App\Models\Client  $client
     * @return void
     */
    public function created(Client $client)
    {
        if(auth()->check()){
            $log = new Activity();
            $log->user_id = auth()->user()->id;
            $log->ip = request()->ip();
            $log->action = "create";
            $log->model = 'clients';
            $log->target_id = $client->id;
            $log->save();
        }

    }

    /**
     * Handle the Client "updated" event.
     *
     * @param  \App\Models\Client  $client
     * @return void
     */
    public function updated(Client $client)
    {
        if(auth()->check()){

            $log = new Activity();
            $log->user_id = auth()->user()->id;
            $log->ip = request()->ip();
            $log->action = "edit";
            $log->model = 'clients';
            $log->target_id = $client->id;
            $log->save();
        }
    }

    /**
     * Handle the Client "deleted" event.
     *
     * @param  \App\Models\Client  $client
     * @return void
     */
    public function deleted(Client $client)
    {
        if(auth()->check()){
            $log = new Activity();
            $log->user_id = auth()->user()->id;
            $log->ip = request()->ip();
            $log->action = "delete";
            $log->model = 'clients';
            $log->target_id = $client->id;
            $log->save();
        }
    }

    /**
     * Handle the Client "restored" event.
     *
     * @param  \App\Models\Client  $client
     * @return void
     */
    public function restored(Client $client)
    {
        //
    }

    /**
     * Handle the Client "force deleted" event.
     *
     * @param  \App\Models\Client  $client
     * @return void
     */
    public function forceDeleted(Client $client)
    {
        //
    }
}
