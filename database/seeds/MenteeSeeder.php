<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                'profile_picture' => 'image/user1.jpg',
                'portofolio' => 'portofolio/user1.pdf',
                'cv' => 'cv/user1.pdf',
                'is_working' => true,
                'created_at' => '2021-06-26 04:07:31'
            ),
            array(
                'user_id' => '2',
                'name' => 'test123',
                'address' => 'jl.sudirma no 20 jakarta barat',
                'phone' => '086549242',
                'birth_date' => '2000-01-05',
                'birth_place' => 'solo',
                'gender' => 'male',
                'profile_picture' => null,
                'portofolio' => null,
                'cv' => null,
                'is_working' => false,
                'created_at' => '2020-06-26 04:07:31'
            ),
            array(
                'user_id' => '3',
                'name' => 'halo123',
                'address' => 'jl.sudirma no 30 jakarta timur',
                'phone' => '0813152012',
                'birth_date' => '2002-02-05',
                'birth_place' => 'pontianak',
                'gender' => 'female',
                'profile_picture' => null,
                'portofolio' => null,
                'cv' => null,
                'is_working' => true,
                'created_at' => '2021-06-26 04:07:31'
            ),
            array(
                'user_id' => '4',
                'name' => 'indah123',
                'address' => 'jl.sudirma no 20 jakarta barat',
                'phone' => '083112241111',
                'birth_date' => '2000-01-11',
                'birth_place' => 'bandung',
                'gender' => 'female',
                'profile_picture' => null,
                'portofolio' => null,
                'cv' => null,
                'is_working' => true,
                'created_at' => '2020-06-26 04:07:31'
            ),
            array(
                'user_id' => '5',
                'name' => 'udin123',
                'address' => 'jl.sudirman no 1 jakarta barat',
                'phone' => '081399911',
                'birth_date' => '2001-01-01',
                'birth_place' => 'bekasi',
                'gender' => 'male',
                'profile_picture' => null,
                'portofolio' => null,
                'cv' => null,
                'is_working' => true,
                'created_at' => '2021-06-26 04:07:31'
            ),
            array(
                'user_id' => '6',
                'name' => 'okin123',
                'address' => 'jl.sudirman no 22 jakarta utara',
                'phone' => '0891131',
                'birth_date' => '2000-01-05',
                'birth_place' => 'bandung',
                'gender' => 'male',
                'profile_picture' => null,
                'portofolio' => null,
                'cv' => null,
                'is_working' => true,
                'created_at' => '2021-06-26 04:07:31'
            ),
            array(
                'user_id' => '7',
                'name' => 'william123',
                'address' => 'jl.sudirman no 69 jakarta barat',
                'phone' => '0123128931',
                'birth_date' => '1999-02-01',
                'birth_place' => 'tangerang',
                'gender' => 'male',
                'profile_picture' => null,
                'portofolio' => null,
                'cv' => null,
                'is_working' => true,
                'created_at' => '2020-06-26 04:07:31'
            ),
            array(
                'user_id' => '8',
                'name' => 'bryan123',
                'address' => 'jl.sudirman no 143 jakarta barat',
                'phone' => '083139102',
                'birth_date' => '2000-02-02',
                'birth_place' => 'batam',
                'gender' => 'male',
                'profile_picture' => null,
                'portofolio' => null,
                'cv' => null,
                'is_working' => true,
                'created_at' => '2021-06-26 04:07:31'
            ),
            array(
                'user_id' => '9',
                'name' => 'rayyan123',
                'address' => 'jl.sudirman no 222 jakarta barat',
                'phone' => '0138131112',
                'birth_date' => '2000-01-21',
                'birth_place' => 'bandung',
                'gender' => 'male',
                'profile_picture' => null,
                'portofolio' => null,
                'cv' => null,
                'is_working' => true,
                'created_at' => '2021-06-26 04:07:31'
            ),
            array(
                'user_id' => '10',
                'name' => 'dela123',
                'address' => 'jl.sudirman no 150 jakarta barat',
                'phone' => '123112008',
                'birth_date' => '2000-09-01',
                'birth_place' => 'bandung',
                'gender' => 'female',
                'profile_picture' => null,
                'portofolio' => null,
                'cv' => null,
                'is_working' => true,
                'created_at' => '2020-06-26 04:07:31'
            )
        ));
    }
}
