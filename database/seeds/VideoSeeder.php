<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('videos')->insert(array(
            array(
                'module_id' => '1',
                'name' => 'Video 1',
                'description' => 'Introduction to Java',
                'other_reference' => 'https://www.youtube.com/watch?v=jiUxHm9l1KY',
                'video_file' => 'video/video1.mp4'
            ),
            array(
                'module_id' => '1',
                'name' => 'Video 2',
                'description' => 'Java Simple Project',
                'other_reference' => 'https://www.youtube.com/watch?v=jiUxHm9l1KY',
                'video_file' => null,
            ),
            array(
                'module_id' => '2',
                'name' => 'Java Sub Module 2',
                'description' => 'Java is a programming language and computing platform first released by Sun Microsystems in 1995. It has evolved from humble beginnings to power a large share of today’s digital world, by providing the reliable platform upon which many services and applications are built. New, innovative products and digital services designed for the future continue to rely on Java, as well.',
                'other_reference' => 'https://www.youtube.com/watch?v=jiUxHm9l1KY',
                'video_file' => null
            ),
            array(
                'module_id' => '5',
                'name' => 'C++ Sub Module 1',
                'description' => 'C++ was designed with an orientation toward system programming and embedded, resource-constrained software and large systems, with performance, efficiency, and flexibility of use as its design highlights.[10] C++ has also been found useful in many other contexts, with key strengths being software infrastructure and resource-constrained applications,[10] including desktop applications, video games, servers (e.g. e-commerce, web search, or databases), and performance-critical applications (e.g. telephone switches or space probes).',
                'other_reference' => 'https://www.youtube.com/watch?v=vLnPwxZdW4Y',
                'video_file' => null
            )
        ));
    }
}
