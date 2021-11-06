<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                'user_id' => '17',
                'name' => 'PT. Freeport Indonesia',
                'address' => 'jl.apel no 11 jakarta barat',
                'phone' => '0813143141',
                'profile_picture' => 'image/user2.jpg'
            )
        ));
    }
}
