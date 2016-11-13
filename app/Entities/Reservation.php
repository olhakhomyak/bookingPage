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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userReserv() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function roomReserv() {
        return $this->belongsTo(Room::class, 'room_id', 'id');
    }
}
