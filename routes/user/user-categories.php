<?php

use App\Livewire\User\PromptList;
use Illuminate\Support\Facades\Route;

Route::livewire('/categories/{category}', PromptList::class)
	->name('user.user-categories.show');
