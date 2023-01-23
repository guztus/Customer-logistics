<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class DeliveryTypesController extends Controller
{
    public function index()
    {
        $deliveries = DB::table('deliveries')
            ->join('addresses', 'deliveries.address_id', '=', 'addresses.id')
            ->join('clients', 'addresses.client_id', '=', 'clients.id')
            ->select('clients.name','addresses.title')
            ->whereIn('deliveries.address_id', function($query){
                $query->select('address_id')->from('deliveries')
                    ->whereIn('type', ['1','2'])
                    ->groupBy('address_id')
                    ->havingRaw('count(distinct type) = 2');
            })
            ->paginate(50);

        return view('delivery-information.delivery-types', [
            'deliveries' => $deliveries->unique('title')
        ]);
    }
}
