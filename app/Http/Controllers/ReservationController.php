<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Entities\Reservation;

use App\Http\Requests;


class ReservationController extends Controller
{
    public function index()
    {
        $reserv = Reservation::all();
        return $reserv;
    }


    public function store(Request $request)
    {
        $reserv = new Reservation($request->all());
        $reserv->save();

        return $reserv;
    }
}
