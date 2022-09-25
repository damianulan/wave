<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:read-clients', ['only' => ['index', 'show']]);
        $this->middleware('permission:write-clients', ['only' => ['edit', 'update']]);
        $this->middleware('permission:create-clients', ['only' => ['create', 'store']]);
        $this->middleware('permission:delete-clients', ['only' => 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = __('menus.clients');
        $clients = Client::all();
        return view('pages.clients.index', [
            'title' => $title,
            'clients' => $clients
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
            'title' => $title
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
            'name' => 'required',
            'surname' => 'required',
            'gender' => 'required',
        ]);
        $avatar = 'app-assets/images/portrait/small/avatar-female.png';
        if ($request->input('gender') != '0'){
            $avatar = 'app-assets/images/portrait/small/avatar-male.png';
        }

        $client = Client::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'gender' => $request->gender,
            'birthdate' => $request->birthdate,
            'phone' => $request->phone,
            'city' => $request->city,
            'avatar' => $avatar
        ]);
        $fullname = $client->name . ' ' . $client->surname;
        return redirect()->route('clients.index')->with('success', __('alerts.client_created', ['client' => $fullname]));
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
        $title = $client->name . ' ' . $client->surname;
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
        $title = $client->name . ' ' . $client->surname;
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

        $fullname = $client->name . ' ' . $client->surname;
        return redirect()->back()->with('success', __('alerts.client_edited', ['client' => $fullname]));
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
        $fullname = $client->name . ' ' . $client->surname;
        $client->delete();
        return redirect()->route('clients.index')->with('success', __('alerts.client_deleted', ['client' => $fullname]));;    
    }
}
