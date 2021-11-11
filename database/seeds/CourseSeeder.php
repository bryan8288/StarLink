<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->insert(array(
            array(
                'name' => 'Java',
                'category' => 'Curriculum',
                'description' => 'Java is a programming language and computing platform first released by Sun Microsystems in 1995. It has evolved from humble beginnings to power a large share of today’s digital world, by providing the reliable platform upon which many services and applications are built. New, innovative products and digital services designed for the future continue to rely on Java, as well.',
                'weeks' => 6,
                'price' => 250000,
                'exam_time' => '01:30:00',
                'kkm' => 75
            ),
            array(
                'name' => 'Phyton',
                'category' => 'Curriculum',
                'description' => "Python is an interpreted, object-oriented, high-level programming language with dynamic semantics. Its high-level built in data structures, combined with dynamic typing and dynamic binding, make it very attractive for Rapid Application Development, as well as for use as a scripting or glue language to connect existing components together. Python's simple, easy to learn syntax emphasizes readability and therefore reduces the cost of program maintenance. Python supports modules and packages, which encourages program modularity and code reuse. The Python interpreter and the extensive standard library are available in source or binary form without charge for all major platforms, and can be freely distributed.",
                'weeks' => 5,
                'price' => 200000,
                'exam_time' => '02:00:00',
                'kkm' => 75
            ),
            array(
                'name' => 'C++',
                'category' => 'E-Learning',
                'description' => 'C++ was designed with an orientation toward system programming and embedded, resource-constrained software and large systems, with performance, efficiency, and flexibility of use as its design highlights.[10] C++ has also been found useful in many other contexts, with key strengths being software infrastructure and resource-constrained applications,[10] including desktop applications, video games, servers (e.g. e-commerce, web search, or databases), and performance-critical applications (e.g. telephone switches or space probes).',
                'weeks' => 8,
                'price' => 450000,
                'exam_time' => '02:30:00',
                'kkm' => 80
            ),
            array(
                'name' => 'SQl',
                'category' => 'Curriculum',
                'description' => 'SQL is the most common language for extracting and organising data that is stored in a relational database. A database is a table that consists of rows and columns. SQL is the language of databases. It facilitates retrieving specific information from databases that are further used for analysis.',
                'weeks' => 5,
                'exam_time' => '01:30:00',
                'price' => 150000,
                'kkm' => 85
            ),   array(
                'name' => 'React',
                'category' => 'E-Learning',
                'exam_time' => '02:00:00',
                'description' => 'React is a free and open-source front-end JavaScript library for building user interfaces or UI components. It is maintained by Facebook and a community of individual developers and companies. React can be used as a base in the development of single-page or mobile applications.',
                'weeks' => 8,
                'price' => 400000,
                'kkm' => 75
            )
        ));
    }
}
