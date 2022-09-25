<?php

namespace App\Observers;

use App\Models\Client;
use App\Models\Log;

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
            $log = new Log();
            $log->user_id = auth()->user()->id;
            $log->ip = request()->ip();
            $log->action = "create";
            $log->data = [
                'table' => 'clients',
                'id' => $client->id
            ];
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

            $log = new Log();
            $log->user_id = auth()->user()->id;
            $log->ip = request()->ip();
            $log->action = "edit";
            $log->data = [
                'table' => 'clients',
                'id' => $client->id
            ];
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
            $log = new Log();
            $log->user_id = auth()->user()->id;
            $log->ip = request()->ip();
            $log->action = "destroy";
            $log->data = [
                'table' => 'clients',
                'id' => $client->id
            ];
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
