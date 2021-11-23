<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('exams')->insert(array(
            array(
                'course_id' => '1',
                'name' => 'Examination For Java',
                'type' => 'Project',
                'file' => 'exam/exam1.docx'
            ),
            array(
                'course_id' => '2',
                'name' => 'Examination For Phyton',
                'type' => 'Essai',
                'file' => 'exam/exam2.xlsx'
            )
        ));
    }
}
