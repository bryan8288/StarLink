<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiscussionMentorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('discussion_mentors')->insert(array(
            array(
                'mentor_id' => '1',
                'description' => 'Sample description for discussion room exclusively for mentor',
                'start_time' => '02:00:00',
                'end_time' => '04:00:00',
                'url' => 'https://www.google.com',
            ),
            array(
                'mentor_id' => '2',
                'description' => 'Sample description for discussion room exclusively for mentor',
                'start_time' => '02:00:00',
                'end_time' => '04:00:00',
                'url' => 'https://www.bing.com',
            ),
        ));
    }
}
