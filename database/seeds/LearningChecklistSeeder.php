<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LearningChecklistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('learning_checklists')->insert(array(
            array(
               
            )
        ));
    }
}
