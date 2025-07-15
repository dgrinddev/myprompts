<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        if (app()->isProduction()) {
            $tags = [
                'coding',
                'creative',
                'analysis',
                'writing',
                'automation',
                'research',
                'planning',
                'documentation',
                'marketing',
                'design',
                'productivity',
                'communication',
                'strategy',
                'education',
                'workflow',
                'brainstorming',
                'optimization',
                'debugging',
                'content',
                'review',
            ];
            $name = Arr::random($tags);
        } else {
            $name = fake()->word();
        }

        return [
            'user_id' => User::factory(),
            'name' => $name,
            'slug' => Str::slug($name),
        ];
    }
}
