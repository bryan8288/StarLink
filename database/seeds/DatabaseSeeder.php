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
            ModuleSeeder::class,
            VideoSeeder::class,
            DiscussionMentorSeeder::class,
            DiscussionAdminSeeder::class,
            CompanySeeder::class,
            CompanyJobSeeder::class,
            ClassSeeder::class,
            ClassDetailSeeder::class,
            AssignmentSeeder::class,
            CourseTransactionSeeder::class,
            ExamSeeder::class,
            RequestedMentoringSeeder::class,
            ScoreSeeder::class,
            SubmittedAssignmentSeeder::class,
            SubmittedExamSeeder::class,
            ProgressMenteeSeeder::class,
            ApplicantSeeder::class,
            QuestionSeeder::class
            ]);
    }
}
