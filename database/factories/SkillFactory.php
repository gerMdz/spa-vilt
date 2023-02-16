<?php

namespace Database\Factories;

use App\Models\Skill;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Skill>
 */
class SkillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $colorName = $this->faker->randomElement(Skill::getAvailableBackgroundColors());
        return [
            'name' => $this->faker->unique()->word(),
            'color' => $colorName,
        ];
    }
}
