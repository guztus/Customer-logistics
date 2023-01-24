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
            ->join('routes', 'deliveries.route_id', '=', 'routes.id')
            ->select('clients.name','addresses.title','delivery_lines.item', 'delivery_lines.price', 'delivery_lines.QTY', 'routes.date')
            ->groupBy('clients.name','addresses.title','delivery_lines.item', 'delivery_lines.price', 'delivery_lines.QTY', 'routes.date')
            ->orderBy('routes.date', 'desc')
            ->paginate(20);

        return view('delivery-information.latest-deliveries', [
            'deliveries' => $deliveries,
        ]);
    }
}
