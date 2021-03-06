<?php

use App\Http\Controllers\BidderController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\UserController;
use App\Models\Item;
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

Route::get('/', [MainController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('bidders', BidderController::class);
Route::get('all-bidders', [BidderController::class, 'allBidders'])->name('all-bidders');
Route::resource('items', ItemController::class);
Route::post('item-bet/{id}', [ItemController::class, 'itemBet'])->name('item-bet');
Route::post('item-search', [ItemController::class, 'search'])->name('item-search');


Route::get('stripe', [StripePaymentController::class, 'stripe'])->name('stripe');
Route::post('stripe', [StripePaymentController::class, 'stripePost'])->name('stripe.post');

Route::resource('roles', RoleController::class);
Route::resource('users', UserController::class);



//Route::get('biddersTest', [BidderController::class, 'test'])->name('test');
