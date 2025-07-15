<?php

namespace App\Livewire\User;

use App\Models\Prompt;
use Illuminate\Database\Query\Builder;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

class PromptForm extends Component
{
    public Prompt $prompt; 
    public $title = '';
    public $type = '';
    public $content = '';
    public $category_id;
    public string $routeName;

    public function mount(Prompt $prompt)
    {
        $this->routeName = request()->route()->getName();

        if ($prompt->exists) {
            $this->authorize('update', $prompt);
            $this->title = $prompt->title;
            $this->type = $prompt->type;
            $this->content = $prompt->content;
            $this->category_id = $prompt->category_id;
        } else {
            $this->authorize('create', $prompt);
        }

        $this->prompt = $prompt;
    }

    #[On('taxonomy-saved')]
    public function refreshTaxonomy(string $taxonomyType, int $id, string $action): void
    {
        if ($taxonomyType === 'category') {
            // Nulstil cachen så værdien genberegnes ved næste render
            unset($this->allCategories);
        }
    }

    #[On('taxonomy-deleted')]
    public function removeTaxonomy(string $taxonomyType, int $id, string $action): void
    {
        if ($taxonomyType === 'category' && $id == $this->category_id) {
            $this->category_id = null;

            // SE OM NEDESTÅENDE ER NØDVENDIGT NÅR VI KOMMER TIL AT BRUGE CACHE:
            // Nulstil cachen så værdien genberegnes ved næste render
            // unset($this->allCategories);
        }
    }

    protected function rules()
    {
        return [
            'title' => [
                'required',
                'string',
                'max:100',
                Rule::unique('prompts')
                    ->ignore($this->prompt)
                    ->where(fn(Builder $query) => $query->where('user_id', auth()->id())),
            ],
            'type' => [
                'required',
                Rule::in(['text', 'image', 'other']),
            ],
            'content' => [
                'required',
                'string',
                'max:10000',
            ],
            'category_id' => [
                'nullable',
                Rule::in($this->allCategories()->pluck('value')->all()),
            ],
        ];
    }

    #[Computed]
    public function allCategories()
    {
        return auth()->user()
            ->categories()
            ->select('id as value', 'name as text')
            ->get();
    }

    public function save()
    {
        $validated = $this->validate();
        $this->prompt->fill($validated);
        $this->prompt->user_id ??= auth()->id();
        $this->prompt->save();

        //session()->flash('status', 'successfully'); 
        return $this->redirectRoute('user.user-prompts.all', navigate: true);
    }

    public function render()
    {
        $titleKey = match ($this->routeName) {
            'user.user-prompts.create' => 'shared/title.user__user_prompts__create',
            'user.user-prompts.edit' => 'shared/title.user__user_prompts__edit',
            default => 'shared/title.livewire__user__prompt_form',
        };
        $titleParams = [];

        $headerKey = match ($this->routeName) {
            'user.user-prompts.create' => 'pages/user/prompt-form.header.user__user_prompts__create',
            'user.user-prompts.edit' => 'pages/user/prompt-form.header.user__user_prompts__edit',
        };
        $headerParams = [];

        $showSearch = false;

        return view('livewire.user.prompt-form', compact(
                'headerKey',
                'headerParams',
                /*
                'subHeaderKey',
                'subHeaderParams',
                */
            ))
            ->layout('components.layouts.app', compact(
                'titleKey',
                'titleParams',
                'showSearch',
            ));
    }
}