<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use App\Models\Client;
class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = __('modules.my_tasks');
        return view('pages.tasks.index', [
            'title' => $title,
            'clients' => Client::all(),
            'users' => User::allActive(),
        ]); 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function commissioned()
    {
        $title = __('modules.commissioned') . ' ' . __('modules.tasks');
        return view('pages.tasks.commissioned', [
            'title' => $title,
            'clients' => Client::all(),
            'users' => User::allActive(),
        ]); 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function completed()
    {
        $title = __('modules.completed') . ' ' . __('modules.tasks');
        return view('pages.tasks.completed', [
            'title' => $title,
            'clients' => Client::all(),
            'users' => User::allActive(),
        ]); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:128',
            'priority' => 'required|numeric|min:0|max:3',
        ]);

        $task = new Task();
        $task->title = $request->input('title');
        $task->message = $request->input('message');
        $task->priority = $request->input('priority');
        $task->target_id = $request->input('target');
        if($request->input('affiliated_client') != '-1'){
            $task->affiliated_client_id = $request->input('affiliated_client');
        }
        $task->author_id = auth()->user()->id;
        $task->deadline_at = $this->dateFromInput($request->input('deadline'));
        if($task->save()){
            return redirect()->back()->with('success', '');
        }

        return redirect()->back()->with('error', '');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Delete with GET request
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //
    }

    public function markTask($id, $mark){
        $task = Task::findOrFail($id);
        $success = false;
        $error = '';
        if ($task->target_id == auth()->user()->id)
        {
            if ($mark == 'done'){
                if ($task->completed_at == null){
                    $task->completed_at = now();
                    if($task->update()){
                        $success = true;
                    }
                }
            } elseif ($mark == 'undone') {
                if ($task->completed_at != null){
                    $task->completed_at = null;
                    if($task->update()){
                        $success = true;
                    }
                }
            } else {
                $error = __('alerts.error.tasks.marking_value');
            }
        } else {
            $error = __('alerts.error.tasks.marking_permissions');
        }

        if ($success == false && $error == ''){
            $error = __('alerts.error.tasks.marking_generic');
        }

        return response()->json([
            'success' => $success,
            'error' => $error,
        ]);
    }
}
