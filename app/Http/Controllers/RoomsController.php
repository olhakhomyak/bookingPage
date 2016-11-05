<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\Room;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RoomsController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return $rooms;
    }

    public function store(Request $request)
    {
        $room = new Room($request->all());
        $room->save();

        return $room;
    }
}
