<?php

use Illuminate\Database\Seeder;

class companyjobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companyjobs')->insert(array(
            array(
                'company_id' => '1',
                'name' => 'Software Developer',
                'description' => 'Sample description for discussion room exclusively for admin',
                'programming_language' => 'PHP, Java, C',
                'capacity' => '40',
                'salary' => '10.000.000',
                'type' => 'WFO',
            )
        ));
    }
}
