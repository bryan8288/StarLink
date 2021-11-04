<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('scores')->insert(array(
            array(
                'course_id' => '1',
                'mentee_id' => '1',
                'score' => 95
            )
        ));
    }
}
