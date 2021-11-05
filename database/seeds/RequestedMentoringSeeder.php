<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RequestedMentoringSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('requested_mentorings')->insert(array(
            array(
                'mentee_id' => '1',
                'name' => 'Ruby'
            ),
            array(
                'mentee_id' => '1',
                'name' => 'Java'
            ),
            array(
                'mentee_id' => '1',
                'name' => 'Ruby'
            ),
            array(
                'mentee_id' => '1',
                'name' => 'Java'
            ),
            array(
                'mentee_id' => '1',
                'name' => 'AI'
            ),
            array(
                'mentee_id' => '1',
                'name' => 'AI'
            ),   array(
                'mentee_id' => '1',
                'name' => 'Ruby'
            ),
            array(
                'mentee_id' => '1',
                'name' => 'Swift'
            ),
            array(
                'mentee_id' => '1',
                'name' => 'Java'
            ),
            array(
                'mentee_id' => '1',
                'name' => 'Golang'
            )
        ));
    }
}
