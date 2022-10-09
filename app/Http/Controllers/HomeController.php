<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $title = __('menus.dashboard');
        // --> welcome message randomizer <--
        $random = rand(1,3);
        $welcome = 'messages.welcome' . $random;
        $icon = 'messages.icon_welcome' . $random;
        // --> /welcome message randomizer <--
        $logs = auth()->user()->getActivity(10);

        return view('home', [
            'title' => $title,
            'welcome' => $welcome,
            'icon' => $icon,
            'logs' => $logs
        ]);        
    }
}
