<?php

use Illuminate\Database\Seeder;
use App\Entities\Room;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        foreach (range(1, 10) as $index) {
            Room::create([
                'number'    => $faker->numberBetween(10, 100),
                'room_type' => $faker->randomElement($array = ['single', 'double', 'studio', 'tringle', 'apartment']),
            ]);
        }
    }
}
