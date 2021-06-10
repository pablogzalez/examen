<?php

namespace Tests\Feature\Admin;

use App\Student;
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

        $this->get('estudiantes?search=Bella')
            ->assertViewCollection('students')
            ->contains($user1);

    }

    /** @test */
    function filter_users_by_state_active()
    {
        $activeUser = Student::factory()->create(['validate' => '1']);
        $inactiveUser = Student::factory()->create(['validate' => '0']);

        $response = $this->get('/estudiantes?validate=active');

        $response->assertViewCollection('students')
            ->contains($activeUser)
            ->notContains($inactiveUser);
    }

    /** @test */
    function filter_users_by_state_inactive()
    {
        $activeUser = Student::factory()->create(['validate' => '1']);
        $inactiveUser = Student::factory()->create(['validate' => '0']);

        $response = $this->get('/estudiantes?validate=inactive');

        $response->assertViewCollection('students')
            ->contains($inactiveUser)
            ->notContains($activeUser);
    }




}
