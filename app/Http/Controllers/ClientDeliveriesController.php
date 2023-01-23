<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Support\Facades\DB;

class ClientDeliveriesController extends Controller
{
    public function index()
    {
        $client = Client::find(request()->id);
        if (!$client) {
            return redirect()->back();
        }

        $deliveries = DB::table('deliveries')
            ->join('routes', 'deliveries.route_id', '=', 'routes.id')
            ->join('delivery_lines', 'deliveries.id', '=', 'delivery_lines.delivery_id')
            ->join('addresses', 'deliveries.address_id', '=', 'addresses.id')
            ->join('clients', 'addresses.client_id', '=', 'clients.id')
            ->select('addresses.title','routes.date','deliveries.id','deliveries.status',
                DB::raw('SUM(delivery_lines.price * delivery_lines.qty) as price_sum')
            )
            ->groupBy('addresses.title','routes.date','deliveries.id','deliveries.status')
            ->where('clients.id', request('id'))
            ->paginate(50);

        return view('delivery-information.client-deliveries', [
            'client' => $client,
            'deliveries' => $deliveries,
        ]);
    }
}
