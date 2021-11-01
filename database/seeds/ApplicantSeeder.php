<?php

use Illuminate\Database\Seeder;

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
            )
        ));
    }
}
