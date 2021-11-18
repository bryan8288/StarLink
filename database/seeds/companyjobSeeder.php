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
                'description' => 'Software engineers focus on applying the principles of engineering to software development. Their role includes analyzing and modifying existing software as well as designing, constructing and testing end-user applications that meet user needs — all through software programming languages.',
                'programming_language' => 'PHP, Java, C',
                'capacity' => '10',
                'salary' => '15000000',
                'type' => 'WFO',
            ),
            array(
                'company_id' => '1',
                'name' => 'BackEnd Developer',
                'description' => 'Builds and maintains the technology needed to power the components which enable the user-facing side of the website to exist. Their back end code adds utility to everything the front-end developer creates.',
                'programming_language' => 'Java, Ruby',
                'capacity' => '15',
                'salary' => '10000000',
                'type' => 'WFH',
            ),
            array(
                'company_id' => '1',
                'name' => 'FrontEnd Developer',
                'description' => 'Implementing visual elements that users see and interact with in a web application',
                'programming_language' => 'React',
                'capacity' => '5',
                'salary' => '10000000',
                'type' => 'WFH',
            ),
            array(
                'company_id' => '1',
                'name' => 'Data Scientist',
                'description' => 'Utilize their analytical, statistical, and programming skills to collect, analyze, and interpret large data sets.',
                'programming_language' => 'R',
                'capacity' => '7',
                'salary' => '12000000',
                'type' => 'WFO',
            ),
            array(
                'company_id' => '1',
                'name' => 'Fullstack Developer',
                'description' => 'Handle Backend and Frontend',
                'programming_language' => 'PHP, React',
                'capacity' => '12',
                'salary' => '15000000',
                'type' => 'WFO',
            ),
            array(
                'company_id' => '2',
                'name' => 'Software Developer',
                'description' => 'Software engineers focus on applying the principles of engineering to software development. Their role includes analyzing and modifying existing software as well as designing, constructing and testing end-user applications that meet user needs — all through software programming languages.',
                'programming_language' => 'PHP, Java, C',
                'capacity' => '12',
                'salary' => '12000000',
                'type' => 'WFO',
            ),
            array(
                'company_id' => '2',
                'name' => 'BackEnd Developer',
                'description' => 'Builds and maintains the technology needed to power the components which enable the user-facing side of the website to exist. Their back end code adds utility to everything the front-end developer creates.',
                'programming_language' => 'Java, Ruby',
                'capacity' => '8',
                'salary' => '8000000',
                'type' => 'WFH',
            ),
            array(
                'company_id' => '2',
                'name' => 'FrontEnd Developer',
                'description' => 'Implementing visual elements that users see and interact with in a web application',
                'programming_language' => 'React',
                'capacity' => '6',
                'salary' => '7000000',
                'type' => 'WFH',
            ),
            array(
                'company_id' => '2',
                'name' => 'Data Scientist',
                'description' => 'Utilize their analytical, statistical, and programming skills to collect, analyze, and interpret large data sets.',
                'programming_language' => 'R',
                'capacity' => '5',
                'salary' => '10000000',
                'type' => 'WFO',
            ),
            array(
                'company_id' => '2',
                'name' => 'Fullstack Developer',
                'description' => 'Handle Backend and Frontend',
                'programming_language' => 'PHP, React',
                'capacity' => '10',
                'salary' => '10000000',
                'type' => 'WFO',
            ),
        ));
    }
}
