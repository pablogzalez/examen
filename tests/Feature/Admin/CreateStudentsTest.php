<?php

namespace Tests\Feature\Admin;

use App\Student;
use App\Course;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateStudentsTest extends TestCase
{
    use RefreshDatabase;

    protected $defaultData = [
        'first_name' => 'Pepe',
        'last_name' => 'Pérez',
        'nif' => '1321',
        'adress' => 'SoyCalle',
        'postcode' => '1333',
        'validate' => '0',
        'repeating' => '1',
    ];

    /** @test */
    function it_creates_a_new_student()
    {
        $this->withoutExceptionHandling();

        $course = Course::factory()->create();

        $this->post('/estudiantes/', $this->withData([
            'course_id' => $course->id,
        ]))->assertRedirect('/estudiantes/');

        $this->assertDatabaseHas('students', [
            'first_name' => 'Pepe',
            'last_name' => 'Pérez',
            'nif' => '1321',
            'adress' => 'SoyCalle',
            'postcode' => '1333',
        ]);

        $student = Student::findByName('Pepe');

        $this->assertDatabaseHas('enrollments', [
            'validated' => '0',
            'repeating' => '1',
            'student_id' => $student->id,
            'course_id' => $course->id
        ]);
    }

    /** @test */
    public function the_first_name_is_required()
    {
        $this->handleValidationExceptions();

        $this->post('/estudiantes/', $this->withData(['first_name' => '']))
            ->assertSessionHasErrors(['first_name']);

        $this->assertDatabaseEmpty('students');
    }


}
