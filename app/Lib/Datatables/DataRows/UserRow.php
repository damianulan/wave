<?php

namespace App\Lib\Datatables\DataRows;
use App\Models\User;
use stdClass;

class UserRow
{

    public static function collect(User $user):array
    {
        $status = self::resolveStatus($user->status);
        //$tags = self::resolveTags($user->tags);

        return [
            'basic' => 
                '<div class="row align-items-center">
                    <div class="col-sm-2">
                        <img class="rounded-circle" width="40" height="40" src="'.$user->avatar.'">
                    </div>
                    <div class="col-sm-10 lh-13">
                        <div class="fw-bold">'.$user->name().'</div>
                        <div class="fs-7">'.$user->email.'</div>
                    </div>
                </div>',
            'fullname' => $user->name(),
            'firstname' => $user->firstname,
            'lastname' => $user->lastname,
            'nickname' => $user->nickname,
            'email' => $user->email,
            'gender' => $user->gender(),
            'address' => $user->address(),
            'location' => $user->locationName(),
            'phone' => $user->phone,
            'pesel' => $user->pesel,
            'birthdate' => $user->birthdate(),
            'role' => __('forms.'.$user->roles[0]->slug),
            'status' => '<span class="badge badge-status badge-'.$status->badge.'">'.$status->name.'</span>',
            'tags' => '<span class="badge badge-tag badge-dark">'.$user->name().'</span>',

        ];
    }

    private static function resolveStatus(string $status): stdClass
    {
        $status_ = new stdClass();
        if($status == '1'){
            $status_->name = __('forms.status_1');
            $status_->badge = 'primary';
        } else if ($status == '0'){
            $status_->name = __('forms.status_0');
            $status_->badge = 'dark';
        }
        return $status_;
    }

    private static function resolveTags($tags)
    {

    }
}