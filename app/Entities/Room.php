<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'rooms';

    protected $fillable = [
        'number',
        'room_type'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roomReserv(){
        return $this->hasMany(Reservation::class, 'room_id', 'id');
    }
}
