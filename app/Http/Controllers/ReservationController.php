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
<<<<<<< HEAD
            
        return view('dashboard.reservations', compact('reservations'));
=======
        return view('dashboard.reservations',compact('reservations'));
>>>>>>> 165223cb5e51a443bd3c337172bcb5b421c94941
    }

    public function create($hotel_id): View
    {
<<<<<<< HEAD
        $hotelInfo = Hotel::with('rooms')->findOrFail($hotel_id);
        
        return view('dashboard.reservationCreate', compact('hotelInfo'));
=======
        $hotel_info = Hotel::with('rooms')->get()->find($hotel_id);
        return view('dashboard.reservationCreate', compact('hotel_info'));
>>>>>>> 165223cb5e51a443bd3c337172bcb5b421c94941
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

<<<<<<< HEAD
    public function edit(Reservation $reservation): View
=======
    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
>>>>>>> 165223cb5e51a443bd3c337172bcb5b421c94941
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

<<<<<<< HEAD
        return redirect('dashboard/reservations')->with('success', 'Successfully updated your reservation!');
    }

    public function destroy($id): RedirectResponse
    {
        Reservation::findOrFail($id)->delete();

        return redirect('dashboard/reservations')->with('success', 'Successfully deleted your reservation!');
=======
        $reservation->num_of_guests = $request->num_of_guests;
        $reservation->arrival = $request->arrival;
        $reservation->departure = $request->departure;
        $reservation->room_id = $request->room_id;
        $reservation->save();
        return redirect()->route('reservations.index')->with('success', 'Successfully updated your reservation!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->route('reservations.index')->with('success', 'Successfully deleted your reservation!');
>>>>>>> 165223cb5e51a443bd3c337172bcb5b421c94941
    }
}
