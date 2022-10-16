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
            'actions' => [
                'key' => false,
                'title' => __('data.actions'),
                'default' => false,
                'type' => 'buttons',
                'sortable' => false,
                'width' => '20%',            
            ],
        ];
    }

}