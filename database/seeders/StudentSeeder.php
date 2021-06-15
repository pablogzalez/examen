<?php

namespace Database\Seeders;

use App\Enrollment;
use App\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    private $enrollment;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->enrollment = Enrollment::all();

        foreach (range(1, 500) as $i) {
            $this->createRandomStudent();
        }
    }

    public function createRandomStudent()
    {
        $student = Student::factory()->create([]);

    }
}
