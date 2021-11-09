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
                'username' => 'test123',
                'password' => bcrypt('test123'),
                'email' => 'test123@gmail.com',
                'role' => 'mentee',
            ),
            array(
                'username' => 'halo123',
                'password' => bcrypt('halo123'),
                'email' => 'halo123@gmail.com',
                'role' => 'mentee',
            ),
            array(
                'username' => 'indah123',
                'password' => bcrypt('indah123'),
                'email' => 'indah123@gmail.com',
                'role' => 'mentee',
            ),
            array(
                'username' => 'udin123',
                'password' => bcrypt('udin123'),
                'email' => 'udin123@gmail.com',
                'role' => 'mentee',
            ),
            array(
                'username' => 'okin123',
                'password' => bcrypt('okin123'),
                'email' => 'okin123@gmail.com',
                'role' => 'mentee',
            ),
            array(
                'username' => 'william123',
                'password' => bcrypt('william123'),
                'email' => 'william123@gmail.com',
                'role' => 'mentee',
            ),
            array(
                'username' => 'bryan123',
                'password' => bcrypt('bryan123'),
                'email' => 'bryan123@gmail.com',
                'role' => 'mentee',
            ),
            array(
                'username' => 'rayyan123',
                'password' => bcrypt('rayyan123'),
                'email' => 'rayyan123@gmail.com',
                'role' => 'mentee',
            ),
            array(
                'username' => 'dela123',
                'password' => bcrypt('dela123'),
                'email' => 'dela123@gmail.com',
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
                'username' => 'dandi22',
                'password' => bcrypt('dandi22'),
                'email' => 'dandi22@gmail.com',
                'role' => 'mentor',
            ),
            array(
                'username' => 'haha2222',
                'password' => bcrypt('haha2222'),
                'email' => 'haha2222@gmail.com',
                'role' => 'mentor',
            ),
            array(
                'username' => 'sulaiman21',
                'password' => bcrypt('sulaiman21'),
                'email' => 'sulaiman21@gmail.com',
                'role' => 'mentor',
            ),
            array(
                'username' => 'desti23',
                'password' => bcrypt('desti23'),
                'email' => 'desti23@gmail.com',
                'role' => 'mentor',
            ),
            array(
                'username' => 'PT. Freeport Indonesia',
                'password' => bcrypt('ABC123'),
                'email' => 'freeport@gmail.com',
                'role' => 'company',
            ),
            array(
                'username' => 'Grab',
                'password' => bcrypt('grab123'),
                'email' => 'grab@gmail.com',
                'role' => 'company',
            ),
            array(
                'username' => 'Gojek',
                'password' => bcrypt('gojek123'),
                'email' => 'gojek@gmail.com',
                'role' => 'company',
            ),
            array(
                'username' => 'indomaret',
                'password' => bcrypt('indomaret123'),
                'email' => 'indomaret@gmail.com',
                'role' => 'company',
            ),
            array(
                'username' => 'alfamart',
                'password' => bcrypt('alfamart123'),
                'email' => 'alfamart@gmail.com',
                'role' => 'company',
            ),
            array(
                'username' => 'admin123',
                'password' => bcrypt('admin123'),
                'email' => 'admin123@gmail.com',
                'role' => 'admin',
            ),
            array(
                'username' => 'superadmin',
                'password' => bcrypt('superadmin'),
                'email' => 'superadmin@gmail.com',
                'role' => 'admin',
            )
        ));
    }
}
