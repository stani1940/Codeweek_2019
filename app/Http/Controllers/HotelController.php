<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;

class HotelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index() {
        $hotels = Hotel::all();
        return view('hotels')->with('hotels', $hotels);
    }
}
