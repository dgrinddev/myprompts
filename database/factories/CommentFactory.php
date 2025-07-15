<?php

namespace Database\Factories;

use App\Models\Prompt;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        if (app()->isProduction()) {
            $comments = [
                'This prompt works really well for my use case.',
                'Great example, thanks for sharing!',
                'I modified this slightly and got excellent results.',
                'Very helpful prompt structure.',
                'This saved me a lot of time.',
                'Clever approach to this problem.',
                'Works perfectly for what I needed.',
                'Thanks for the detailed explanation.',
                'I use a similar approach but with different parameters.',
                'Excellent prompt engineering example.',
            ];
            $body = Arr::random($comments);
        } else {
            $body = fake()->sentence();
        }

        return [
            'user_id' => User::factory(),
            'prompt_id' => Prompt::factory(),
            'body' => $body,
        ];
    }
}
