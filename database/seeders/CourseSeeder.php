<?php

namespace Database\Seeders;

use App\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::factory()->create(['course' => '1', 'level' => 'ESO']);
        Course::factory()->create(['course' => '2', 'level' => 'ESO']);
        Course::factory()->create(['course' => '3', 'level' => 'ESO']);
        Course::factory()->create(['course' => '4', 'level' => 'ESO']);
        Course::factory()->create(['course' => '1', 'level' => 'Bachillerato']);
        Course::factory()->create(['course' => '2', 'level' => 'Bachillerato']);
    }
}
