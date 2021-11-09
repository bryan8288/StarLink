<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert(array(
            array(
                'user_id' => '11',
                'name' => 'budi doremi',
                'address' => 'jl.nenas no 31 jakarta barat',
                'phone' => '081221111123',
                'birth_date' => '1999-05-01',
                'birth_place' => 'semarang',
                'gender' => 'male',
                'profile_picture' => 'image/user3.jpg'
            ),
            array(
                'user_id' => '22',
                'name' => 'new admin',
                'address' => 'jl.nenas no 100 jakarta barat',
                'phone' => '131311131231',
                'birth_date' => '2001-05-01',
                'birth_place' => 'solo',
                'gender' => 'male',
                'profile_picture' => 'image/user4.jpg'
            ),
            array(
                'user_id' => '23',
                'name' => 'superadmin',
                'address' => 'jl.nenas no 31 jakarta barat',
                'phone' => '081221111123',
                'birth_date' => '1999-05-01',
                'birth_place' => 'semarang',
                'gender' => 'male',
                'profile_picture' => 'image/user5.jpg'
            )
        ));
    }
}
