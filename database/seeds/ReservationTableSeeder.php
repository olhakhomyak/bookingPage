<?php

use Illuminate\Database\Seeder;
use App\Entities\Reservation;

class ReservationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        foreach (range(1,20) as $index) {
            Reservation::create([
                'user_id'       => $faker->numberBetween(1,10),
                'room_id'       => $faker->numberBetween(1, 10),
                'reserv_from'   => $faker->numberBetween(0, 23),
                'reserv_to'     => $faker->numberBetween(0, 23),
                'comment'       => $faker->realText($maxNbChars = 100, $indexSize = 2),
            ]);
        }
    }
}
