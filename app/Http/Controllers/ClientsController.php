<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Lib\Datatables\DatatablesController;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class ClientsController extends Controller
{
    public function __construct()
    {
        // $this->middleware('permission:read-clients', ['only' => ['index', 'show']]);
        // $this->middleware('permission:write-clients', ['only' => ['edit', 'update']]);
        // $this->middleware('permission:create-clients', ['only' => ['create', 'store']]);
        $this->middleware('ismoduleenabled:clients');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = __('menus.clients');
        $tableView = (new DatatablesController)->get('clients','default');
        return view('pages.clients.index', [
            'title' => $title,
            'tableView' => $tableView,
        ]);      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = __('menus.add_client');
        return view('pages.clients.create', [
            'title' => $title,
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
            'firstname' => 'required',
            'lastname' => 'required',
            'gender' => 'required',
        ]);
        $avatar = $this->getAvatarDefault($request->input('gender'));

        $request->merge(['avatar' => $avatar]);
        $client = Client::create($request->all());
        return redirect()->route('clients.index')->with('success', __('alerts.client_created', ['client' => $client->name()]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::findOrFail($id);
        $title = $client->name();
        return view('pages.clients.show', [
            'title' => $title,
            'client' => $client,
        ]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::findOrFail($id);
        $title = $client->name();
        return view('pages.clients.edit', [
            'title' => $title,
            'client' => $client,
        ]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email|max:128',
            'name' => 'required',
            'surname' => 'required',
            'gender' => 'required',
        ]);
        $dump = strtotime($request->input('birthdate'));
        $date = date("Y-m-d", $dump);
        $request->birthdate = $date;
        $client = Client::findOrFail($id);
        $client->update($request->all());
        return redirect()->back()->with('success', __('alerts.client_edited', ['client' => $client->name()]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();
        return redirect()->route('clients.index')->with('success', __('alerts.client_deleted', ['client' => $client->name()]));;    
    }

    /**
     * Remove the specified resource from storage. [GET]
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $user = Client::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', __('alerts.success.model_deleted', ['model' => $user->name()]));
    }
}
