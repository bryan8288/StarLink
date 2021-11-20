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
                'mentee_id' => '2',
                'status' => 'In Progress',
                'mentor_feedback' => null,
                'graduated_date' => null
            ),
            array(
                'course_id' => '1',
                'mentee_id' => '3',
                'status' => 'In Progress',
                'mentor_feedback' => null,
                'graduated_date' => null
            ),
            array(
                'course_id' => '1',
                'mentee_id' => '4',
                'status' => 'In Progress',
                'mentor_feedback' => null,
                'graduated_date' => null
            ),
            array(
                'course_id' => '1',
                'mentee_id' => '5',
                'status' => 'In Progress',
                'mentor_feedback' => null,
                'graduated_date' => null
            ),
            array(
                'course_id' => '1',
                'mentee_id' => '6',
                'status' => 'In Progress',
                'mentor_feedback' => null,
                'graduated_date' => null
            ),
            array(
                'course_id' => '1',
                'mentee_id' => '7',
                'status' => 'In Progress',
                'mentor_feedback' => null,
                'graduated_date' => null
            ),
            array(
                'course_id' => '2',
                'mentee_id' => '6',
                'status' => 'In Progress',
                'mentor_feedback' => null,
                'graduated_date' => null
            ),
            array(
                'course_id' => '2',
                'mentee_id' => '7',
                'status' => 'In Progress',
                'mentor_feedback' => null,
                'graduated_date' => null
            ),
            array(
                'course_id' => '2',
                'mentee_id' => '1',
                'status' => 'In Progress',
                'mentor_feedback' => null,
                'graduated_date' => null
            ),
            array(
                'course_id' => '2',
                'mentee_id' => '8',
                'status' => 'In Progress',
                'mentor_feedback' => null,
                'graduated_date' => null
            ),
            array(
                'course_id' => '3',
                'mentee_id' => '2',
                'status' => 'In Progress',
                'mentor_feedback' => null,
                'graduated_date' => null
            ),
            array(
                'course_id' => '3',
                'mentee_id' => '5',
                'status' => 'In Progress',
                'mentor_feedback' => null,
                'graduated_date' => null
            ),
            array(
                'course_id' => '3',
                'mentee_id' => '7',
                'status' => 'In Progress',
                'mentor_feedback' => null,
                'graduated_date' => null
            ),
            array(
                'course_id' => '4',
                'mentee_id' => '4',
                'status' => 'In Progress',
                'mentor_feedback' => null,
                'graduated_date' => null
            ),
            array(
                'course_id' => '4',
                'mentee_id' => '8',
                'status' => 'In Progress',
                'mentor_feedback' => null,
                'graduated_date' => null
            ),
            array(
                'course_id' => '4',
                'mentee_id' => '9',
                'status' => 'In Progress',
                'mentor_feedback' => null,
                'graduated_date' => null
            ),
            array(
                'course_id' => '4',
                'mentee_id' => '10',
                'status' => 'In Progress',
                'mentor_feedback' => null,
                'graduated_date' => null
            ),
            array(
                'course_id' => '4',
                'mentee_id' => '1',
                'status' => 'In Progress',
                'mentor_feedback' => null,
                'graduated_date' => null
            ),
            array(
                'course_id' => '5',
                'mentee_id' => '7',
                'status' => 'In Progress',
                'mentor_feedback' => null,
                'graduated_date' => null
            ),
            array(
                'course_id' => '5',
                'mentee_id' => '1',
                'status' => 'In Progress',
                'mentor_feedback' => null,
                'graduated_date' => null
            ),
            array(
                'course_id' => '5',
                'mentee_id' => '2',
                'status' => 'In Progress',
                'mentor_feedback' => null,
                'graduated_date' => null
            ),
            array(
                'course_id' => '5',
                'mentee_id' => '9',
                'status' => 'In Progress',
                'mentor_feedback' => null,
                'graduated_date' => null
            ),
            array(
                'course_id' => '5',
                'mentee_id' => '10',
                'status' => 'In Progress',
                'mentor_feedback' => null,
                'graduated_date' => null
            ),
            array(
                'course_id' => '5',
                'mentee_id' => '5',
                'status' => 'In Progress',
                'mentor_feedback' => null,
                'graduated_date' => null
            ),
            array(
                'course_id' => '5',
                'mentee_id' => '4',
                'status' => 'In Progress',
                'mentor_feedback' => null,
                'graduated_date' => null
            ),
            array(
                'course_id' => '5',
                'mentee_id' => '3',
                'status' => 'Completed',
                'mentor_feedback' => 'This student is a great learner',
                'graduated_date' => '2021-11-05'
            ),
            array(
                'course_id' => '1',
                'mentee_id' => '1',
                'status' => 'Completed',
                'mentor_feedback' => 'This student is a great learner',
                'graduated_date' => '2021-11-05'
            ),
            array(
                'course_id' => '2',
                'mentee_id' => '2',
                'status' => 'Completed',
                'mentor_feedback' => 'This student is a great learner',
                'graduated_date' => '2021-11-05'
            ),
            array(
                'course_id' => '3',
                'mentee_id' => '3',
                'status' => 'Completed',
                'mentor_feedback' => 'This student is a great learner',
                'graduated_date' => '2021-11-05'
            ),
            array(
                'course_id' => '4',
                'mentee_id' => '4',
                'status' => 'Completed',
                'mentor_feedback' => 'This student is a great learner',
                'graduated_date' => '2021-11-05'
            ),
            array(
                'course_id' => '5',
                'mentee_id' => '5',
                'status' => 'Completed',
                'mentor_feedback' => 'This student is a great learner',
                'graduated_date' => '2021-11-05'
            ),
            array(
                'course_id' => '5',
                'mentee_id' => '6',
                'status' => 'Completed',
                'mentor_feedback' => 'This student is a great learner',
                'graduated_date' => '2021-11-05'
            ),
            array(
                'course_id' => '2',
                'mentee_id' => '7',
                'status' => 'Completed',
                'mentor_feedback' => 'This student is a great learner',
                'graduated_date' => '2021-11-05'
            ),
        ));
    }
}
