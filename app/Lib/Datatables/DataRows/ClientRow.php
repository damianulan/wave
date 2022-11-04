<?php

namespace App\Lib\Datatables\DataRows;
use App\Models\Client;
use stdClass;

class ClientRow
{

    public static function collect($id):array
    {   
        $client = Client::findOrFail($id);

        return [
            'basic' => 
                '<div class="row align-items-center">
                    <div class="col-sm-2">
                        <img class="rounded-circle" width="40" height="40" src="'.$client->avatar.'">
                    </div>
                    <div class="col-sm-10 lh-13">
                        <div class="fw-bold">'.$client->name().'</div>
                        <div class="fs-7">'.$client->email.'</div>
                    </div>
                </div>',
            'fullname' => $client->name(),
            'firstname' => $client->firstname,
            'lastname' => $client->lastname,
            'email' => $client->email,
            'gender' => $client->gender(),
            'city' => $client->city,
            'phone' => $client->phone,
            'birthdate' => $client->birthdate(),
            'hasAccount' => $client->hasAccount(),
        ];
    }

    private static function resolveStatus(string $status): stdClass
    {
        $status_ = new stdClass();
        if($status == '1'){
            $status_->name = __('forms.status_1');
            $status_->badge = 'primary';
        } else if ($status == '0'){
            $status_->name = __('forms.status_2');
            $status_->badge = 'dark';
        }
        return $status_;
    }
}