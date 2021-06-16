<?php

namespace Tests\Feature\Admin;

use App\Product;
use App\Student;
use App\Course;
use App\Enrollment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListStudentsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function it_shows_the_students_list()
    {
        $student = Student::factory()->create([
            'first_name' => 'Pepe',
        ]);
        $course1 = Course::factory()->create();
        $enrollment = Enrollment::factory()->create([
            'student_id' => $student->id,
            'course_id' => $course1->id,
            'validated' => '1'
        ]);

        $student2 = Student::factory()->create([
            'first_name' => 'Pablo',
        ]);
        $enrollment2 = Enrollment::factory()->create([
            'student_id' => $student2->id,
            'course_id' => $course1->id,
            'validated' => '0'

        ]);

        $this->get('/estudiantes')
            ->assertStatus(200)
            ->assertSee('Pepe')
            ->assertSee('Pablo');

        $this->assertNotRepeatedQueries();
    }


}
