<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Auth;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $difficulty = fake()->randomElement([1, 2, 3]);
        $reward = rand(1000 * ($difficulty - 1), 1000 * $difficulty);

        return [
            'name'          => fake()->sentence(3),
            'reward'        => $reward,
            'difficulty'    => $difficulty,
            'status'        => 'pending',
            'game_id'       => Auth::user()->currentGame()->id ?? 0,
        ];
    }
}
