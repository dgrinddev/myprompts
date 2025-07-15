<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Prompt;
use App\Models\PublicProfile;
use App\Models\Tag;
use App\Models\User;
use App\Models\UserSetting;
use App\Observers\PromptObserver;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TestSeeder extends Seeder
{
    //use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usersData = [
            // Opret en random bruger med rollen 'user'
            [
            ],
            // Opret en bruger med rollen 'admin' som ingen Kategorier, Prompts, Comments eller Tags får.
            [
                'name' => 'admin_bruger',
                'email' => 'admin@mail.dk',
                'password' => Hash::make('12345678'),
                'role' => 'admin',
            ],
            // Opret en bruger med rollen 'user'
            [
                'name' => 'test_bruger',
                'email' => 'eksempel@mail.dk',
                'password' => Hash::make('12345678'),
            ],
            // Opret en bruger med rollen 'user' som ingen Kategorier, Prompts, Comments eller Tags får.
            [
                'name' => 'tom_bruger',
                'email' => 'tom@mail.dk',
                'password' => Hash::make('12345678'),
            ],
        ];

        $users = [];

        foreach ($usersData as $data) {
            $userCreatedAt = fake()->dateTimeBetween('-30 days', 'now');
            $userUpdatedAt = fake()->dateTimeBetween($userCreatedAt, 'now');

            $users[] = User::factory()->create(
                array_merge(
                    $data,
                    [
                        'created_at' => $userCreatedAt,
                        'updated_at' => $userUpdatedAt,
                    ]
                )
            );
        }

        foreach ($users as $index => $user) {
            $catsAndTagsPerUser = 0;
            $promptsPerCatTag = 0;
            $commentsPerPrompt = 0;
            $promptsWithoutCategories = 0;

            if ($index === 0 || $index === 2) {
                $catsAndTagsPerUser = 3; // antal categorier og tags per bruger - bemærk: en af kategorierne får ingen prompt
                $promptsPerCatTag = 4; // antal prompts per kategori - bemærk: en af kategorierne får én mindre prompt
                $commentsPerPrompt = 3; // antal comments per prompt
                $promptsWithoutCategories = 10; // antal prompts der laves ekstra (uden kategori) udover de nævnte ovenfor
            }

            $categories = [];

            for ($x = 0; $x < $catsAndTagsPerUser; $x++) {
                $categoryCreatedAt = fake()->dateTimeBetween('-30 days', 'now');
                $categoryUpdatedAt = fake()->dateTimeBetween($categoryCreatedAt, 'now');
                
                $categories[] = Category::factory()->create([
                    'user_id' => $user->id,
                    'description' => fake()->paragraph(),
                    'created_at' => $categoryCreatedAt,
                    'updated_at' => $categoryUpdatedAt,
                ]);
            }

            $tags = collect();

            for ($x = 0; $x < $catsAndTagsPerUser; $x++) {
                $tagCreatedAt = fake()->dateTimeBetween('-30 days', 'now');
                $tagUpdatedAt = fake()->dateTimeBetween($tagCreatedAt, 'now');

                $tags->push(Tag::factory()->create([
                    'user_id' => $user->id,
                    'created_at' => $tagCreatedAt,
                    'updated_at' => $tagUpdatedAt,
                ]));
            }

            // Udvælg en kategori der får 0 prompts og én der får én mindre
            $noPromptIndex = 0;
            $lessPromptIndex = 1;

            for ($x = 0; $x < $catsAndTagsPerUser; $x++) {
                // Spring over denne kategori så den ingen prompts får
                if ($x === $noPromptIndex) {
                    continue;
                }

                // Bestem antal prompts: én mindre prompt hvis det er "lessPromptIndex"
                $promptCount = ($x === $lessPromptIndex) ? $promptsPerCatTag - 1 : $promptsPerCatTag;

                for ($y = 0; $y < $promptCount; $y++) {
                    $promptCreatedAt = fake()->dateTimeBetween('-30 days', 'now');
                    $promptUpdatedAt = fake()->dateTimeBetween($promptCreatedAt, 'now');

                    // Opret et basis array for prompt
                    $promptData = [
                        'user_id' => $user->id,
                        'type' => fake()->randomElement(['text','image','other']),
                        'status' => fake()->randomElement(['private','public']),
                        'created_at' => $promptCreatedAt,
                        'updated_at' => $promptUpdatedAt,
                    ];

                    // Ved den første kategori for den første bruger så gør kategorien til nr 2 kategori
                    if ($index === 0 && $x === 0) {
                        $promptData['category_id'] = $categories[1]->id;
                    } else {
                        $promptData['category_id'] = $categories[$x]->id;
                    }

                    $prompt = Prompt::factory()->create($promptData);
                    $observer = new PromptObserver();
                    $observer->saving($prompt);
                    $prompt->save();

                    $prompt->tags()->attach($tags[$x]->id);
                    for ($z = 0; $z < $commentsPerPrompt; $z++) {
                        $commentCreatedAt = fake()->dateTimeBetween('-30 days', 'now');
                        $commentUpdatedAt = fake()->dateTimeBetween($commentCreatedAt, 'now');

                        Comment::factory()->create([
                            'user_id' => $user->id,
                            'prompt_id' => $prompt->id,
                            'created_at' => $commentCreatedAt,
                            'updated_at' => $commentUpdatedAt,
                        ]);
                    }
                }
            }

            // opret x antal prompts som ingen category har
            for ($i = 0; $i < $promptsWithoutCategories; $i++) {
                $promptCreatedAt = fake()->dateTimeBetween('-30 days', 'now');
                $promptUpdatedAt = fake()->dateTimeBetween($promptCreatedAt, 'now');

                $prompt = Prompt::factory()->create([
                    'user_id' => $user->id,
                    'type' => fake()->randomElement(['text','image','other']),
                    'status' => fake()->randomElement(['private','public']),
                    'created_at' => $promptCreatedAt,
                    'updated_at' => $promptUpdatedAt,
                ]);
                $observer = new PromptObserver();
                $observer->saving($prompt);
                $prompt->save();

                $prompt->tags()->attach($tags->random()->id);
                for ($z = 0; $z < $commentsPerPrompt; $z++) {
                    $commentCreatedAt = fake()->dateTimeBetween('-30 days', 'now');
                    $commentUpdatedAt = fake()->dateTimeBetween($commentCreatedAt, 'now');

                    Comment::factory()->create([
                        'user_id' => $user->id,
                        'prompt_id' => $prompt->id,
                        'created_at' => $commentCreatedAt,
                        'updated_at' => $commentUpdatedAt,
                    ]);
                }
            }

            $publicProfileCreatedAt = fake()->dateTimeBetween('-30 days', 'now');
            $publicProfileUpdatedAt = fake()->dateTimeBetween($publicProfileCreatedAt, 'now');
            // Opret et basis array for public profile
            $publicProfileData = [
                'user_id' => $user->id,
                'bio' => fake()->sentence(),
                'view_option' => fake()->randomElement(['table', 'grid']),
                'layout_option' => fake()->randomElement(['single_list', 'categorized']),
                'created_at' => $publicProfileCreatedAt,
                'updated_at' => $publicProfileUpdatedAt,
            ];
            // Ændr is_active til true for alle andre end den 1. og 2. iteration
            if ($index !== 0 && $index !== 1) {
                $publicProfileData['is_active'] = true;
            }
            PublicProfile::factory()->create($publicProfileData);

            $userSettingCreatedAt = fake()->dateTimeBetween('-30 days', 'now');
            $userSettingUpdatedAt = fake()->dateTimeBetween($userSettingCreatedAt, 'now');
            UserSetting::factory()->create([
                'user_id' => $user->id,
                'language'  => fake()->randomElement(['da', 'en']),
                'created_at' => $userSettingCreatedAt,
                'updated_at' => $userSettingUpdatedAt,
            ]);
        }
    }
}
