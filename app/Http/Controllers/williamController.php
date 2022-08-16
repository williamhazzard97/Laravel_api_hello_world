<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;

class williamController extends Controller
{
    //
    public function index() {
        return Item::all();
    }
}
