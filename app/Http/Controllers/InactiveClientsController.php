<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class InactiveClientsController extends Controller
{
    public function index()
    {
        $clients = DB::table('clients')
            ->join('addresses', 'clients.id', '=', 'addresses.client_id')
            ->join('deliveries', 'addresses.id', '=', 'deliveries.address_id')
            ->select('clients.id', 'clients.name','addresses.title', 'deliveries.type AS deliveryType', 'deliveries.status AS deliveryStatus')
            ->get();

        $result = [];
        $blacklist = [];

        foreach ($clients as $client) {
            if ($client->deliveryType == 1 && $client->deliveryStatus == 2) {
                $blacklist [] = $client->id;
            }
        }

        foreach ($clients as $client) {
            if (!in_array($client->id, $blacklist) && !array_key_exists($client->id, $result)) {
                $result [$client->id] = $client;
            }
        }


//                $deliveries = DB::table('clients')
//            ->join('addresses', 'clients.id', '=', 'addresses.client_id')
//            ->join('deliveries', 'addresses.id', '=', 'deliveries.address_id')
//            ->select('clients.name','addresses.title')
//            ->where('deliveries.type', '=', '1')
//            ->where('deliveries.status', '!=', '2')
//
////            ->orWhere('deliveries.type', '!=', '1')
//
////            ->where('deliveries.status', '=', '1')
//
//            ->groupBy('clients.name', 'addresses.title')
//            ->paginate(20);

        return view('delivery-information.inactive-clients', [
            'deliveries' => $this->paginate($result)
        ]);
    }

    public function paginate($items, $perPage = 20, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
