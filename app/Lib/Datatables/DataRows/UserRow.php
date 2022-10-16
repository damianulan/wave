<?php

namespace App\Lib\Datatables\DataRows;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserRow
{

    public static function collect(User $user):array
    {
        return [
            'basic' => 
                '<div class="row align-items-center">
                    <div class="col-sm-2">
                        <img class="rounded-circle" width="40" height="40" src="'.$user->avatar.'">
                    </div>
                    <div class="col-sm-10 lh-13">
                        <div class="fw-bold">'.$user->firstname.' '.$user->lastname.'</div>
                        <div class="fs-7">'.$user->email.'</div>
                    </div>
                </div>',
            'fullname' => $user->firstname . ' ' . $user->lastname,
            'name' => $user->firstname,
        ];
    }
}