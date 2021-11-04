<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modules')->insert(array(
            array(
                'course_id' => '1',
                'name' => 'Java Sub Module 1',
                'description' => 'Java is a programming language and computing platform first released by Sun Microsystems in 1995. It has evolved from humble beginnings to power a large share of today’s digital world, by providing the reliable platform upon which many services and applications are built. New, innovative products and digital services designed for the future continue to rely on Java, as well.',
                'exam_time' => '02:00:00',
                'kkm' => 75,
                'learning_material' => 'learningmaterial/learning1.pptx'
            ),
            array(
                'course_id' => '1',
                'name' => 'Java Sub Module 2',
                'description' => "Python is an interpreted, object-oriented, high-level programming language with dynamic semantics. Its high-level built in data structures, combined with dynamic typing and dynamic binding, make it very attractive for Rapid Application Development, as well as for use as a scripting or glue language to connect existing components together. Python's simple, easy to learn syntax emphasizes readability and therefore reduces the cost of program maintenance. Python supports modules and packages, which encourages program modularity and code reuse. The Python interpreter and the extensive standard library are available in source or binary form without charge for all major platforms, and can be freely distributed.",
                'exam_time' => '01:30:00',
                'kkm' => 75,
                'learning_material' => 'learningmaterial/learning2.pptx'
            ),
            array(
                'course_id' => '2',
                'name' => 'Python Sub Module 1',
                'description' => "Python is an interpreted, object-oriented, high-level programming language with dynamic semantics. Its high-level built in data structures, combined with dynamic typing and dynamic binding, make it very attractive for Rapid Application Development, as well as for use as a scripting or glue language to connect existing components together. Python's simple, easy to learn syntax emphasizes readability and therefore reduces the cost of program maintenance. Python supports modules and packages, which encourages program modularity and code reuse. The Python interpreter and the extensive standard library are available in source or binary form without charge for all major platforms, and can be freely distributed.",
                'exam_time' => '01:30:00',
                'kkm' => 80,
                'learning_material' => 'learningmaterial/learning3.pptx'
            ),
            array(
                'course_id' => '2',
                'name' => 'Python Sub Module 2',
                'description' => "Python is an interpreted, object-oriented, high-level programming language with dynamic semantics. Its high-level built in data structures, combined with dynamic typing and dynamic binding, make it very attractive for Rapid Application Development, as well as for use as a scripting or glue language to connect existing components together. Python's simple, easy to learn syntax emphasizes readability and therefore reduces the cost of program maintenance. Python supports modules and packages, which encourages program modularity and code reuse. The Python interpreter and the extensive standard library are available in source or binary form without charge for all major platforms, and can be freely distributed.",
                'exam_time' => '02:30:00',
                'kkm' => 75,
                'learning_material' => 'learningmaterial/learning4.pptx'
            ),
            array(
                'course_id' => '3',
                'name' => 'C++ Sub Module 1',
                'description' => 'C++ was designed with an orientation toward system programming and embedded, resource-constrained software and large systems, with performance, efficiency, and flexibility of use as its design highlights.[10] C++ has also been found useful in many other contexts, with key strengths being software infrastructure and resource-constrained applications,[10] including desktop applications, video games, servers (e.g. e-commerce, web search, or databases), and performance-critical applications (e.g. telephone switches or space probes).',
                'exam_time' => '01:45:00',
                'kkm' => 80,
                'learning_material' => 'learningmaterial/learning5.pptx'
            ),
            array(
                'course_id' => '3',
                'name' => 'C++ Sub Module 2',
                'description' => 'C++ was designed with an orientation toward system programming and embedded, resource-constrained software and large systems, with performance, efficiency, and flexibility of use as its design highlights.[10] C++ has also been found useful in many other contexts, with key strengths being software infrastructure and resource-constrained applications,[10] including desktop applications, video games, servers (e.g. e-commerce, web search, or databases), and performance-critical applications (e.g. telephone switches or space probes).',
                'exam_time' => '01:30:00',
                'kkm' => 75,
                'learning_material' => 'learningmaterial/learning6.pptx'
            )
        ));
    }
}
