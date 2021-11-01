<?php

use Illuminate\Database\Seeder;

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
                'file' => 'submittedexam/submittedexam1.docx',
                'is_finalized' => true
            )
        ));
    }
}
