<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\Room;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RoomsController extends Controller
{

    protected $model;

    public function __construct(Room $room)
    {
        $this->model = $room;
    }

    public function getAllRooms()
    {
        return $this->model->with('roomReserv.userReserv')->get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function index()
    {
        $rooms = Room::all();
        return $rooms;
    }


    /**
     * @param Request $request
     * @return Room
     */
    public function store(Request $request)
    {
        $room = new Room($request->all());
        $room->save();

        return $room;
    }
}
