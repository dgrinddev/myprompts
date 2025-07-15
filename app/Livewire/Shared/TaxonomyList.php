<?php

namespace App\Livewire\Shared;

use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

class TaxonomyList extends Component
{
    public array $collapsibleItem;
    public string $routeName = '';
    public int $currentRouteCategoryId = 0;

    public function mount(array $collapsibleItem)
    {
        $this->collapsibleItem = $collapsibleItem;
        $this->routeName = request()->route()->getName();
        if ($this->routeName === 'user.user-categories.show') {
            $categoryId = request()->route('category')?->id;
            $this->currentRouteCategoryId = $categoryId;
        }
    }

    #[Computed]
    public function categories()
    {
        return auth()->user()
            ->categories()
            ->select('id', 'name')
            ->withCount('prompts')
            ->get();
    }
    
    #[On('taxonomy-deleted')]
    #[On('taxonomy-saved')]
    #[On('prompt-deleted')]
    public function refreshCategories(string $taxonomyType, int $id, string $action): void
    {
        // Nulstil cachen så værdien genberegnes ved næste render
        unset($this->categories);
    }

    public function render()
    {
        return view('livewire.shared.taxonomy-list');
    }
}
