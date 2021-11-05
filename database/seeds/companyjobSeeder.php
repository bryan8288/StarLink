<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanyJobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('company_jobs')->insert(array(
            array(
                'company_id' => '1',
                'name' => 'Software Developer',
                'description' => 'Sample description for discussion room exclusively for admin',
                'programming_language' => 'PHP, Java, C',
                'capacity' => '10',
                'salary' => '10.000.000',
                'type' => 'WFO',
            ),
            array(
                'company_id' => '1',
                'name' => 'BackEnd Developer',
                'description' => 'Sample description for discussion room exclusively for admin',
                'programming_language' => 'Java, Ruby',
                'capacity' => '15',
                'salary' => '10.000.000',
                'type' => 'WFO',
            ),
            array(
                'company_id' => '1',
                'name' => 'FrontEnd Developer',
                'description' => 'Sample description for discussion room exclusively for admin',
                'programming_language' => 'React',
                'capacity' => '5',
                'salary' => '10.000.000',
                'type' => 'WFO',
            ),
            array(
                'company_id' => '1',
                'name' => 'Data Scientist',
                'description' => 'Sample description for discussion room exclusively for admin',
                'programming_language' => 'R',
                'capacity' => '7',
                'salary' => '10.000.000',
                'type' => 'WFO',
            ),
            array(
                'company_id' => '1',
                'name' => 'Fullstack Developer',
                'description' => 'Sample description for discussion room exclusively for admin',
                'programming_language' => 'PHP, React',
                'capacity' => '12',
                'salary' => '10.000.000',
                'type' => 'WFO',
            ),
        ));
    }
}
