<?php

use App\Http\Controllers\PromptController;
use App\Livewire\User\PromptForm;
use App\Livewire\User\PromptList;
use Illuminate\Support\Facades\Route;

Route::livewire('/prompts/uncategorized', PromptList::class)
	->name('user.user-prompts.uncategorized');

Route::livewire('/prompts/all', PromptList::class)
	->name('user.user-prompts.all');

Route::livewire('/prompts/create', PromptForm::class) // `/user/prompts/create` (har `/user` prefixed til url)
	->name('user.user-prompts.create');

Route::livewire('/prompts/{prompt}/edit', PromptForm::class) // `/user/prompts/{prompt}/edit`
	->name('user.user-prompts.edit');

/*
Route::get('/prompts/{prompt}', [PromptController::class, 'show']) // `/user/prompts/{prompt}`
	//->middleware('EnsurePromptBelongsToUser')
	->name('user.user-prompts.prompt_show_test'); // navnet bør ændres til user.user-prompts.show
*/