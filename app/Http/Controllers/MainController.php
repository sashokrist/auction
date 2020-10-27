<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $date = Carbon::today();
        $items = Item::orderByDesc('id')->paginate(5);
        return view('welcome', compact('items', 'date'));
    }
}
