<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        //neste caso o metodo index é restrito
        $this->middleware('can:level')->only('index');
    }

    public function meus_clientes(User $id)
    {

        $user = User::where('id', $id->id)->first();
        $clients = $user->client()->get();

        return view('cliente.meus_clientes', [
            'clients' => $clients
        ]);
    }

    public function index()
    {
        return view('cliente.index', [
            'clients' => Client::orderBy('name')->paginate(2)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $client = new Client();
        $client->user_id            = $request->user_id;
        $client->name               = $request->name;
        $client->email              = $request->email;
        $client->phone              = $request->phone;
        $client->empresa            = $request->empresa;
        $client->phone_commercial   = $request->phone_commercial;
        $client->save();

        return redirect()->route('cliente.create')->with('msg', 'Cliente criado com sucesso!'); //with serve para mostrar a msg no final

    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        return view('cliente.show', [
            'client' => $client
        ]);
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
       return view('cliente.edit', [
           'client' => $client
       ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        Client::findOrFail($client->id)->update($request->all());
        return redirect()->route('client.show', $client->id)->with('msg', 'Cliente atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        //
    }
}
