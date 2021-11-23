<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->insert(array(
            array(
                'exam_id' => '2',
                'question' => 'Write a function that takes the base and height of a triangle and return its area using Python',
                'example' => null,
                'note' => null,
                'score'=> 50
            ),
            array(
                'exam_id' => '2',
                'question' => 'What is the difference between list and tuples in Pythonn',
                'example' => null,
                'note' => null,
                'score'=> 20
            ),
            array(
                'exam_id' => '2',
                'question' => 'What is the difference between deep and shallow copy?',
                'example' => null,
                'note' => null,
                'score'=> 30
            ),
        ));
    }
}
