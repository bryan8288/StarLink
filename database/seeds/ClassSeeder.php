<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classes')->insert(array(
            array(
                'course_id' => '1',
                'mentor_id' => '1',
                'name' => 'LK01',
            )
        ));
    }
}
