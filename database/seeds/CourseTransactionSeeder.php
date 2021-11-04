<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('course_transactions')->insert(array(
            array(
                'course_id' => '1',
                'mentee_id' => '1',
                'status' => 'Completed',
                'mentor_feedback' => 'This student is a great learner',
                'graduated_date' => '2021-11-05'
            )
        ));
    }
}
