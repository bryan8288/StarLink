<?php

use Illuminate\Database\Seeder;

class discussionmentorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('discussmentors')->insert(array(
            array(
                'mentor_id' => '1',
                'description' => 'Sample description for discussion room exclusively for mentor',
                'start_time' => '02:00:00',
                'end_time' => '04:00:00',
                'url' => 'https://www.google.com',
            )
        ));
    }
}
