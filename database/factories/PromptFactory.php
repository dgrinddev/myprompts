<?php

namespace Database\Factories;

//use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Prompt>
 */
class PromptFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        [$message, $author] = str(\Illuminate\Foundation\Inspiring::quotes()->random())->explode('-');

        if (app()->isProduction()) {
            $title = trim($author);
            $content = trim($message);
            $promptCreatedAt = now()->subDays(rand(2, 3));
            $promptUpdatedAt = now()->subDays(rand(0, 1));
        } else {
            $useQuote = fake()->boolean(50);
            $title = $useQuote ? trim($author) : fake()->sentence();
            $content = $useQuote ? trim($message) : fake()->realTextBetween(500, 1500);
            $userCreatedAt = fake()->dateTimeBetween('-7 days', '-6 days');
            $categoryCreatedAt = fake()->dateTimeBetween($userCreatedAt, '-4 days');
            $promptCreatedAt = fake()->dateTimeBetween($categoryCreatedAt, '-2 days');
            $promptUpdatedAt = fake()->dateTimeBetween($promptCreatedAt, 'now');
        }

        return [
            'user_id' => User::factory(), // generer en tilknyttet bruger
            'title' => $title,
            'content' => $content,
            // 'share_url' => (string) Str::uuid(),
            //'category_id' => fake()->boolean(75) ? Category::factory() : null,
            'created_at' => $promptCreatedAt,
            'updated_at' => $promptUpdatedAt,
        ];
    }
}
