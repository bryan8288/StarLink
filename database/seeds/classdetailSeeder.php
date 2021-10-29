<?php

use Illuminate\Database\Seeder;

class classdetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classdetails')->insert(array(
            array(
                'class_id' => '1',
                'mentee_id' => '1',
            )
        ));
    }
}
