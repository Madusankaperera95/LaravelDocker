<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $courses = [
            'Engineering',
            'Management',
            'Nursing',
            'Medicine',
            'Physical Science',
            'Economics',
            'Finance',
            'Law'
        ];

        return [
            'courseName' => $this->faker->unique()->randomElement($courses),
            'status' => $this->faker->boolean
            // Add other fields as necessary
        ];

    }
}
