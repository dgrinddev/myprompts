<?php

namespace App\Observers;

use App\Models\PublicProfile;
use App\Models\User;
use App\Models\UserSetting;

class UserObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        if (!$user->publicProfile()->exists()) {
            PublicProfile::create(['user_id' => $user->id]);
        }
        if (!$user->settings()->exists()) {
            UserSetting::create(['user_id' => $user->id]);
        }

        // Opret "Getting Started" kategori
        $category = $user->categories()->create([
            'name' => __('other/getting-started/getting-started.category.name'),
            'description' => __('other/getting-started/getting-started.category.description'),
            'slug' => __('other/getting-started/getting-started.category.slug'),
        ]);

        // Forbered oversættelsesparametre for content i velkomst prompt
        $translationParams = [
            'homepage' => __('shared/navigation_links.public__public_pages__home'),
            'promptsSideNavbar_linkItems_createPrompt' => __('shared/navigation_links.user__user_prompts__create'),
            'promptsSideNavbar_linkItems_allPrompts' => __('shared/navigation_links.user__user_prompts__all.default'),
            'promptsSideNavbar_linkItems_uncategorizedPrompts' => __('shared/navigation_links.user__user_prompts__uncategorized'),
            'categoriesBtnLabel' => __('layouts/app.sideNavbar.collapsibleItems.sideNavbar_collapsibleItem_categories.btnLabel'),
            'profileMenu' => __('layouts/app.topNavbar.profileDropdown.srOnly'),
            'profileDropdown_settings_profile' => __('shared/navigation_links.user__user_settings__profile'),
            'profileDropdown_settings_password' => __('shared/navigation_links.user__user_settings__password'),
            'profileDropdown_settings_appearance' => __('shared/navigation_links.user__user_settings__appearance'),
            'profileDropdown_settings_deleteUser' => __('shared/navigation_links.user__user_settings__delete_user'),
            'profileDropdown_logout' => __('shared/navigation_links.logout'),
            'promptCard_copy' => __('pages/user/prompt-list.promptCard.copy.title'),
            'promptCard_edit' => __('pages/user/prompt-list.promptCard.edit.title'),
            'promptCard_delete' => __('pages/user/prompt-list.promptCard.delete.title'),
            'promptForm_title' => __('pages/user/prompt-form.inputs.title.label'),
            'promptForm_type' => __('pages/user/prompt-form.inputs.type.outerlabel'),
            'promptForm_type_text' => __('pages/user/prompt-form.inputs.type.label.text'),
            'promptForm_type_image' => __('pages/user/prompt-form.inputs.type.label.image'),
            'promptForm_type_other' => __('pages/user/prompt-form.inputs.type.label.other'),
            'promptForm_category' => __('pages/user/prompt-form.inputs.category_id.label'),
            'promptForm_content' => __('pages/user/prompt-form.inputs.content.label'),
            'promptForm_submitCreate' => __('pages/user/prompt-form.inputs.submit_btn.create'),
            'promptForm_submitUpdate' => __('pages/user/prompt-form.inputs.submit_btn.update'),
            'categoryForm_name' => __('shared/category-form.inputs.name.label'),
            'categoryForm_description' => __('shared/category-form.inputs.description.label'),
            'categoryForm_slug' => __('shared/category-form.inputs.slug.label'),
            'categoryForm_deleteBtn' => __('shared/category-form.delete_btn'),
            'backToPrompts' => __('shared/navigation_links.user__user_prompts__all.backToPrompts'),
        ];

        // Opret velkomst prompt
        $prompt = $user->prompts()->create([
            'title' => __('other/getting-started/getting-started.prompt.title'),
            'type' => 'other',
            'content' => __('other/getting-started/prompt-content.content', $translationParams),
            'category_id' => $category->id,
        ]);
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        //
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}
