<?php
// Alle routes i `routes/user/...` har både `web` og `auth` middleware, de har `/user` prefixed til deres url. se mere i `bootstrap/app.php`

use Illuminate\Support\Facades\Route;

/*
Route::get('/dashboard', function () { // `/user/dashboard` (har `/user` prefixed til url)
	return view('blade_pages.user.dashboard');
})->name('user.user-pages.dashboard');
*/