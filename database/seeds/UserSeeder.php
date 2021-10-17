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
                'role' => 'mentee',
            ),
            array(
                'username' => 'budi1122',
                'password' => bcrypt('solo222'),
                'role' => 'admin',
            ),
            array(
                'username' => 'daryono998',
                'password' => bcrypt('daryono0099'),
                'role' => 'mentor',
            ),
            array(
                'username' => 'ptABC',
                'password' => bcrypt('ABC123'),
                'role' => 'company',
            )
        ));
    }
}
