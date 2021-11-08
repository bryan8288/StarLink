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
                'user_id' => '1',
                'name' => 'PT. Freeport Indonesia',
                'address' => 'Jl. Apel No. 11, Jakarta Barat',
                'phone' => '0813143141',
                'profile_picture' => 'image/freeport.jpg'
            ),
            array(
                'user_id' => '2',
                'name' => 'PT. Grab',
                'address' => 'Jl. Mawar No. 35, Jakarta Selatan',
                'phone' => '081287418',
                'profile_picture' => 'image/grab.png'
            ),array(
                'user_id' => '3',
                'name' => 'PT. Gojek Indonesia',
                'address' => 'Jl. Anggrek No. 9, Jakarta Utara',
                'phone' => '0816479239',
                'profile_picture' => 'image/gojek.png'
            ),array(
                'user_id' => '4',
                'name' => 'PT. Indomaret',
                'address' => 'Jl. Mutiara No. 3, Jakarta Timur',
                'phone' => '0821641987',
                'profile_picture' => 'image/indomaret.png'
            ),
            array(
                'user_id' => '5',
                'name' => 'PT. Alfa Indonesia',
                'address' => 'Jl. Kemanggisan No. 23, Jakarta Pusat',
                'phone' => '0829847949',
                'profile_picture' => 'image/alfamart.png'
            )
        ));
    }
}
