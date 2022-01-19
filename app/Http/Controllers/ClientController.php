<?php

namespace App\Http\Controllers;

use App\Models\Client;

use App\Models\Company;

use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $clients = Client::all();
        return view('client.index',['clients' => $clients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // Pagal Laravel dokumentaciją Clients duomenų bazės lentelę užpildyti 30 netikrų klientų.


        //uzduoties igyvendinimas
        // $select_values = array();

        // for($i=1;$i<=250; $i++) {
        //     $select_values[] = $i; 
        // }

        $select_values = Company::all();

        // 0: {id: 1 ; name: company1, type: 'MB', description: 'aprasymas' } 
        // 1: {id: 2 ; name: company1, type: 'MB', description: 'aprasymas' } 

        return view('client.create', ['select_values' => $select_values]); // client/create.blade.php
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreClientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client = new Client;
        //is kaires - duomenu bazes stulpelio pavadinimas | is desines - formos input laukelio vardas(name)
        $client->name = $request->client_name;
        $client->surname = $request->client_surname;
        $client->username = $request->client_username;
        $client->company_id = $request->client_companyid;
        $client->image_url = $request->client_imageurl;

        $client->save();

        return redirect()->route('client.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return view('client.show', ['client' => $client]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        $select_values = Company::all();
        return view('client.edit', ['client' => $client, 'select_values' => $select_values]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClientRequest  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $client->name = $request->client_name;
        $client->surname = $request->client_surname;
        $client->username = $request->client_username;
        $client->company_id = $request->client_companyid;
        $client->image_url = $request->client_imageurl;

        $client->save();

        return redirect()->route('client.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('client.index');

    }
}
