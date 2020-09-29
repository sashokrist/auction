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
        $bidders = Bidder::orderByDesc('id')->get();
        return view('bidders.index', compact('bidders'));
    }

    public function show($id)
    {

    }

    public function create()
    {
        return view('bidders.create');
    }

    public function store(Request $request)
    {
        $bidder = new Bidder();
        $bidder->lastname = $request->lastname;
        $bidder->firstname = $request->firstname;
        $bidder->address = $request->address;
        $bidder->phone = $request->phone;
        $bidder->save();

        return redirect()->route('bidders.index')->with('success', 'Bidder was created');
    }

    public function edit($id)
    {
        $bidder = Bidder::findOrFail($id);

        return view('bidders.edit', compact('bidder'));
    }

    public function update(Request $request, $id)
    {
        $bidder = Bidder::findOrFail($id);
        $bidder->lastname = $request->lastname;
        $bidder->firstname = $request->firstname;
        $bidder->address = $request->address;
        $bidder->phone = $request->phone;
        $bidder->save();

        return redirect()->route('bidders.index')->with('success', 'Bidder was updated');

    }

    public function destroy($id)
    {
        $bidder = Bidder::findOrFail($id);
        $bidder->delete();

        return redirect()->route('bidders.index')->with('success', 'Bidder was deleted');
    }
}
