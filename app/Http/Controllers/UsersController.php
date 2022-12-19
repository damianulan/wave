<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Note;
use App\Models\Location;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Lib\Datatables\DatatablesController;

class UsersController extends Controller
{
    /**
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('role:admin', ['only' => ['index', 'create', 'store']]);
        // $this->middleware('permission:read-users', ['only' => 'show']);
        // $this->middleware('permission:write-users', ['only' => ['edit', 'update']]);
        // $this->middleware('permission:delete-users', ['only' => 'destroy']);
        $this->middleware('permission:users/block', ['only' => ['block', 'unblock']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = __('menus.users');
        $tableView = (new DatatablesController)->get('users','default');
        return view('pages.users.index', [
            'title' => $title,
            'tableView' => $tableView
        ]);      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations = Location::all();

        $title = __('menus.add_user');
        return view('pages.users.create', [
            'title' => $title,
            'roles' => $this->roles(),
            'locations' => $locations,
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
        $excepts = ['role', 'birth'];
        $request->validate([
            'email' => 'required|email|unique:users|max:128',
            'nickname' => 'required|max:10',
            'firstname' => 'required',
            'lastname' => 'required',
            'gender' => 'required',
            'phone' => 'min:8|max:11|nullable',
            'pesel' => 'digits:11|nullable',
        ]);
        if ($request->input('location_id') == '-1'){
            $excepts[] = 'location_id';
        }
        $password = Hash::make('123456');
        $user = new User();
        $date = $this->birthdateFromInput($request->input('birth'));
        $avatar = $this->getAvatarDefault($request->input('gender'));
        $request->merge([
            'avatar' => $avatar,
            'password' => $password,
            'birthdate' => $date,
            'force_passwordchange' => 1,
        ]);
        $user = User::create($request->except($excepts));
        $user->roles()->attach($request->input('role'));
        return redirect()->route('users.index')->with('success', __('alerts.success.model_created', ['model' => $user->name()]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if($id != auth()->user()->id){
            $user = User::findOrFail($id);
            $role = $user->getRole();
            $title = $user->name();
            $logs = $user->getActivity(10);
            return view('pages.users.show', [
                'title' => $title,
                'user' => $user,
                'role' => $role,
                'logs' => $logs
            ]); 
        }
        else
            return redirect()->back();    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if($id != auth()->user()->id){
            $user = User::findOrFail($id);
            $roles = $this->roles();
            $locations = Location::all();

            $title = $user->name();
            return view('pages.users.edit', [
                'title' => $title,
                'user' => $user,
                'roles' => $roles,
                'locations' => $locations,
            ]); 
        }
        else
            return redirect()->back();

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
        $excepts = ['role', 'birth'];
        $request->validate([
            'email' => 'required|max:128',
            'nickname' => 'required|max:10',
            'firstname' => 'required',
            'lastname' => 'required',
            'gender' => 'required',
            'phone' => 'min:8|max:11|nullable',
            'pesel' => 'digits:11|nullable',
        ]);
        if ($request->input('location_id') == '-1'){
            $excepts[] = 'location_id';
        }
        $user = User::findOrFail($id);
        $date = $this->birthdateFromInput($request->input('birth'));
        $request->merge([
            'birthdate' => $date,
        ]);
        //dd($request);
        $user->update($request->except($excepts));
        $user->refreshRole($request->input('role'));
        return redirect()->back()->with('success', __('alerts.success.model_edited', ['model' => $user->name()]));

    }

    /**
     * Remove the specified resource from storage. [POST]
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', __('alerts.success.model_deleted', ['model' => $user->name()]));
    }

    /**
     * Remove the specified resource from storage. [GET]
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', __('alerts.success.model_deleted', ['model' => $user->name()]));
    }

    /**
     * Block the user from logging in
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function block($id)
    {
        $user = User::findOrFail($id);
        $user->block();
        return redirect()->back()->with('warning', __('alerts.success.model_blocked', ['model' => $user->name()]));;
    }

    /**
     * Unblock the user
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function unblock($id)
    {
        $user = User::findOrFail($id);
        $user->unblock();
        return redirect()->back()->with('success', __('alerts.success.model_unblocked', ['model' => $user->name()]));;
    }

    /**
     * Update the specified resource's permissions.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function permissionsUpdate(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $rules = $request->collect()->except('_token');
    }

    /**
     * Observe the user (Observable trait)
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function watch($id)
    {
        $user = User::findOrFail($id);
        if($user->watch()){
            return redirect()->back()->with('success', __('alerts.success.model_watched', ['model' => $user->name()]));;
        }
        return redirect()->back()->with('error', __('alerts.error.model_watched', ['model' => $user->name()]));;
    }

    /**
     * Reverse observing the user (Observable trait)
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function unwatch($id)
    {
        $user = User::findOrFail($id);
        if($user->unwatch()){
            return redirect()->back()->with('success', __('alerts.success.model_unwatched', ['model' => $user->name()]));;
        }
        return redirect()->back()->with('error', __('alerts.error.model_unwatched', ['model' => $user->name()]));;
    }

    /**
     * Add a note to the user (Notable trait)
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function note(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $written = $user->writeNote($request->input('text'));
        if($written)
        {
            return redirect()->back()->with('success', __('alerts.success.model_note', ['model' => $user->name()]));;
        }
        return redirect()->back()->with('error', __('alerts.error.model_note', ['model' => $user->name()]));;

    }

    public function noteDelete($id)
    {
        $note = Note::findOrFail($id);
        if($note->deleteAll('users')){
            return redirect()->back()->with('success', __('alerts.success.note_deleted'));

        }
        return redirect()->back()->with('error', __('alerts.error.note_deleted'));
    }
}
