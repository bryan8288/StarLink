<?php

use Illuminate\Database\Seeder;

class discussionadminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('discussadmins')->insert(array(
            array(
                'admin_id' => '1',
                'description' => 'Sample description for discussion room exclusively for admin',
                'start_time' => '02:00:00',
                'end_time' => '04:00:00',
                'url' => 'https://www.youtube.com',
            )
        ));
    }
}
