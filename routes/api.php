<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\itemApiController;
use App\Models\Item;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Index all items
Route::get('/items', [itemApiController::class, 'index']);

//Show specific item
Route::get('items/{id}', [itemApiController::class, 'show']);

//Create new item
Route::post('/store', [itemApiController::class, 'store']);

//Update item
Route::put('/items/{id}', [itemApiController::class, 'update']);
//Delete item
Route::delete('/items/{id}', [itemApiController::class, 'destroy']);