<?php

namespace App\Lib\Structures;

class UserStructure
{

    public static function get():array
    {
        return [
            'basic' => [
                'key' => 'basic',
                'title' => __('forms.basic'),
                'default' => true,
                'type' => 'dictionary',
                'sortable' => 'firstname',
                'width' => 'auto',
            ],
            'fullname' => [
                'key' => 'fullname',
                'title' => __('forms.fullname'),
                'default' => true,
                'type' => 'dictionary',
                'sortable' => 'firstname',
                'width' => '30%',
            ],
            'firstname' => [
                'key' => 'firstname',
                'title' => __('forms.firstname'),
                'default' => false,
                'type' => 'dictionary',
                'sortable' => 'firstname',
                'width' => '20%',
            ],
            'lastname' => [
                'key' => 'lastname',
                'title' => __('forms.lastname'),
                'default' => false,
                'type' => 'dictionary',
                'sortable' => 'lastname',
                'width' => '20%',
            ],
            'nickname' => [
                'key' => 'nickname',
                'title' => __('forms.nickname'),
                'default' => false,
                'type' => 'dictionary',
                'sortable' => 'nickname',
                'width' => '20%',
            ],
            'email' => [
                'key' => 'email',
                'title' => __('forms.email'),
                'default' => false,
                'type' => 'dictionary',
                'sortable' => 'email',
                'width' => '30%',
            ],
            'gender' => [
                'key' => 'gender',
                'title' => __('forms.gender'),
                'default' => false,
                'type' => 'dictionary',
                'sortable' => 'gender',
                'width' => '30%',
            ],
            'role' => [
                'key' => 'role',
                'title' => __('forms.role'),
                'default' => true,
                'type' => 'dictionary',
                'sortable' => false,
                'width' => '20%',
            ],
            'status' => [
                'key' => 'status',
                'title' => __('forms.status'),
                'default' => true,
                'type' => 'dictionary',
                'sortable' => false,
                'width' => '20%',
            ],
        ];
    }

}