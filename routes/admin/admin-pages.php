<?php
// Alle routes i `routes/admin/...` har både `web`, `auth` og EnsureUserHasRole::class.':admin' middleware, de har `/admin` prefixed til deres url. se mere i `bootstrap/app.php`

use App\Livewire\Admin\UsersOverview;
use Illuminate\Support\Facades\Route;

Route::get('/admin-dashboard', function () { // `/admin/admin-dashboard` (har `/admin` prefixed til url)
	return view('blade_pages.admin.admin-dashboard');
})->name('admin.admin-pages.admin-dashboard');

Route::get('/users-overview', UsersOverview::class)
	->name('admin.admin-pages.users-overview');
