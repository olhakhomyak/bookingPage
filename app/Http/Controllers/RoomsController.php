<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\Room;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RoomsController extends Controller
{
    /**
     * @var Room
     */
    protected $model;


    /**
     * RoomsController constructor.
     * @param Room $room
     */
    public function __construct(Room $room)
    {
        $this->model = $room;
    }


    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAllRooms()
    {
        return $this->model->with('roomReserv.userReserv')->get();
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
