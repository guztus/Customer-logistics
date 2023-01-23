<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LatestDeliveriesController extends Controller
{
    public function index()
    {
        $deliveries = DB::table('deliveries')
            ->join('routes', 'deliveries.route_id', '=', 'routes.id')
            ->join('delivery_lines', 'deliveries.id', '=', 'delivery_lines.delivery_id')
            ->join('addresses', 'deliveries.address_id', '=', 'addresses.id')
            ->join('clients', 'addresses.client_id', '=', 'clients.id')
            ->select('clients.name','addresses.title','delivery_lines.item',
                DB::raw('SUM(delivery_lines.price * delivery_lines.qty) as price_sum')
            )
            ->groupBy('clients.name','addresses.title','delivery_lines.item')
            ->paginate(50);

        return view('delivery-information.latest-deliveries', [
            'deliveries' => $deliveries,
        ]);
    }
}
