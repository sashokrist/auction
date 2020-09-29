<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveItemRequest;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $items = Item::orderByDesc('id')->get();
        return view('items.index', compact('items'));
    }

    public function show($id)
    {
        $item = Item::findOrFail($id);

        return view('items.show', compact('item'));
    }

    public function create()
    {
        return view('items.create');
    }

    public function store(Request $request, SaveItemRequest $saveItemRequest)
    {
        $item = new Item();
        $item->name = $request->name;
        $item->description = $request->description;
        $item->resaleprice = $request->rprice;
        $item->winbidder = $request->wbidder;
        $item->winprice = $request->wprice;
        $item->save();

        return redirect()->route('items.index')->with('success', 'Item was saved');

    }

    public function edit($id)
    {
        $item = Item::findOrFail($id);

        return view('items.edit', compact('item'));
    }

    public function update(Request $request, $id, SaveItemRequest $saveItemRequest)
    {
        $item = Item::findOrFail($id);
        $item->name = $request->name;
        $item->description = $request->description;
        $item->resaleprice = $request->rprice;
        $item->winbidder = $request->wbidder;
        $item->winprice = $request->wprice;
        $item->save();

        return redirect()->route('items.index')->with('success', 'Item was updated');
    }

    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        //dd($item);
        $item->delete();

        return redirect()->route('items.index')->with('success', 'Item was deleted');
    }
}
