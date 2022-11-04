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
                'width' => '30%',
            ],
            'fullname' => [
                'key' => 'fullname',
                'title' => __('forms.fullname'),
                'default' => false,
                'type' => 'dictionary',
                'sortable' => 'firstname',
                'width' => '20%',
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
                'width' => '20%',
            ],
            'gender' => [
                'key' => 'gender',
                'title' => __('forms.gender'),
                'default' => false,
                'type' => 'dictionary',
                'sortable' => 'gender',
                'width' => '20%',
            ],
            'address' => [
                'key' => 'address',
                'title' => __('forms.address'),
                'default' => false,
                'type' => 'dictionary',
                'sortable' => 'address',
                'width' => '20%',
            ],
            'location' => [
                'key' => 'location',
                'title' => __('forms.location'),
                'default' => true,
                'type' => 'dictionary',
                'sortable' => false,
                'width' => '30%',
            ],
            'phone' => [
                'key' => 'phone',
                'title' => __('forms.phone'),
                'default' => true,
                'type' => 'dictionary',
                'sortable' => 'phone',
                'width' => '20%',
            ],
            'pesel' => [
                'key' => 'pesel',
                'title' => __('forms.pesel'),
                'default' => false,
                'type' => 'dictionary',
                'sortable' => 'pesel',
                'width' => '20%',
            ],
            'birthdate' => [
                'key' => 'birthdate',
                'title' => __('forms.birthdate'),
                'default' => false,
                'type' => 'dictionary',
                'sortable' => 'birthdate',
                'width' => '10%',
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