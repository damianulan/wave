<?php

namespace App\Lib\Datatables\Structures;

use App\Models\User;

class UserStructure
{

    public static function get():array
    {
        return [
            'basic' => [
                'title' => __('data.basic'),
                'default' => true,
                'sortable' => false,
                
            ]
        ];
    }
}