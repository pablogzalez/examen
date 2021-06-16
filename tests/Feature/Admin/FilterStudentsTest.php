<?php

namespace Tests\Feature\Admin;

use App\Student;
use App\Course;
use App\Enrollment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FilterStudentsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    /** @test */
    function filter_users_by_search_first_name()
    {
        $user1 = Student::factory()->create(['first_name' => 'Jeremias']);
        $course1 = Course::factory()->create();
        $enrollment = Enrollment::factory()->create([
            'student_id' => $user1->id,
            'course_id' => $course1->id
        ]);

        $user2 = Student::factory()->create(['first_name' => 'Pablo']);

        $this->get('estudiantes?search=Jeremias')
            ->assertViewCollection('students')
            ->notContains($user2)
            ->contains($user1);
    }

    /** @test */
    function filter_users_by_search_last_name()
    {
        $user1 = Student::factory()->create(['last_name' => 'Bella']);
        $course1 = Course::factory()->create();
        $enrollment = Enrollment::factory()->create([
            'student_id' => $user1->id,
            'course_id' => $course1->id
        ]);

        $this->get('estudiantes?search=Bella')
            ->assertViewCollection('students')
            ->contains($user1);

    }

    /** @test */
    function filter_users_by_state_active()
    {
        $activeUser = Student::factory()->create([]);
        $course1 = Course::factory()->create();
        $enrollment = Enrollment::factory()->create([
            'student_id' => $activeUser->id,
            'course_id' => $course1->id,
            'validated' => '1'
        ]);

        $inactiveUser = Student::factory()->create();
        $enrollment2 = Enrollment::factory()->create([
            'student_id' => $inactiveUser->id,
            'course_id' => $course1->id,
            'validated' => '0'
        ]);

        $response = $this->get('/estudiantes?validate=active');

        $response->assertViewCollection('students')
            ->contains($activeUser)
            ->notContains($inactiveUser);
    }

    /** @test */
    function filter_users_by_state_inactive()
    {
        $activeUser = Student::factory()->create([]);
        $course1 = Course::factory()->create();
        $enrollment = Enrollment::factory()->create([
            'student_id' => $activeUser->id,
            'course_id' => $course1->id,
            'validated' => '1'
        ]);

        $inactiveUser = Student::factory()->create();
        $enrollment2 = Enrollment::factory()->create([
            'student_id' => $inactiveUser->id,
            'course_id' => $course1->id,
            'validated' => '0'
        ]);
        $response = $this->get('/estudiantes?validate=inactive');

        $response->assertViewCollection('students')
            ->notContains($activeUser)
            ->contains($inactiveUser);
    }




}
