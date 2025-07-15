<?php

namespace App\Livewire\Shared;

use App\Models\Category;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Livewire\Attributes\On;
use Livewire\Component;

class CategoryForm extends Component
{
    public Category $category;
    public $name = '';
    public $description = '';
    public $slug = '';
    public string $currentRoute = '';
    public int $currentRouteCategoryId = 0;

    private function loadCategory(?int $categoryId): void
    {
        $this->category = $categoryId
            ? Category::where('id', $categoryId)
            ->where('user_id', auth()->id())
            ->firstOrFail()
            : new Category;
    }

    public function mount(?int $categoryId = null): void
    {
        $this->loadCategory($categoryId);
    }

    protected function rules()
    {
        return [
            'name' => [
                'required',
                'string',
                'max:50',
                Rule::unique('categories')
                    ->ignore($this->category->id)
                    ->where(fn(Builder $query) => $query->where('user_id', auth()->id())),
            ],
            'description' => 'required|string|max:255',
            'slug' => [
                'required',
                'string',
                'regex:/^[a-z0-9_-]+$/',
                'max:50',
                Rule::unique('categories')
                    ->ignore($this->category->id)
                    ->where(fn(Builder $query) => $query->where('user_id', auth()->id())),
            ],
        ];
    }

    #[On('add-taxonomy')]
    public function addTaxonomy(): void
    {
        $this->resetValidation();
        $this->reset();
        $this->loadCategory(null);
    }

    #[On('edit-taxonomy')]
    public function updateTaxonomy(int $id, string $currentRoute, int $currentRouteCategoryId): void // fillEditForm($data, $taxonomyType)
    {
        $this->resetValidation();
        $this->reset();
        $this->currentRoute = $currentRoute;
        $this->currentRouteCategoryId = $currentRouteCategoryId;
        $this->loadCategory($id);
        $this->name = $this->category->name;
        $this->description = $this->category->description;
        $this->slug = $this->category->slug;
    }

    public function save()
    {
        $validated = $this->validate();
        $this->dispatch(
            'close-modal',
            id: 'taxonomy-modal',
        );
        $this->category->fill($validated);
        $this->category->user_id ??= auth()->id();
        $this->category->save();
        $this->dispatch(
            'taxonomy-saved',
            taxonomyType: 'category',
            id: $this->category->id,
            action: $this->category->exists ? 'update' : 'create', // 'delete'|'update'|'create'
        );
    }

    public function delete()
    {
        $deletedCategoryId = $this->category->id;
        if ($this->category->exists) {
            $this->dispatch(
                'close-modal',
                id: 'taxonomy-modal',
            );
            $this->category->delete();
            $this->dispatch(
                'taxonomy-deleted',
                taxonomyType: 'category',
                id: $deletedCategoryId,
                action: 'delete', // 'delete'|'update'|'create'
            );

            if (
                $this->currentRoute === 'user.user-categories.show'
                && $this->currentRouteCategoryId === $deletedCategoryId
            ) {
                return $this->redirect(route('user.user-prompts.uncategorized', absolute: false), navigate: false);
            }
        }
    }

    public function render()
    {
        return view('livewire.shared.category-form');
    }
}
