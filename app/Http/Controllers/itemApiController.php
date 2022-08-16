<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
        // request()->validate([
        //     'item_name' => 'required',
        //     'description' => 'required',
        //     'quantity' => 'required',
        //     'category' => 'required',
        //     'price' => 'required',
        // ]);
    
        return Item::create([
            'item_name' => "New Item",
            'description' => "This is a new product",
            'quantity' => 10,
            'category' => "Household",
            'price' => 9.99,
        ]);
    }

    //Update specific item
    public function update($id) {
        $data = Item::find($id);
        $data->item_name = "Brush";
        $data->description = "Household Cleaning Equipment";
        $data->quantity = 5;
        $data->category = "Household";
        $data->price = 10.90;

        $data->update();

        return [
            'success' => $data,
        ];
    }

    //Delete specific item based on id
    public function destroy($id) {
        
        $data = Item::find($id);
        $data->delete($id);
      

        return [
            'success' => $data,
        ];
    }

    /**
     * Search for specific item name by passing in the {item_name} from the end of the Route::get('/search/{item_name}' uri
     * then return the items from the Item model where the entered name is like the items in the dataset
     */
    public function searchItemName($item_name) {
        
        return Item::where('item_name', 'ilike', '%' .$item_name. '%')->get();
    }
}
