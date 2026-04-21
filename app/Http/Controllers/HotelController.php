<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\View\View;

class HotelController extends Controller
{
    public function index(): View
    {
        $hotels = Hotel::all();
        return view('hotels')->with('hotels', $hotels);
    }
}
