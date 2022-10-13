<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Log;
use App\Models\Role;
use App\Models\Permission;
use App\Models\Location;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Lib\Datatables\DataStructures\UserDataStructure;
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
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = __('menus.users');
        $users = User::where('id', 'not like', auth()->user()->id)->get();
        $config = new Permission();
        $config->name = "Configuration";
        $config->slug = 'app/config';
        $config->save();
        $admin = new Role();
        $admin->slug = 'root';
        $admin->permissions()->attach($config);

        dd($admin);
        return view('pages.users.index', [
            'title' => $title,
            'users' => $users,
        ]);      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all()->sortByDesc('created_at');
        $locations = Location::all();

        $title = __('menus.add_user');
        return view('pages.users.create', [
            'title' => $title,
            'roles' => $roles,
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
        $request->validate([
            'email' => 'required|email|unique:users|max:128',
            'password' => 'required|min:6',
            'nickname' => 'required|max:10',
            'name' => 'required',
            'surname' => 'required',
            'gender' => 'required',
        ]);
        $avatar = 'app-assets/images/portrait/small/avatar-female.png';
        if ($request->input('gender') != '0'){
            $avatar = 'app-assets/images/portrait/small/avatar-male.png';
        }
        $password = Hash::make($request->input('password'));
        $user = new User();
        $user = User::create([
            'nickname' => $request->input('nickname'),
            'name' => $request->input('name'),
            'lastname' => $request->input('lastname'),
            'email' => $request->input('email'),
            'password' => $password,
            'gender' => $request->input('gender'),
            'birthdate' => $request->input('birthdate'),
            'phone' => $request->input('phone'),
            'avatar' => $avatar,
            'address' => $request->input('address'),
            'zipcode' => $request->input('zipcode'),
            'city' => $request->input('city'),
            'state' => $request->input('state'),
            'country' => $request->input('country'),
            'pesel' => $request->input('pesel'),
            'locale' => $request->input('locale'),
            'location_id' => $request->input('location_id'),
            'status' => '1'
        ]);
        $this->fetchPermissions($user, $request);
        $user->roles()->attach($request->input('rolePicker'));
        $fullname = $user->name . ' ' . $user->surname;
        return redirect()->route('users.index')->with('success', __('alerts.user_edited', ['user' => $fullname]));
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
            $role = $user->roles()->get()->first()->slug;
            $locations = Location::all();
            $title = $user->name . ' ' . $user->surname;
            $logs = $user->getActivity(5);
            return view('pages.users.show', [
                'title' => $title,
                'user' => $user,
                'role' => $role,
                'locations' => $locations,
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
            $roles = Role::all()->sortByDesc('created_at');
            $locations = Location::all();

            $title = $user->name . ' ' . $user->surname;
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

        $fullname = $user->name . ' ' . $user->surname;
        return redirect()->back()->with('success', __('alerts.user_edited', ['user' => $fullname]));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $user = User::findOrFail($id);
        $fullname = $user->name . ' ' . $user->surname;
        $user->delete();
        return redirect()->route('users.index')->with('success', __('alerts.user_deleted', ['user' => $fullname]));;
    }

    protected function fetchPermissions(User $user, Request $request)
    {
        $permissions = Permission::all();
        foreach ($permissions as $permission){
            if($request->input($permission->slug) == "on"){
                $user->permissions()->attach($permission);
            }
        }
    }

}
