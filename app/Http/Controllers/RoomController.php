<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Hotel;
use Illuminate\View\View;

class RoomController extends Controller
{
    public function index(): View
    {
        $rooms = Room::all();
        return view('room')->with('rooms', $rooms);
    }

    public function show($id): View
    {
        $room = Room::with('hotel')->findOrFail($id);
        $hotelInfo = $room->hotel;
        
        return view('roomSingle', compact('room', 'hotelInfo'));
    }
}
