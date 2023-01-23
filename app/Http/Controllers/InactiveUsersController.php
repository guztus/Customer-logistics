<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InactiveUsersController extends Controller
{
    public function index()
    {
        $deliveries = DB::table('clients')
            ->join('addresses', 'clients.id', '=', 'addresses.client_id')
            ->join('deliveries', 'addresses.id', '=', 'deliveries.address_id')
            ->join('delivery_lines', 'deliveries.id', '=', 'delivery_lines.delivery_id')
            ->select('clients.name','addresses.title', 'deliveries.type')
            ->where('deliveries.type', '=', '1')
            ->where('deliveries.status', '!=', '2')
            ->paginate(50);

        return view('delivery-information.inactive-users', [
            'deliveries' => $deliveries
        ]);
    }
}
