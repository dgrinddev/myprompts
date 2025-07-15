<?php

namespace App\Http\Controllers;

use App\Models\Prompt;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PublicProfileController extends Controller
{
    /**
     * Vis en brugers offentlige profil
     */
    public function show(string $profile)
    {
        // Find brugeren baseret på det unikke brugernavn
        $user = User::where('name', $profile)->firstOrFail();

        // Hvis profil ikke er aktiveret
        if (!$user->publicProfile || !$user->publicProfile->is_active) {
            abort(404, 'Brugeren findes ikke');
        }

        $user->load(['publicProfile', 'publicPrompts']);

        $publicData = [
            'name'            => $user->name,
            'created_at'      => $user->created_at,
            'public_profile'  => $user->publicProfile->only([
                'bio',
                'img',
                'view_option',
                'layout_option',
            ]),
            'public_prompts'  => $user->publicPrompts->map->only([
                'id',
                'title',
                'type',
                'content',
                'hero_image',
                'category_id',
                'created_at',
                'updated_at',
            ])->all(),
        ];

        // Returnér en view med data (brug evt. en Livewire-komponent eller en Blade-view)
        return view('blade_pages.public.profile_show_test', $publicData);
    }

    /**
     * vis specifik offentlig prompt
     */
    public function showPublicPrompt(string $profile, string $prompt)
    {
        // Find brugeren og dennes offentlige profil
        $user = User::where('name', $profile)->firstOrFail();
        // Hvis brugerens offentlige profil er deaktiveret
        if (!$user->publicProfile || !$user->publicProfile->is_active) {
            abort(404, 'Brugeren findes ikke');
        }

        // Her skal du hente den specifikke prompt baseret på $prompt
        // Eksempel (forudsætter en Prompt-model med en relation til User):
        $thePrompt = $user->publicPrompts()->where('id', $prompt)->firstOrFail();

        $user->load(['publicProfile']);

        $publicData = [
            'name'            => $user->name,
            'created_at'      => $user->created_at,
            'public_profile'  => $user->publicProfile->only([
                'bio',
                'img',
                'view_option',
                'layout_option',
            ]),
            'thePrompt'       => $thePrompt->only([
                'id',
                'title',
                'type',
                'content',
                'hero_image',
                'category_id',
                'created_at',
                'updated_at',
            ]),
        ];

        return view('blade_pages.public.prompt_show_test', $publicData);
    }

    /**
     * vis specifik uuid prompt
     */
    public function showUuidPrompt(string $prompt)
    {
        if (empty($prompt)) {
            abort(404, 'Prompten findes ikke');
        }

        $thePrompt = Prompt::where('share_url', $prompt)->firstOrFail();
        $user = $thePrompt->user;
        $user->load(['publicProfile']);

        $publicData = [
            'name'            => $user->name,
            'created_at'      => $user->created_at,
            'public_profile'  => $user->publicProfile->only([
                'bio',
                'img',
                'view_option',
                'layout_option',
            ]),
            'thePrompt'       => $thePrompt->only([
                'id',
                'title',
                'type',
                'content',
                'hero_image',
                'category_id',
                'created_at',
                'updated_at',
            ]),
        ];

        return view('blade_pages.public.prompt_show_test', $publicData);
    }

    /**
     * vis bestemt kategori på en brugers profil
     */
    public function showPublicCategory(string $profile, string $category_slug)
    {
        // Find brugeren og dennes offentlige profil
        $user = User::where('name', $profile)->firstOrFail();
        // Hvis brugerens offentlige profil er deaktiveret
        if (!$user->publicProfile || !$user->publicProfile->is_active) {
            abort(404, 'Brugeren findes ikke');
        }

        // Her skal du hente den specifikke kategori baseret på $category_slug
        // Eksempel (forudsætter en Category-model med en relation til User):
        $category = $user->categories()->where('slug', $category_slug)->firstOrFail();
        
        // Hent alle offentlige prompts tilhørende denne kategori
        $prompts = $category->prompts()->where('status', 'public')->get();

        // hvis kategorien ingen offentlige prompts har
        if (count($prompts) === 0) {
            abort(404);
        }

        $publicData = [
            'name'            => $user->name,
            'created_at'      => $user->created_at,
            'public_profile'  => $user->publicProfile->only([
                'bio',
                'img',
                'view_option',
                'layout_option',
            ]),
            'theCategory'       => $category->only([
                'id',
                'name',
                'img',
                'description',
                'slug',
                'created_at',
                'updated_at',
            ]),
            'public_prompts'  => $prompts->map->only([
                'id',
                'title',
                'type',
                'content',
                'hero_image',
                'category_id',
                'created_at',
                'updated_at',
            ])->all(),
        ];

        return view('blade_pages.public.category_show_test', $publicData);
    }
}