<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        if (app()->isProduction()) {
            //[$message, $author] = str(\Illuminate\Foundation\Inspiring::quotes()->random())->explode('-');
            $categories = [
                'AI Prompts',
                'Creative Writing',
                'Code Generation',
                'Data Analysis',
                'Image Generation',
                'Text Summarization',
                'Language Translation',
                'Business Strategy',
                'Marketing Ideas',
                'Technical Documentation',
                'Research Questions',
                'Educational Content',
                'Content Planning',
                'Email Templates',
                'Social Media',
                'Product Descriptions',
            ];
            $name = Arr::random($categories);
            //$description = trim($message);
            $userCreatedAt = now()->subDays(rand(5, 6));
            $categoryCreatedAt = now()->subDays(rand(3, 4));
            $categoryUpdatedAt = now()->subDays(rand(0, 2));
        } else {
            $name = fake()->words(rand(2, 6), true);
            //$description = fake()->words(rand(4, 8), true);
            $userCreatedAt = fake()->dateTimeBetween('-6 days', '-5 days');
            $categoryCreatedAt = fake()->dateTimeBetween($userCreatedAt, '-3 days');
            $categoryUpdatedAt = fake()->dateTimeBetween($categoryCreatedAt, 'now');
        }

        return [
            'user_id' => User::factory(), // Evt. generer tilknyttet bruger
            'name' => $name,
            //'description' => $description,
            'slug' => Str::slug($name),
            'created_at' => $categoryCreatedAt,
            'updated_at' => $categoryUpdatedAt,
        ];
    }
}
