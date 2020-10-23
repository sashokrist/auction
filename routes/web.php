<?php

use App\Http\Controllers\BidderController;
use App\Http\Controllers\ItemController;
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

Route::get('/', [ItemController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('bidders', BidderController::class);
Route::get('all-bidders', [BidderController::class, 'allBidders'])->name('all-bidders');
Route::resource('items', ItemController::class);
Route::post('item-bet/{id}', [ItemController::class, 'itemBet'])->name('item-bet');



//Route::get('biddersTest', [BidderController::class, 'test'])->name('test');
