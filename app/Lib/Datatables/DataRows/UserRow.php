<?php

namespace App\Lib\Datatables\DataRows;
use App\Models\User;
use stdClass;

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
            'status' => '<span class="badge badge-status badge-'.$status->badge.'">'.$status->name.'</span>',

        ];
    }

    private static function resolveStatus(string $status): stdClass
    {
        $status_ = new stdClass();
        if($status == '1'){
            $status_->name = __('forms.active');
            $status_->badge = 'primary';
        } else if ($status == '0'){
            $status_->name = __('forms.blocked');
            $status_->badge = 'warning';
        }
        return $status_;
    }
}