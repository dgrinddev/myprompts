<?php

namespace App\Livewire\User;

use App\Models\Category;
use App\Models\Prompt;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

class PromptList extends Component
{
    public Category $category;
    public string $routeName = '';
    public string $search = '';

    public function mount(Category $category)
    {
        $this->search = substr(request()->query('search', ''), 0, 100);
        $this->routeName = request()->route()->getName();
        if ($this->routeName === 'user.user-categories.show' && $category->exists) {
            $this->authorize('view', $category);
            $this->category = $category;
        }
    }

    public function deletePrompt(int $id): void
    {
        $prompt = Prompt::findOrFail($id);
        $this->authorize('delete', $prompt);
        $prompt->delete();
        $this->dispatch(
            'prompt-deleted',
            taxonomyType: '',
            id: 0,
            action: '',
        );
    }

    #[Computed]
    public function prompts()
    {
        if ($this->routeName === 'user.user-categories.show' && $this->category->exists) {
            $prompts = $this->category->prompts();
        } elseif ($this->routeName === 'user.user-prompts.uncategorized') {
            $prompts = auth()->user()->prompts()->whereNull('category_id');
        } else { /* ($this->routeName === 'user.user-prompts.all') */
            $prompts = auth()->user()->prompts();
        }

        $prompts->select('id', 'title', 'type', 'content', 'excerpt', 'created_at', 'updated_at', 'category_id');
        $prompts->with(['category:id,name,slug']);

        if ($this->search !== '') {
            $prompts->where(function (Builder $query) {
                $query->whereLike('title', "%{$this->search}%")
                ->orWhereLike('content', "%{$this->search}%");
            });
        }

        $prompts->latest();
        return $prompts->get();
    }

    #[On('searchUpdated')]
    public function updateSearch(string $search): void
    {
        $this->search = $search;
    }

    #[On('taxonomy-deleted')]
    #[On('taxonomy-saved')]
    public function refreshPrompts(string $taxonomyType, int $id, string $action): void
    {
    }

    public function render()
    {
        $promptCount = $this->prompts->count();

        $titleKey = match ($this->routeName) {
            'user.user-prompts.all' => 'shared/title.user__user_prompts__all',
            'user.user-prompts.uncategorized' => 'shared/title.user__user_prompts__uncategorized',
            'user.user-categories.show' => 'shared/title.user__user_categories__show',
            default => 'shared/title.livewire__user__prompt_list',
        };
        $titleParams = [
            'count' => $promptCount,
        ];
        /*
        $attributes = [
            'data-random' => 'randomvalue',
            'class' => 'randomclass',
        ];
        */

        $headerKey = match ($this->routeName) {
            'user.user-prompts.all' => 'pages/user/prompt-list.header.user__user_prompts__all',
            'user.user-prompts.uncategorized' => 'pages/user/prompt-list.header.user__user_prompts__uncategorized',
            'user.user-categories.show' => 'pages/user/prompt-list.header.user__user_categories__show',
        };
        $headerParams = [
        ];

        $afterHeader = '';
        $afterHeaderHTML = '';
        if ($this->routeName === 'user.user-categories.show' && $this->category->exists) {
            $afterHeader = $this->category->name;
            $afterHeaderHTML = '"';
        }

        $subHeaderKey = '';
        $subHeaderParams = [];
        $afterSubHeader = '';
        $afterSubHeaderHTML = '';
        if ($this->search !== '') {
            $subHeaderKey = 'pages/user/prompt-list.subHeader.search';
            /*
            $subHeaderParams = [
                'search' => $this->search,
            ];
            */
            $afterSubHeader = $this->search;
            $afterSubHeaderHTML = '"';
        }

        return view('livewire.user.prompt-list', compact(
                'headerKey',
                'promptCount',
                'headerParams',
                'afterHeader',
                'afterHeaderHTML',
                'subHeaderKey',
                'subHeaderParams',
                'afterSubHeader',
                'afterSubHeaderHTML',
            ))
            ->layout('components.layouts.app', compact(
                'titleKey',
                'titleParams',
                //'attributes',
            ));
    }
}