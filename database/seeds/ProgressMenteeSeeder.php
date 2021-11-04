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
                'mentee_id' => '1',
                'module_id' => '2',
                'status'=> 'In Progress',
            )
        ));
    }
}
