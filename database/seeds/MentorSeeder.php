<?php

use Illuminate\Database\Seeder;

class MentorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mentors')->insert(array(
            array(
                'user_id' => '3',
                'name' => 'daryono tononami',
                'address' => 'jl.apel no 11 jakarta barat',
                'phone' => '0813143141',
                'birth_date' => '1995-05-01',
                'birth_place' => 'solo',
                'gender' => 'male',
                'email' => 'daryono123@gmail.com',
                'profile_picture' => 'image/user2.jpg'
            )
        ));
    }
}
