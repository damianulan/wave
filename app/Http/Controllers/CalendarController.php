<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        $title = __('menus.calendar');
        return view('pages.calendar.index', [
            'title' => $title,
        ]);  
    }

    public function calendar()
    {

    }

    public function visit()
    {
        
    }
}
