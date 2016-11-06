<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\Reservation;

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
        $reserv = new Reservation($request->all());
        $reserv->save();

        return $reserv;
    }

}
