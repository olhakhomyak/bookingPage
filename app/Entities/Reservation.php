<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'reservation';

    protected $fillable = [
        'user_id',
        'room_id',
        'reserv_from',
        'reserv_to',
        'comment'
    ];


    public function userReserv() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function roomReserv() {
        return $this->hasOne(Room::class, 'id', 'room_id');
    }
}
