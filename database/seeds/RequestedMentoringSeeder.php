<?php

use Illuminate\Database\Seeder;

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
                'name' => 'Ruby Programming'
            )
        ));
    }
}
