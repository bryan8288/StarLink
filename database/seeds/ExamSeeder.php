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
                'file' => 'file/exam1.docx'
            )
        ));
    }
}
