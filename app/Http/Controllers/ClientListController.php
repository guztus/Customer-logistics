<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientListController extends Controller
{
    public function index()
    {
        return view('delivery-information.client-list', [
            'clients' => Client::all()->toQuery()->orderBy('name')->paginate(20),
        ]);
    }

    public function listAddress($id)
    {
        return Client::find($id)->addresses;
    }
}
