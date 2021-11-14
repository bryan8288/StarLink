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
            ),
            array(
                'course_id' => '5',
                'mentee_id' => '3',
                'score' => 85
            ),
            array(
                'course_id' => '2',
                'mentee_id' => '2',
                'score' => 75
            ),
            array(
                'course_id' => '3',
                'mentee_id' => '3',
                'score' => 80
            ),
            array(
                'course_id' => '4',
                'mentee_id' => '4',
                'score' => 90
            ),
            array(
                'course_id' => '5',
                'mentee_id' => '5',
                'score' => 95
            ),
            array(
                'course_id' => '5',
                'mentee_id' => '6',
                'score' => 87
            ),
            array(
                'course_id' => '2',
                'mentee_id' => '7',
                'score' => 100
            )
        ));
    }
}
