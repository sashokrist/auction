<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateItemRequest;
use App\Http\Requests\SaveItemRequest;
use App\Models\Item;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class ItemController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $date = Carbon::today();
        $items = Item::orderByDesc('id')->paginate(5);
        return view('welcome', compact('items', 'date'));
    }

    public function show($id)
    {
        $date = Carbon::today();
        $item = Item::findOrFail($id);

        return view('items.show', compact('item', 'date'));
    }

    public function create()
    {
        if (Auth::check()) {
            return view('items.create');
        }
        return redirect('login')->with('error', 'You must login first.');
    }

    public function store(Request $request, CreateItemRequest $createItemRequest)
    {

        $item = new Item();
        $item->name = $request->name;
        $item->description = $request->description;
        $item->resaleprice = $request->rprice;
        $item->winbidder = auth()->user()->id;
        $item->winprice = $request->wprice;
        if ($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.'. $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save(public_path('uploads/avatars/' . $filename));
            $item->image = $filename;
        }
        $item->available = $request->available;
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
        $item->available = $request->available;
        $item->save();
        return redirect()->route('items.index')->with('success', 'Item was updated');
    }

    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();
        return redirect()->route('items.index')->with('success', 'Item was deleted');
    }

    public function itemBet(Request $request, $id)
    {
        $item = Item::findOrFail($id);
        if ($request->bet < $item->resaleprice){
            return redirect()->back()->with('error', 'Your bet must be bigger than re sale price!');
        }
        $date = Carbon::today()->toDateString();
        $available = $item->available->toDateString();
        if ($date === $available){
            $item->winprice = $request->bet;
            $item->winbidder = auth()->user()->id;
            $item->active = 0;
            $item->save();
            return redirect()->route('items.index')->with('success', 'CONGRATULATIONS, YOU WON');
        } else{
            $item->winprice = $request->bet;
            $item->winbidder = auth()->user()->id;
            $item->save();
            $bet = $request->bet;
            return redirect()->back()->with('success', "You bet is: $bet");
        }
    }
}
