<?php
$appName = config('app.name');

return ['content' => <<<TEXT
Welcome! Click the pencil button to read how {$appName} works. (On desktop: move your mouse over this card to reveal the buttons). [...After clicking the pencil button: ⬇️ SCROLL DOWN ⬇️
⬇️ SCROLL DOWN ⬇️
⬇️ SCROLL DOWN ⬇️
...to read more about how to use {$appName} to create and organize your prompts easily.]

___________________________

# Getting Started with {$appName}
___________________________

## Navigation Overview

**Sidebar Navigation:**
Your main navigation is located in the sidebar on the left side of the screen (on mobile devices, tap the button in the top-left corner to access the sidebar). In the sidebar, you'll find:
- The {$appName} logo (click to go to :homepage)
- A search field to quickly find specific prompts (only on pages for viewing a list of prompts)
- Main navigation links:
  - ":promptsSideNavbar_linkItems_createPrompt" - Create a new prompt (on mobile: this button will be located in the top-right corner)
  - ":promptsSideNavbar_linkItems_allPrompts" - View all your prompts
  - ":promptsSideNavbar_linkItems_uncategorizedPrompts" - View prompts without categories

**":categoriesBtnLabel"-button in the sidebar:**
Below the main navigation links, you'll see a ":categoriesBtnLabel"-button that you can click to expand/collapse a list of all your categories. Here you can:
- View all your custom categories with prompt counts
- Click any category to see prompts within it
- Use the "+" button to create a new category (on mobile: first click on the ":categoriesBtnLabel"-button to expand the list of categories and then it will appear)
- Edit a category by hovering the mouse over a category and click on the pencil-button that will appear (on mobile: first click on the category and then the pencil-button will appear when you open the sidebar again)
- Delete a category by clicking the ":categoryForm_deleteBtn"-button in the category edit form

**Mobile Sidebar:**
On mobile devices, close the sidebar by tapping anywhere in the blurred area outside the sidebar.

**:profileMenu:**
At the bottom of the sidebar, you'll see your :profileMenu button. When you click it you'll see these navigation links:
- ":profileDropdown_settings_profile" - Update your username (lowercase letters, numbers, underscores only) or change your email address
- ":profileDropdown_settings_password" - Change your password  
- ":profileDropdown_settings_appearance" - Switch between light/dark mode
- ":profileDropdown_settings_deleteUser" - Permanently delete your account and all data (this action cannot be undone)
- ":profileDropdown_logout" - Sign out of your account

**How to exit setting-pages:**
When you're in the settings area, use the ":backToPrompts"-link in the sidebar to return to your prompt overview.

---

## Managing Your Prompts

**Prompt Overview:**
When you view your prompts (through ":promptsSideNavbar_linkItems_allPrompts", ":promptsSideNavbar_linkItems_uncategorizedPrompts", or any category), you'll see your prompts displayed as cards. Each prompt card shows:
- A small icon indicating the prompt type (text, image, or other)
- The prompt title
- An excerpt of the prompt content
- A category badge (if the prompt has a category assigned)
- The creation date

**Prompt Actions:**
When you hover over a prompt card (or on mobile, the buttons are always visible), you'll see action buttons:
- ":promptCard_copy" button - Copies the full prompt content to your clipboard with one click
- ":promptCard_edit" button - Opens the prompt for editing
- ":promptCard_delete" button - Deletes the prompt (with confirmation)

**Search Functionality:**
Use the search field in the sidebar to quickly find specific prompts. The search will look through both prompt titles and content to help you locate what you need.

---

## Creating and Editing Prompts

**Creating a New Prompt:**
Click ":promptsSideNavbar_linkItems_createPrompt" in the sidebar (on mobile: look for this button in the top-right corner) to create a new prompt. You'll see a form with these fields:
- ":promptForm_title" - Give your prompt a descriptive name
- ":promptForm_type" - Choose between:
  - ":promptForm_type_text" for text generation prompts
  - ":promptForm_type_image" for image generation prompts  
  - ":promptForm_type_other" for any other type of prompt
- ":promptForm_category" - Optionally assign the prompt to a category (use the "+" button to create a new category on the fly)
- ":promptForm_content" - The actual prompt text/content

**Editing Existing Prompts:**
Click the ":promptCard_edit" button on any prompt card to modify it. You'll see the same form as when creating, but pre-filled with the current values.

**Saving Your Work:**
Click ":promptForm_submitCreate" or ":promptForm_submitUpdate" to save your prompt. You'll be redirected back to your prompt overview.

---

## Organizing with Categories

**Creating Categories:**
You can create categories in several ways:
- Use the "+" button next to the ":categoriesBtnLabel"-button in the sidebar
- Use the "+" button in the category dropdown when creating/editing a prompt
- Both options open the same category creation form

**Category Form:**
When creating or editing a category, you'll see:
- ":categoryForm_name" - The display name for your category
- ":categoryForm_description" - A brief description of what this category contains
- ":categoryForm_slug" - A URL-friendly identifier (lowercase letters, numbers, underscores, hyphens only)

**Managing Categories:**
- Edit any category by hovering over it in the sidebar and clicking the pencil button (on mobile: first click on the category and then the pencil-button will appear when you open the sidebar again)
- View all prompts in a category by clicking on the category name
- Category names in the sidebar show the number of prompts they contain

---

## Tips for Getting Started

1. **Start Simple:** Create a few basic prompts to get familiar with the interface
2. **Use Categories:** Even with just a few prompts, categories help keep things organized
3. **Descriptive Titles:** Use clear, descriptive titles so you can quickly identify prompts later
4. **Try the Search:** Test the search functionality to see how easily you can find specific prompts
5. **Copy Feature:** The one-click copy feature is perfect for quickly using your prompts in AI tools like ChatGPT or Midjourney
6. **Mobile-Friendly:** The interface works well on both desktop and mobile devices - try both to see what works best for your workflow

---

## Ready to Start!

This guide covers all the features of {$appName}. Feel free to copy this content to your own note-taking app for quick reference, then delete this example prompt to start with a clean workspace.

Happy prompting! 🚀
TEXT,
];