<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ReservationController extends Controller
{
    public function index(): View
    {
        $reservations = Reservation::with('room.hotel')
            ->orderBy('arrival', 'asc')
            ->get();
            
        return view('dashboard.reservations', compact('reservations'));
    }

    public function create($hotel_id): View
    {
        $hotelInfo = Hotel::with('rooms')->findOrFail($hotel_id);
        
        return view('dashboard.reservationCreate', compact('hotelInfo'));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->all();
        $data['user_id'] = 1; // Assuming hardcoded for now as per original
        
        Reservation::create($data);
        
        return redirect('dashboard/reservations')->with('success', 'Reservation created!');
    }

    public function show(Reservation $reservation): View
    {
        $reservation->load('room.hotel');
        $hotelInfo = Hotel::with('rooms')->findOrFail($reservation->room->hotel_id);
        
        return view('dashboard.reservationSingle', compact('reservation', 'hotelInfo'));
    }

    public function edit(Reservation $reservation): View
    {
        $reservation->load('room.hotel');
        $hotelInfo = Hotel::with('rooms')->findOrFail($reservation->room->hotel_id);
        
        return view('dashboard.reservationEdit', compact('reservation', 'hotelInfo'));
    }

    public function update(Request $request, Reservation $reservation): RedirectResponse
    {
        $reservation->update([
            'user_id' => 1,
            'num_of_guests' => $request->num_of_guests,
            'arrival' => $request->arrival,
            'departure' => $request->departure,
            'room_id' => $request->room_id,
        ]);

        return redirect('dashboard/reservations')->with('success', 'Successfully updated your reservation!');
    }

    public function destroy($id): RedirectResponse
    {
        Reservation::findOrFail($id)->delete();

        return redirect('dashboard/reservations')->with('success', 'Successfully deleted your reservation!');
    }
}
