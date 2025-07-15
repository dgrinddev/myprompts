<?php

use App\Livewire\User\PromptList;
use Illuminate\Support\Facades\Route;

Route::get('/categories/{category}', PromptList::class)
	->name('user.user-categories.show');
