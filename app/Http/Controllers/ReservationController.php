<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\Reservation;
use App\Entities\Room;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ReservationController extends Controller
{

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function index()
    {
        $reserv = Reservation::all();
        return $reserv;
    }

    /**
     * @param Request $request
     * @return Reservation
     */
    public function store(Request $request)
    {
        $reservations = Reservation::where('room_id', $request->get('room_id'))
            ->where('reserv_from', '<', $request->get('reserv_from'))
            ->where('reserv_to', '>', $request->get('reserv_to'))
            ->orWhere('reserv_from', '>', $request->get('reserv_from'))
            ->where('reserv_from', '<', $request->get('reserv_to'))
            ->orWhere('reserv_to', '<', $request->get('reserv_to'))
            ->where('reserv_to', '>', $request->get('reserv_from'))->get();

        if (count($reservations)) {
            return response()->json([
                'error' =>  'Failed reservation date.'
            ]);
        }

        $reserv = new Reservation($request->all());
        $reserv->save();

        return $reserv;
    }

}
