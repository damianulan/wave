<?php

namespace App\Lib\Structures;

class ClientStructure
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