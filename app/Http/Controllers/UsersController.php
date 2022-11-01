<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
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
        ]);
        if ($request->input('location_id') == '-1'){
            $excepts[] = 'location_id';
        }
        $date = date("Y-m-d", strtotime($request->input('birth')));
        $password = Hash::make('123456');
        $user = new User();
        $avatar = $user->getAvatarDefault($request->input('gender'));
        $request->merge(['avatar' => $avatar, 'password' => $password, 'birthdate' => $date]);
        $user = User::create($request->except($excepts));
        $user->roles()->attach($request->input('role'));
        return redirect()->route('users.index')->with('success', __('alerts.model_created', ['model' => $user->name()]));
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
        $request->validate([
            'email' => 'required|max:128',
            'nickname' => 'required|max:10',
            'name' => 'required',
            'surname' => 'required',
            'gender' => 'required',
        ]);
        $dump = strtotime($request->input('birthdate'));
        $date = date("Y-m-d", $dump);
        $request->birthdate = $date;
        $user = User::findOrFail($id);
        $user->update($request->all());
        $user->refreshRole($request->input('rolePicker'));
        $user->permissions()->detach();
        $this->fetchPermissions($user, $request);

        return redirect()->back()->with('success', __('alerts.model_edited', ['model' => $user->name()]));

    }

    /**
     * Remove the specified resource from storage. [POST]
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd(true);
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', __('alerts.model_deleted', ['model' => $user->name()]));
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
        return redirect()->route('users.index')->with('success', __('alerts.model_deleted', ['model' => $user->name()]));
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
        return redirect()->back()->with('warning', __('alerts.model_blocked', ['model' => $user->name()]));;
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
        return redirect()->back()->with('success', __('alerts.model_unblocked', ['model' => $user->name()]));;
    }

}
