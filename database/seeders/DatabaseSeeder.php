<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Address;
use App\Models\Client;
use App\Models\Delivery;
use App\Models\DeliveryLine;
use App\Models\Route;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $amount = 20;
//
//        Client::factory($amount)->create();
//        Address::factory($amount)->create();
//        Route::factory($amount)->create();
//        Delivery::factory($amount)->create();
//        DeliveryLine::factory($amount)->create();

//        create with relationships

//        $clients = Client::factory($amount)->create();
//        $addresses = Address::factory($amount)->create();
//        $routes = Route::factory($amount)->create();
//        $deliveries = Delivery::factory($amount)->create();
//        $deliveryLines = DeliveryLine::factory($amount)->create();
//
//        foreach ($clients as $client) {
//            $client->addresses()->saveMany($addresses->random(5));
//        }
//
//        foreach ($addresses as $address) {
//            $address->deliveries()->saveMany($deliveries->random(5));
//        }
    }
}
