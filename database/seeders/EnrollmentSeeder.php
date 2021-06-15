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

        foreach ($this->student->id as $i) {
            $this->createRandomEnrollment($i);
        }
    }

    public function createRandomEnrollment($i)
    {

            $enrollment = Enrollment::factory()->create([
                'student_id' => $i,
                'course_id' => $this->course->random()->id,
            ]);

    }
}
