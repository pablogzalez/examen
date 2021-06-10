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

        foreach (range(1, 20) as $i) {
            $this->createRandomEnrollment();
        }
    }

    public function createRandomEnrollment()
    {

        foreach (range(1, 20) as $i) {

            $enrollment = Enrollment::factory()->create([
                'student_id' => $this->student->random()->id,
                'course_id' => $this->course->random()->id,
            ]);

        }

    }
}
