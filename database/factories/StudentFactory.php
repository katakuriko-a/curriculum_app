<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    protected $student = Student::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'name' => $this->faker->name(),
            'age' => rand(1, 99),
            'birth' => $this->faker->dateTimeBetween(),
            'mail' => $this->faker->email(),
            'tel' => $this->faker->phoneNumber(),
            'plan' => $this->faker->randomElement(['STANDARD', 'PREMIUM']),
            'level_id' => rand(1, 5),
        ];
    }
}
