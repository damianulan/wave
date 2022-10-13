<?php

namespace App\Lib\Datatables\DataRows;

use App\Models\User;

class UserRow
{

    public static function collect(User $user):array
    {
        return [
            'basic' => 
            '<div>'.$user->firstname.'</div>'
        ];
    }
}