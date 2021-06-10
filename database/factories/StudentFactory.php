<?php

namespace Database\Factories;

use App\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->sentence(2),
            'last_name' => $this->faker->sentence(2),
            'nif' => $this->faker->unique()->uuid(),
            'adress' => $this->faker->sentence(2),
            'postcode' => $this->faker->numberBetween(1000,4000),
        ];
    }
}
