<?php

namespace App\Lib\Structures;

use App\Models\User;

class UserStructure
{

    public static function get():array
    {
        return [
            'basic' => [
                'key' => 'basic',
                'title' => __('data.basic'),
                'default' => true,
                'type' => 'dictionary',
                'sortable' => 'firstname',
                'width' => 'auto',
            ],
            'fullname' => [
                'key' => 'fullname',
                'title' => __('data.fullname'),
                'default' => true,
                'type' => 'dictionary',
                'sortable' => 'firstname',
                'width' => '30%',
            ],
        ];
    }

}