<?php

namespace Database\Seeders;

use App\Course;
use App\Enrollment;
use App\Student;
use Illuminate\Database\Seeder;

class EnrollmentSeeder extends Seeder
{
    private $student;
    private $course;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->student = Student::all();
        $this->course = Course::all();

        foreach ($this->student as $i) {
            $this->createRandomEnrollment($i);
        }
    }

    public function createRandomEnrollment($i)
    {
            $enrollment = Enrollment::factory()->create([
                'student_id' => $i->id, //estaba llamando a la id directamente en el foreach, ahora si funciona.
                'course_id' => $this->course->random()->id,
                'created_at' => $i->created_at, //el created at del alumno sera el mismo que el de la matricula
            ]);

    }
}
