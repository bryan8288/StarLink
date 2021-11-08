<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                'user_id' => '1',
                'name' => 'daryono tononami',
                'address' => 'jl.apel no 11 jakarta barat',
                'phone' => '0813143141',
                'birth_date' => '1995-05-01',
                'birth_place' => 'solo',
                'gender' => 'male',
                'profile_picture' => 'image/mentor1.jpg'
            ),
            array(
                'user_id' => '2',
                'name' => 'dandi22',
                'address' => 'jl.apel no 12 jakarta barat',
                'phone' => '0813143141',
                'birth_date' => '1995-05-01',
                'birth_place' => 'bandung',
                'gender' => 'male',
                'profile_picture' => 'image/mentor2.jpg'
            ),
            array(
                'user_id' => '3',
                'name' => 'haha2222',
                'address' => 'jl.apel no 111 jakarta barat',
                'phone' => '0813143141',
                'birth_date' => '1995-05-01',
                'birth_place' => 'solo',
                'gender' => 'male',
                'profile_picture' => 'image/mentor3.jpg'
            ),
            array(
                'user_id' => '4',
                'name' => 'sulaiman21',
                'address' => 'jl.apel no 121 jakarta barat',
                'phone' => '0813143141',
                'birth_date' => '1995-05-01',
                'birth_place' => 'solo',
                'gender' => 'male',
                'profile_picture' => 'image/mentor4.jpg'
            ),
            array(
                'user_id' => '5',
                'name' => 'desti23',
                'address' => 'jl.apel no 211 jakarta barat',
                'phone' => '0813143141',
                'birth_date' => '1995-05-01',
                'birth_place' => 'solo',
                'gender' => 'female',
                'profile_picture' => 'image/mentor5.jpg'
            )
        ));

    }
}
