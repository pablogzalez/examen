<?php

namespace Tests\Feature\Admin;

use App\Product;
use App\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListStudentsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    function it_shows_the_students_list()
    {
        Student::factory()->create([
            'first_name' => 'Pepe',
        ]);

        Student::factory()->create([
            'first_name' => 'Pablo',
        ]);

        $this->get('/estudiantes')
            ->assertStatus(200)
            ->assertSee('Pepe')
            ->assertSee('Pablo');

        $this->assertNotRepeatedQueries();
    }

    /** @test */
    function students_are_ordered_by_name()
    {
        Student::factory()->create(['first_name' => 'A']);
        Student::factory()->create(['first_name' => 'B']);
        Student::factory()->create(['first_name' => 'C']);

        $this->get('/estudiantes?order=first_name')
            ->assertSeeInOrder([
                'A',
                'B',
                'C',
            ]);

        $this->get('/estudiantes?order=first_name-desc')
            ->assertSeeInOrder([
                'C',
                'B',
                'A',
            ]);
    }

    /** @test */
    function students_are_ordered_by_last_name()
    {
        Student::factory()->create(['first_name' => 'A']);
        Student::factory()->create(['first_name' => 'B']);
        Student::factory()->create(['first_name' => 'C']);

        $this->get('/estudiantes?order=last_name')
            ->assertSeeInOrder([
                'A',
                'B',
                'C',
            ]);

        $this->get('/estudiantes?order=last_name-desc')
            ->assertSeeInOrder([
                'C',
                'B',
                'A',
            ]);
    }



}
