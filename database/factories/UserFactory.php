<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        if (app()->isProduction()) {
            $usernames = [
                'prompt_master',
                'ai_explorer',
                'code_wizard',
                'creative_mind',
                'data_analyst',
                'tech_writer',
                'content_creator',
                'strategy_guru',
                'research_pro',
                'automation_expert',
                'design_thinker',
                'workflow_ninja',
                'productivity_hacker',
                'innovation_seeker',
                'problem_solver',
            ];
            $name = Arr::random($usernames) . rand(100, 999);
            $name = substr(strtolower($name), 0, 20);
            $domains = ['example.com', 'test.dev', 'demo.local', 'sample.org'];
            $email = $name . '@' . Arr::random($domains);
            $createdAt = now()->subDays(rand(7, 8));
            $updatedAt = now()->subDays(rand(0, 6));
        } else {
            $name = substr(preg_replace('/[^a-z0-9_]/', '_', fake()->userName), 0, 20);
            $email = fake()->unique()->safeEmail();
            $createdAt = fake()->dateTimeBetween('-8 days', '-7 days');
            $updatedAt = fake()->dateTimeBetween($createdAt, 'now');
        }

        return [
            // 'name' => fake()->name(),
            'name' => $name,
            // 'name' => fake()->regexify('[a-z0-9_]{4,20}'),
            'email' => $email,
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'created_at' => $createdAt,
            'updated_at' => $updatedAt,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
