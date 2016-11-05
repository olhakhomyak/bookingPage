<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Entities\User::class, 10)->create();
            DB::table('users')->insert([
                'name'       => str_random(10),
                'email'      => str_random(10).'@mail.com',
                'password'   => bcrypt('password')
            ]);
    }
}
