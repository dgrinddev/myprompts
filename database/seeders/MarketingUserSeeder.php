<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Prompt;
use App\Models\PublicProfile;
use App\Models\User;
use App\Models\UserSetting;
use App\Observers\PromptObserver;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MarketingUserSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => env('USER_MARKETING_NAME'),
            'email' => env('USER_MARKETING_EMAIL'),
            'password' => Hash::make(env('USER_MARKETING_PASSWORD')),
        ]);

        PublicProfile::factory()->create([
            'user_id' => $user->id,
            'created_at' => $user->created_at,
            'updated_at' => $user->updated_at,
        ]);

        UserSetting::factory()->create([
            'user_id' => $user->id,
            'created_at' => $user->created_at,
            'updated_at' => $user->updated_at,
        ]);

        $categories = [
            /*
            'Graphic Design' => [
                'description' => 'Professional visual design solutions including infographics, business cards, packaging, print ads, and comprehensive brand style guides.',
            ],
            */
            'Advertising and Campaigns' => [
                'description' => 'Strategic advertising campaigns across multiple channels with creative development, performance analysis, and optimization strategies.',
            ],
            /*
            'Email Marketing' => [
                'description' => 'Complete email marketing solutions from welcome series to newsletters, cart recovery, segmentation, and re-engagement campaigns.',
            ],
            */
            'Blog Posts' => [
                'description' => 'Engaging blog content including industry analysis, how-to guides, case studies, thought leadership articles, and product comparisons.',
            ],
            'Logo and Branding' => [
                'description' => 'Comprehensive brand identity development including logo design, color systems, typography, positioning, and brand guidelines.',
            ],
            'Social Media Posts' => [
                'description' => 'Creative social media content strategies for Instagram, LinkedIn, Twitter, Facebook, and TikTok with engaging visuals and copy.',
            ],
            'SEO Optimization' => [
                'description' => 'Technical and content SEO strategies including keyword research, on-page optimization, local SEO, and link building campaigns.',
            ],
            /*
            'Product Descriptions' => [
                'description' => 'Compelling product copy for e-commerce, luxury goods, technical specifications, benefit-focused descriptions, and product bundles.',
            ],
            */
        ];

        $categoryModels = [];

        foreach ($categories as $x => $y) {
            $categoryModels[$x] = Category::factory()->create([
                'user_id' => $user->id,
                'name' => $x,
                'description' => $y['description'],
                'slug' => Str::slug($x),
            ]);
        }
        
        $promptModels = [];
        
        $categoriesData = require database_path('data/marketing-user/categories-with-prompts.php');

        foreach ($categoriesData as $categoryData) {
            $category = $categoryModels[$categoryData['category_id']];
            foreach ($categoryData['prompts'] as $promptsData) {
                $prompt = Prompt::factory()->create(
                    array_merge(
                        $promptsData,
                        [
                            'user_id' => $user->id,
                            'category_id' => $category->id,
                        ]
                    )
                );
                $observer = new PromptObserver();
                $observer->saving($prompt);
                $prompt->save();
                $promptModels[] = $prompt;
            }
        }

        $uncategorizedPrompts = require database_path('data/marketing-user/uncategorized-prompts.php');

        foreach ($uncategorizedPrompts as $promptData) {
            $prompt = Prompt::factory()->create(
                array_merge(
                    $promptData,
                    [
                        'user_id' => $user->id,
                        'category_id' => null,
                    ]
                )
            );
            $observer = new PromptObserver();
            $observer->saving($prompt);
            $prompt->save();
            $promptModels[] = $prompt;
        }

    }
}
