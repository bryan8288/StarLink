<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(array(
            array(
                'username' => 'anton123',
                'password' => bcrypt('jakarta123'),
                'email' => 'anton123@gmail.com',
                'role' => 'mentee',
            ),
            array(
                'username' => 'budi1122',
                'password' => bcrypt('solo222'),
                'email' => 'budi1122@gmail.com',
                'role' => 'admin',
            ),
            array(
                'username' => 'daryono998',
                'password' => bcrypt('daryono0099'),
                'email' => 'daryono998@gmail.com',
                'role' => 'mentor',
            ),
            array(
                'username' => 'ptABC',
                'password' => bcrypt('ABC123'),
                'email' => 'abc@gmail.com',
                'role' => 'company',
            )
        ));
    }
}
