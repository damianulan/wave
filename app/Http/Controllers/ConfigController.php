<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Config;

class ConfigController extends Controller
{
    public function __construct()
    {
        
    }

    public function index()
    {
        $title = __('menus.settings');
        $config = Config::all();
        $modules = Config::getModulesDB();
        return view('pages.settings.index', [
            'title' => $title,
            'config' => $config,
            'modules' => $modules,
        ]);  
    }

    /**
     * Store module information in storage
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function modulesSave(Request $request)
    {
        $modules = [
            'tasks' => $this->translateCheckboxValue($request->input('tasks')),
            'products' => $this->translateCheckboxValue($request->input('products')),
            'loyalties' => $this->translateCheckboxValue($request->input('loyalties')),
            'analytics' => $this->translateCheckboxValue($request->input('analytics')),
            'finances' => $this->translateCheckboxValue($request->input('finances')),
            'tags' => $this->translateCheckboxValue($request->input('tags')),
        ];

        foreach ($modules as $key => $value)
        {
            $msg['type'] = 'warning';
            $msg['text'] = __('alerts.no_changes');
            $config = Config::where(['slug' => $key])->get()[0];
            $config->value = $value;
            if($config->isDirty()){
                $config->update();
                $msg['type'] = 'success';
                $msg['text'] = __('alerts.settings_modules_success');
            }

            $request->session()->regenerate();

            return redirect()->back()->with($msg['type'], $msg['text']);
        }
    }
}
