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
        $amount = 200;

        for ($i=0; $i< $amount; $i++) {
            $this->presetClient4(); // random data
        }

        $this->presetClient1(); // 1x LIQUID and NOT delivered  &  1x SOLID and NOT delivered
        $this->presetClient2(); // 1x LIQUID DELIVERED
        $this->presetClient3(); // 1x SOLID DELIVERED
    }

    private function presetClient1() {
//        1x LIQUID and NOT delivered
//        1x SOLID and NOT delivered
        $orderTypeClient = new Client;
        $orderTypeClient->name = 'John Johnny';
        $orderTypeClient->phone = '123456789';
        $orderTypeClient->email = 'example@example.com';
        $orderTypeClient->save();

        $orderTypeAddress = new Address;
        $orderTypeAddress->title = 'Brivibas iela 999';
        $orderTypeAddress->client_id = $orderTypeClient->id;
        $orderTypeAddress->save();

        $orderTypeRoute = new Route;
        $orderTypeRoute->date = '2020-07-23';
        $orderTypeRoute->car_number = 'GG2333';
        $orderTypeRoute->status = 1;
        $orderTypeRoute->driver_name = 'Claire';
        $orderTypeRoute->save();

        $orderTypeDelivery = new Delivery;
        $orderTypeDelivery->route_id = $orderTypeRoute->id;
        $orderTypeDelivery->address_id = $orderTypeAddress->id;
        $orderTypeDelivery->type = 1; // liquid product
        $orderTypeDelivery->status = 1; // NOT delivered
        $orderTypeDelivery->save();

        $orderTypeDelivery2 = new Delivery;
        $orderTypeDelivery2->route_id = $orderTypeRoute->id;
        $orderTypeDelivery2->address_id = $orderTypeAddress->id;
        $orderTypeDelivery2->type = 2; // solid product
        $orderTypeDelivery2->status = 1;
        $orderTypeDelivery2->save();

        $orderTypeDeliveryLines = new DeliveryLine;
        $orderTypeDeliveryLines->delivery_id = $orderTypeDelivery->id;
        $orderTypeDeliveryLines->item = 'preces';
        $orderTypeDeliveryLines->price = 45.24;
        $orderTypeDeliveryLines->qty = 4;
        $orderTypeDeliveryLines->save();

        $orderTypeDeliveryLines2 = new DeliveryLine;
        $orderTypeDeliveryLines2->delivery_id = $orderTypeDelivery2->id;
        $orderTypeDeliveryLines2->item = 'preces';
        $orderTypeDeliveryLines2->price = 40.24;
        $orderTypeDeliveryLines2->qty = 52;
        $orderTypeDeliveryLines2->save();
    }

    private function presetClient2() {
//        1x LIQUID DELIVERED
        $orderTypeClient = new Client;
        $orderTypeClient->name = 'Caroline Peters';
        $orderTypeClient->phone = '123456789';
        $orderTypeClient->email = 'example@example.com';
        $orderTypeClient->save();

        $orderTypeAddress = new Address;
        $orderTypeAddress->title = 'Vejupites iela 12';
        $orderTypeAddress->client_id = $orderTypeClient->id;
        $orderTypeAddress->save();

        $orderTypeRoute = new Route;
        $orderTypeRoute->date = '2020-05-20';
        $orderTypeRoute->car_number = 'TT2333';
        $orderTypeRoute->status = 1;
        $orderTypeRoute->driver_name = 'Dave';
        $orderTypeRoute->save();

        $orderTypeDelivery = new Delivery;
        $orderTypeDelivery->route_id = $orderTypeRoute->id;
        $orderTypeDelivery->address_id = $orderTypeAddress->id;
        $orderTypeDelivery->type = 1; // liquid product
        $orderTypeDelivery->status = 2; // delivered
        $orderTypeDelivery->save();

        $orderTypeDeliveryLines = new DeliveryLine;
        $orderTypeDeliveryLines->delivery_id = $orderTypeDelivery->id;
        $orderTypeDeliveryLines->item = 'preces';
        $orderTypeDeliveryLines->price = 14.60;
        $orderTypeDeliveryLines->qty = 3;
        $orderTypeDeliveryLines->save();
    }

    private function presetClient3() {
//        1x LIQUID DELIVERED
        $orderTypeClient = new Client;
        $orderTypeClient->name = 'Sam Luke';
        $orderTypeClient->phone = '123456789';
        $orderTypeClient->email = 'example@example.com';
        $orderTypeClient->save();

        $orderTypeAddress = new Address;
        $orderTypeAddress->title = 'Strautu iela 25';
        $orderTypeAddress->client_id = $orderTypeClient->id;
        $orderTypeAddress->save();

        $orderTypeRoute = new Route;
        $orderTypeRoute->date = '2020-02-26';
        $orderTypeRoute->car_number = 'UU2333';
        $orderTypeRoute->status = 1;
        $orderTypeRoute->driver_name = 'Earl';
        $orderTypeRoute->save();

        $orderTypeDelivery = new Delivery;
        $orderTypeDelivery->route_id = $orderTypeRoute->id;
        $orderTypeDelivery->address_id = $orderTypeAddress->id;
        $orderTypeDelivery->type = 1;
        $orderTypeDelivery->status = 2;
        $orderTypeDelivery->save();

        $orderTypeDeliveryLines = new DeliveryLine;
        $orderTypeDeliveryLines->delivery_id = $orderTypeDelivery->id;
        $orderTypeDeliveryLines->item = 'preces';
        $orderTypeDeliveryLines->price = 14.60;
        $orderTypeDeliveryLines->qty = 3;
        $orderTypeDeliveryLines->save();

        $orderTypeDelivery2 = new Delivery;
        $orderTypeDelivery2->route_id = $orderTypeRoute->id;
        $orderTypeDelivery2->address_id = $orderTypeAddress->id;
        $orderTypeDelivery2->type = 2; // solid product
        $orderTypeDelivery2->status = 2; // delivered
        $orderTypeDelivery2->save();

        $orderTypeDeliveryLines2 = new DeliveryLine;
        $orderTypeDeliveryLines2->delivery_id = $orderTypeDelivery2->id;
        $orderTypeDeliveryLines2->item = 'preces';
        $orderTypeDeliveryLines2->price = 25.60;
        $orderTypeDeliveryLines2->qty = 63;
        $orderTypeDeliveryLines2->save();
    }

    private function presetClient4() {
//        RANDOM DATA
        $orderTypeClient = new Client;
        $orderTypeClient->name = fake()->name;
        $orderTypeClient->phone = '123456789';
        $orderTypeClient->email = 'example@example.com';
        $orderTypeClient->save();

        $orderTypeAddress = new Address;
        $orderTypeAddress->title = fake()->streetAddress();
        $orderTypeAddress->client_id = $orderTypeClient->id;
        $orderTypeAddress->save();

        $orderTypeRoute = new Route;
        $orderTypeRoute->date = '2020-07-23';
        $orderTypeRoute->car_number = 'GG2333';
        $orderTypeRoute->status = fake()->numberBetween(1, 3);
        $orderTypeRoute->driver_name = 'Claire';
        $orderTypeRoute->save();

        $orderTypeDelivery = new Delivery;
        $orderTypeDelivery->route_id = $orderTypeRoute->id;
        $orderTypeDelivery->address_id = $orderTypeAddress->id;
        $orderTypeDelivery->type = fake()->numberBetween(1, 2);
        $orderTypeDelivery->status = fake()->numberBetween(1, 3);
        $orderTypeDelivery->save();

        $orderTypeDelivery2 = new Delivery;
        $orderTypeDelivery2->route_id = $orderTypeRoute->id;
        $orderTypeDelivery2->address_id = $orderTypeAddress->id;
        $orderTypeDelivery2->type = fake()->numberBetween(1, 2);
        $orderTypeDelivery2->status = fake()->numberBetween(1, 3);
        $orderTypeDelivery2->save();

        $orderTypeDeliveryLines = new DeliveryLine;
        $orderTypeDeliveryLines->delivery_id = $orderTypeDelivery->id;
        $orderTypeDeliveryLines->item = 'preces';
        $orderTypeDeliveryLines->price = fake()->numberBetween(10.52, 1052.50);
        $orderTypeDeliveryLines->qty = fake()->numberBetween(10, 105);
        $orderTypeDeliveryLines->save();

        $orderTypeDeliveryLines2 = new DeliveryLine;
        $orderTypeDeliveryLines2->delivery_id = $orderTypeDelivery2->id;
        $orderTypeDeliveryLines2->item = 'preces';
        $orderTypeDeliveryLines2->price = fake()->numberBetween(10.52, 1052.50);
        $orderTypeDeliveryLines2->qty = fake()->numberBetween(10, 105);
        $orderTypeDeliveryLines2->save();

        $orderTypeDelivery3 = new Delivery;
        $orderTypeDelivery3->route_id = $orderTypeRoute->id;
        $orderTypeDelivery3->address_id = $orderTypeAddress->id;
        $orderTypeDelivery3->type = fake()->numberBetween(1, 2);
        $orderTypeDelivery3->status = fake()->numberBetween(1, 3);
        $orderTypeDelivery3->save();

        $orderTypeDeliveryLines2 = new DeliveryLine;
        $orderTypeDeliveryLines2->delivery_id = $orderTypeDelivery3->id;
        $orderTypeDeliveryLines2->item = 'preces';
        $orderTypeDeliveryLines2->price = fake()->numberBetween(10.52, 1052.50);
        $orderTypeDeliveryLines2->qty = fake()->numberBetween(10, 105);
        $orderTypeDeliveryLines2->save();
    }
}
