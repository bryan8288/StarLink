<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('class_details')->insert(array(
            array(
                'class_id' => '1',
                'mentee_id' => '1',
            )
        ));
    }
}
