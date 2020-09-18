<?php

namespace App\Http\Controllers;

use App\Models\Bidder;
use Illuminate\Http\Request;

class BidderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $bidders = Bidder::all();
        return view('bidders.index', compact('bidders'));
    }

    public function show($id)
    {

    }

    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function edit($id)
    {

    }

    public function update(Request $request)
    {

    }

    public function delete($id)
    {

    }
}
