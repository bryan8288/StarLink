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
            ),
            array(
                'class_id' => '1',
                'mentee_id' => '2',
            ),
            array(
                'class_id' => '1',
                'mentee_id' => '3',
            ),
            array(
                'class_id' => '1',
                'mentee_id' => '4',
            ),
            array(
                'class_id' => '1',
                'mentee_id' => '5',
            ),
            array(
                'class_id' => '2',
                'mentee_id' => '6',
            ),
            array(
                'class_id' => '2',
                'mentee_id' => '7',
            ),
            array(
                'class_id' => '2',
                'mentee_id' => '1',
            ),
            array(
                'class_id' => '2',
                'mentee_id' => '8',
            ),
            array(
                'class_id' => '3',
                'mentee_id' => '2',
            ),
            array(
                'class_id' => '3',
                'mentee_id' => '5',
            ),
            array(
                'class_id' => '3',
                'mentee_id' => '7',
            ),
            array(
                'class_id' => '4',
                'mentee_id' => '4',
            ),
            array(
                'class_id' => '4',
                'mentee_id' => '8',
            ),
            array(
                'class_id' => '4',
                'mentee_id' => '9',
            ),
            array(
                'class_id' => '4',
                'mentee_id' => '10',
            ),
            array(
                'class_id' => '4',
                'mentee_id' => '1',
            ),
            array(
                'class_id' => '5',
                'mentee_id' => '7',
            ),
            array(
                'class_id' => '5',
                'mentee_id' => '1',
            ),
            array(
                'class_id' => '5',
                'mentee_id' => '2',
            ),
            array(
                'class_id' => '5',
                'mentee_id' => '9',
            ),
            array(
                'class_id' => '5',
                'mentee_id' => '10',
            ),
            array(
                'class_id' => '5',
                'mentee_id' => '5',
            ),
            array(
                'class_id' => '5',
                'mentee_id' => '4',
            ),
            array(
                'class_id' => '5',
                'mentee_id' => '3',
            )
        ));
    }
}
