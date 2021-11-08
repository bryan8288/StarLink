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
                'day_of_week' => '1',
                'start_time' => '11:00:00',
                'end_time' => '12:00:00',
                'link'=>'https://us04web.zoom.us/j/72185484226?pwd=Y2d3MmFzQUNlbm8rZEI4NkVVaXVtdz09'
            ),
            array(
                'course_id' => '2',
                'mentor_id' => '1',
                'name' => 'LB01',
                'day_of_week' => '1',
                'start_time' => '14:00:00',
                'end_time' => '15:30:00',
                'link'=>'https://us04web.zoom.us/j/7218112384226?pwd=Y2d3MmFzQUNlbm8rZEI4NkVVaXVtdz09'
            ),
            array(
                'course_id' => '3',
                'mentor_id' => '2',
                'name' => 'LC01',
                'day_of_week' => '2',
                'start_time' => '10:00:00',
                'end_time' => '12:00:00',
                'link'=>'https://us04web.zoom.us/j/721854841136?pwd=Y2113d3MmFzQUNlbm8rZEI4NkVVaXVtdz09'
            ),
            array(
                'course_id' => '4',
                'mentor_id' => '1',
                'name' => 'LO01',
                'day_of_week' => '2',
                'start_time' => '09:00:00',
                'end_time' => '10:00:00',
                'link'=>'https://us04web.zoom.us/j/721851141136?pwd=Y2113d3MmFzQU22Nlbm8rZEI4NkVVaXVtdz09'
            ),
            array(
                'course_id' => '5',
                'mentor_id' => '1',
                'name' => 'LV01',
                'day_of_week' => '3',
                'start_time' => '11:00:00',
                'end_time' => '13:00:00',
                'link'=>'https://us04web.zoom.us/j/7221854841136?pwd=Y2113d3MmFzQUNlbm8rZEI4NkVVaXVtdz09'
            )
        ));
    }
}
