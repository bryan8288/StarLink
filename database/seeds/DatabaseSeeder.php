<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            MentorSeeder::class,
            MenteeSeeder::class,
            AdminSeeder::class,
            CourseSeeder::class,
            ModuleSeeder::class
            ]);    
    }
}
