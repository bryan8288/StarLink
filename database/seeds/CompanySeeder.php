<?php

use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert(array(
            array(
                'user_id' => '3',
                'name' => 'PT. Freeport Indonesia',
                'address' => 'jl.apel no 11 jakarta barat',
                'phone' => '0813143141',
                'profile_picture' => 'image/user2.jpg'
            )
        ));
    }
}
