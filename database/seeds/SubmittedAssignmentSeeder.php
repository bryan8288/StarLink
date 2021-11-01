<?php

use Illuminate\Database\Seeder;

class SubmittedAssignmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('submitted_assignments')->insert(array(
            array(
                'assignment_id' => '1',
                'mentee_id' => '1',
                'file' => 'submittedassignment/submittedassignment1.docx',
                'uploaded_date' => '2021-11-02',
                'score' => 92
            )
        ));
    }
}
