<?php

namespace App\Lib\Datatables\DataRows;
use App\Models\User;

class UserRow
{

    public static function collect(User $user):array
    {
        $status = self::resolveStatus($user->status);

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
            'lastname' => $user->lastname,
            'nickname' => $user->nickname,
            'email' => $user->email,
            'role' => __('forms.'.$user->roles[0]->slug),
            'status' => $status,

        ];
    }

    private static function resolveStatus(string $status): string
    {
        if($status == '1'){
            $status = __('forms.active');
        } else if ($status == '0'){
            $status = __('forms.blocked');
        }
        return $status;
    }
}