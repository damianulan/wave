<?php

namespace App\Lib\Structures;

class ClientStructure
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
            'city' => [
                'key' => 'city',
                'title' => __('forms.city'),
                'default' => true,
                'type' => 'dictionary',
                'sortable' => 'city',
                'width' => '20%',
            ],
            'phone' => [
                'key' => 'phone',
                'title' => __('forms.phone'),
                'default' => true,
                'type' => 'dictionary',
                'sortable' => 'phone',
                'width' => '20%',
            ],
            'hasAccount' => [
                'key' => 'hasAccount',
                'title' => __('forms.hasaccount'),
                'default' => true,
                'type' => 'dictionary',
                'sortable' => false,
                'width' => '10%',
            ],
            'birthdate' => [
                'key' => 'birthdate',
                'title' => __('forms.birthdate'),
                'default' => false,
                'type' => 'dictionary',
                'sortable' => 'birthdate',
                'width' => '10%',
            ],
        ];
    }

}