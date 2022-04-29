<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        //
        return view('home', ['clients' => Client::paginate(3)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        //
        $req->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'avatar' => 'required|image',
        ]);

        $client = new Client();

        $client->name = $req->name;
        $client->email = $req->email;
        $client->phone = $req->phone;
        $client->avatar_path = $req->file('avatar')->store('avatars');

        if ( ! $client->save() ) return view('home', ['save_failure' => true] );

        $client->refresh();
        
        return redirect('/' . $client->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
        return view('client-page', [ 'client' => $client ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
        return view('form', [ 'client' => $client]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, Client $client)
    {
        //
        $req->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'avatar' => 'image',
        ]);

        if( $req->name != $client->name ) $client->name = $req->name;
        if( $req->email != $client->email ) $client->email = $req->email;
        if( $req->phone != $client->phone ) $client->phone = $req->phone;
        if( $req->has('avatar') ) $client->avatar_path = $req->file('avatar')->store('avatars');

        if ( ! $client->save() ) return view('home', ['save_failure' => true] );

        $client->refresh();

        return redirect('/' . $client->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
        $client->delete();

        return redirect('/');
    }
}
