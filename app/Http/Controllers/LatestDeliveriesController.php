<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LatestDeliveriesController extends Controller
{
    public function index()
    {
        $deliveries = DB::table('deliveries')
            ->join('addresses', 'deliveries.address_id', '=', 'addresses.id')
            ->join('clients', 'addresses.client_id', '=', 'clients.id')
            ->join('delivery_lines', 'deliveries.id', '=', 'delivery_lines.delivery_id')
            ->select('clients.name','addresses.title','delivery_lines.item', 'delivery_lines.price', 'delivery_lines.QTY')
            ->groupBy('clients.name','addresses.title','delivery_lines.item', 'delivery_lines.price', 'delivery_lines.QTY')
            ->paginate(20);

        return view('delivery-information.latest-deliveries', [
            'deliveries' => $deliveries,
        ]);
    }
}
