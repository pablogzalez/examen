<?php

namespace Tests\Feature\Admin;

use App\Student;
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
        'fecha_alta' => '2017-11-03',
        'validate' => '0',
        'repeating' => '1',
    ];

    /** @test */
    function it_loads_the_new_students_page()
    {
        $student = Student::factory()->create();

        $this->get('estudiantes/nuevo')
            ->assertStatus(200)
            ->assertSee('Crear un estudiante');

    }

}
