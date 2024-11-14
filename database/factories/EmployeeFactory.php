<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Auth;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $seniority = fake()->randomElement([1, 2, 3]);
        $salary = rand(1000 * ($seniority - 1), 1000 * ($seniority));

        return [
            'first_name'    => fake()->firstName(),
            'last_name'     => fake()->lastName(),
            'gender'        => fake()->randomElement(['male', 'female']),
            'position'      => fake()->randomElement(['developer', 'sale']),
            'hired'         => false,
            'status'        => 'unloaded',
            'seniority'     => $seniority,
            'salary'        => $salary,
            'game_id'       => Auth::user()->currentGame()->id ?? 0,
        ];
    }
}
