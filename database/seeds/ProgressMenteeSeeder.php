<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgressMenteeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('progress_mentees')->insert(array(
            array(
                'mentee_id' => '1',
                'module_id' => '1',
                'status'=> 'Completed',
            ),
            array(
                'mentee_id' => '2',
                'module_id' => '1',
                'status'=> 'In Progress',
            ),
            array(
                'mentee_id' => '3',
                'module_id' => '1',
                'status'=> 'In Progress',
            ),
            array(
                'mentee_id' => '4',
                'module_id' => '1',
                'status'=> 'Completed',
            ),
            array(
                'mentee_id' => '5',
                'module_id' => '1',
                'status'=> 'In Progress',
            ),
            array(
                'mentee_id' => '6',
                'module_id' => '1',
                'status'=> 'Completed',
            ),
            array(
                'mentee_id' => '7',
                'module_id' => '1',
                'status'=> 'In Progress',
            ),
            array(
                'mentee_id' => '1',
                'module_id' => '2',
                'status'=> 'Completed',
            ),
            array(
                'mentee_id' => '2',
                'module_id' => '2',
                'status'=> 'In Progress',
            ),
            array(
                'mentee_id' => '3',
                'module_id' => '2',
                'status'=> 'Completed',
            ),
            array(
                'mentee_id' => '4',
                'module_id' => '2',
                'status'=> 'In Progress',
            ),
            array(
                'mentee_id' => '5',
                'module_id' => '2',
                'status'=> 'In Progress',
            ),
            array(
                'mentee_id' => '6',
                'module_id' => '2',
                'status'=> 'In Progress',
            ),
            array(
                'mentee_id' => '7',
                'module_id' => '2',
                'status'=> 'In Progress',
            ),
            array(
                'mentee_id' => '1',
                'module_id' => '3',
                'status'=> 'Completed',
            ),
            array(
                'mentee_id' => '2',
                'module_id' => '3',
                'status'=> 'In Progress',
            ),
            array(
                'mentee_id' => '3',
                'module_id' => '3',
                'status'=> 'In Progress',
            ),
            array(
                'mentee_id' => '4',
                'module_id' => '3',
                'status'=> 'Completed',
            ),
            array(
                'mentee_id' => '5',
                'module_id' => '3',
                'status'=> 'In Progress',
            ),
            array(
                'mentee_id' => '6',
                'module_id' => '3',
                'status'=> 'Completed',
            ),
            array(
                'mentee_id' => '7',
                'module_id' => '3',
                'status'=> 'In Progress',
            ),
            array(
                'mentee_id' => '1',
                'module_id' => '4',
                'status'=> 'Completed',
            ),
            array(
                'mentee_id' => '2',
                'module_id' => '4',
                'status'=> 'In Progress',
            ),
            array(
                'mentee_id' => '3',
                'module_id' => '4',
                'status'=> 'In Progress',
            ),
            array(
                'mentee_id' => '4',
                'module_id' => '4',
                'status'=> 'Completed',
            ),
            array(
                'mentee_id' => '5',
                'module_id' => '4',
                'status'=> 'In Progress',
            ),
            array(
                'mentee_id' => '6',
                'module_id' => '4',
                'status'=> 'Completed',
            ),
            array(
                'mentee_id' => '7',
                'module_id' => '4',
                'status'=> 'In Progress',
            ),
            array(
                'mentee_id' => '6',
                'module_id' => '5',
                'status'=> 'Completed',
            ),
            array(
                'mentee_id' => '7',
                'module_id' => '5',
                'status'=> 'In Progress',
            ),
            array(
                'mentee_id' => '1',
                'module_id' => '5',
                'status'=> 'Completed',
            ),
            array(
                'mentee_id' => '8',
                'module_id' => '5',
                'status'=> 'In Progress',
            ),
            array(
                'mentee_id' => '6',
                'module_id' => '6',
                'status'=> 'In Progress',
            ),
            array(
                'mentee_id' => '7',
                'module_id' => '6',
                'status'=> 'In Progress',
            ),
            array(
                'mentee_id' => '1',
                'module_id' => '6',
                'status'=> 'In Progress',
            ),
            array(
                'mentee_id' => '8',
                'module_id' => '6',
                'status'=> 'In Progress',
            ),
            array(
                'mentee_id' => '2',
                'module_id' => '7',
                'status'=> 'Completed',
            ),
            array(
                'mentee_id' => '5',
                'module_id' => '7',
                'status'=> 'In Progress',
            ),
            array(
                'mentee_id' => '7',
                'module_id' => '7',
                'status'=> 'In Progress',
            ),
            array(
                'mentee_id' => '2',
                'module_id' => '8',
                'status'=> 'In Progress',
            ),
            array(
                'mentee_id' => '5',
                'module_id' => '8',
                'status'=> 'In Progress',
            ),
            array(
                'mentee_id' => '7',
                'module_id' => '8',
                'status'=> 'Completed',
            )
        ));
    }
}
