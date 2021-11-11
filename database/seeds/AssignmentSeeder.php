<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssignmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('assignments')->insert(array(
            array(
                'module_id' => '1',
                'title' => 'Assignment One',
                'description' => 'Excercise One',
                'start_date' => '2021-11-01',
                'end_date' => '2021-12-31',
                'assignment_file' => 'file/assignment1.docx'
            ),
            array(
                'module_id' => '2',
                'title' => 'Assignment Two',
                'description' => 'Excercise Two',
                'start_date' => '2021-11-01',
                'end_date' => '2021-12-31',
                'assignment_file' => 'file/assignment1.docx'
            ),
            array(
                'module_id' => '3',
                'title' => 'Assignment One',
                'description' => 'Excercise One',
                'start_date' => '2021-11-01',
                'end_date' => '2021-12-31',
                'assignment_file' => 'file/assignment1.docx'
            ),
        ));
    }
}
