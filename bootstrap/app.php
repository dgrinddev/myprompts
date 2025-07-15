<?php

use App\Http\Middleware\EnsureUserHasRole;
use App\Http\Middleware\EnsurePromptBelongsToUser;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: [
            __DIR__ . '/../routes/public/blog.php',
            __DIR__ . '/../routes/public/public-pages.php',
            __DIR__ . '/../routes/public/public-profiles.php',
            __DIR__ . '/../routes/auth.php',
            __DIR__ . '/../routes/web.php',
        ],
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        then: function () {
            Route::middleware(['web', 'auth'])
                ->prefix('user')
                // ->name('user.')
                ->group(function () {
                    require base_path('routes/user/user-categories.php');
                    require base_path('routes/user/user-pages.php');
                    require base_path('routes/user/user-profile-settings.php');
                    require base_path('routes/user/user-prompts.php');
                    require base_path('routes/user/user-settings.php');
                    require base_path('routes/user/user-tags.php');
                });
            Route::middleware(['web', 'auth', 'EnsureUserHasRole:admin'])
                ->prefix('admin')
                // ->name('admin.')
                ->group(function () {
                    require base_path('routes/admin/admin-pages.php');
                    require base_path('routes/admin/admin-settings.php');
                });
        },
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->redirectUsersTo('/user/prompts/all');
        $middleware->alias([
            'EnsureUserHasRole' => EnsureUserHasRole::class,
            'EnsurePromptBelongsToUser' => EnsurePromptBelongsToUser::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
