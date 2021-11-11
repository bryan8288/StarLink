<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            ),
            array(
                'assignment_id' => '1',
                'mentee_id' => '2',
                'file' => 'submittedassignment/submittedassignment1.docx',
                'uploaded_date' => '2021-11-02',
                'score' => null
            ),
            array(
                'assignment_id' => '1',
                'mentee_id' => '3',
                'file' => 'submittedassignment/submittedassignment1.docx',
                'uploaded_date' => '2021-11-02',
                'score' => null
            ),
            array(
                'assignment_id' => '1',
                'mentee_id' => '4',
                'file' => 'submittedassignment/submittedassignment1.docx',
                'uploaded_date' => '2021-11-02',
                'score' => null
            ),
            array(
                'assignment_id' => '1',
                'mentee_id' => '5',
                'file' => 'submittedassignment/submittedassignment1.docx',
                'uploaded_date' => '2021-11-02',
                'score' => null
            ),
            array(
                'assignment_id' => '2',
                'mentee_id' => '1',
                'file' => 'submittedassignment/submittedassignment1.docx',
                'uploaded_date' => '2021-11-02',
                'score' => null
            ),
            array(
                'assignment_id' => '2',
                'mentee_id' => '2',
                'file' => 'submittedassignment/submittedassignment1.docx',
                'uploaded_date' => '2021-11-02',
                'score' => 79
            ),
            array(
                'assignment_id' => '2',
                'mentee_id' => '3',
                'file' => 'submittedassignment/submittedassignment1.docx',
                'uploaded_date' => '2021-11-02',
                'score' => null
            ),
            array(
                'assignment_id' => '3',
                'mentee_id' => '6',
                'file' => 'submittedassignment/submittedassignment1.docx',
                'uploaded_date' => '2021-11-02',
                'score' => null
            ),
            array(
                'assignment_id' => '3',
                'mentee_id' => '7',
                'file' => 'submittedassignment/submittedassignment1.docx',
                'uploaded_date' => '2021-11-02',
                'score' => null
            ),
            array(
                'assignment_id' => '3',
                'mentee_id' => '8',
                'file' => 'submittedassignment/submittedassignment1.docx',
                'uploaded_date' => '2021-11-02',
                'score' => 88
            ),
        ));
    }
}
