<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class itemApiController extends Controller
{
    //Select all rows
    public function index() {
        return Item::all();
    }

    //Show specific record
    public function show($id) {
        return Item::find($id);
    }

    //Create a new item
    public function store() {
        request()->validate([
            'item_name' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'category' => 'required',
            'price' => 'required',
        ]);
    
        return Item::create([
            'item_name' => request('item_name'),
            'description' => request('description'),
            'quantity' => request('quantity'),
            'category' => request('category'),
            'price' => request('price'),
        ]);
    }

    //Update specific item
    public function update(Item $item) {
        $item->update();
    }

    //Delete specific item
    public function destroy(Item $item) {
        $success = $item->delete();

        return [
            'success' => $success,
        ];
    }
}
