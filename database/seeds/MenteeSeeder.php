<?php

use Illuminate\Database\Seeder;

class MenteeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mentees')->insert(array(
            array(
                'user_id' => '1',
                'name' => 'anton suprianto',
                'address' => 'jl.sudirma no 76 jakarta barat',
                'phone' => '083112241',
                'birth_date' => '2000-01-01',
                'birth_place' => 'bandung',
                'gender' => 'male',
                'email' => 'anton123@gmail.com',
                'profile_picture' => 'image/user1.jpg',
                'portofolio' => 'portofolio/user1.pdf',
                'cv' => 'cv/user1.pdf',
            )
        ));
    }
}
