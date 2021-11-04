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
                'start_date' => '2021-10-31',
                'end_date' => '2021-11-07',
                'assignment_file' => 'file/assignment1.docx'
            )
        ));
    }
}
