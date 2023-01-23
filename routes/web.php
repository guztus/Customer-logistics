<?php

use App\Http\Controllers\ClientDeliveriesController;
use App\Http\Controllers\ClientListController;
use App\Http\Controllers\DeliveryTypesController;
use App\Http\Controllers\InactiveUsersController;
use App\Http\Controllers\LatestDeliveriesController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/client-list', [ClientListController::class, 'index'])->name('client-list');

Route::get('/client-deliveries/{id}', [ClientDeliveriesController::class, 'index'])->name('client-deliveries');

Route::get('/delivery-types', [DeliveryTypesController::class, 'index'])->name('delivery-types');

Route::get('/latest-deliveries', [LatestDeliveriesController::class, 'index'])->name('latest-deliveries');

Route::get('/inactive-clients', [InactiveUsersController::class, 'index'])->name('inactive-clients');

Route::get('/list-address/{id}', [ClientListController::class, 'listAddress'])->name('list-address');


require __DIR__.'/auth.php';
