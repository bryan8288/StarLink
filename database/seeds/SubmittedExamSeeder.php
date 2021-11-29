<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubmittedExamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('submitted_exams')->insert(array(
            array(
                'mentee_id' => '1',
                'exam_id'=> '1',
                'file' => 'submittedexam/submittedexam1.docx',
                'score' => 85,
                'is_finalized' => true,
                'created_at' => '2021-11-26 04:07:31'
            )
        ));
    }
}
