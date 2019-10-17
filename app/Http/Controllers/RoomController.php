<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\Reservation;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return view('room')->with('rooms', $rooms);
    }

    /**
     *
     * @return \Illuminate\Http\Response
     * @param  int $id
     */

    public function show(Reservation $reservation)
    {
        $reservation = Reservation::with('room', 'room.hotel')->get()->find($reservation->id);
        $hotel_id = $reservation->room->hotel_id;
        $hotelInfo = Hotel::with('rooms')->get()->find($hotel_id);
        return view('roomSingle', compact($hotelInfo));

    }
}
