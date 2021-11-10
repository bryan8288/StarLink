<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApplicantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('applicants')->insert(array(
            array(
                'mentee_id' => '1',
                'job_id' => '1',
                'status' => 'Accepted'
            ),
            array(
                'mentee_id' => '1',
                'job_id' => '6',
                'status' => 'In Progress'
            ),
            array(
                'mentee_id' => '2',
                'job_id' => '7',
                'status' => 'In Progress'
            ),
            array(
                'mentee_id' => '3',
                'job_id' => '8',
                'status' => 'In Progress'
            ),
            array(
                'mentee_id' => '4',
                'job_id' => '8',
                'status' => 'In Progress'
            ),
            array(
                'mentee_id' => '5',
                'job_id' => '8',
                'status' => 'In Progress'
            ),
            array(
                'mentee_id' => '6',
                'job_id' => '8',
                'status' => 'In Progress'
            ),
        ));
    }
}
