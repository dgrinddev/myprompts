<?php

use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth', [
    'titleKey' => 'shared/title.livewire__auth__login',
    'titleParams' => [],
    'authHeaderTitle' => 'login',
    'authHeaderDescription' => 'login',
    'authBottomNavLink_href' => 'register',
    'authBottomNavLink_prepend' => 'login',
    'authBottomNavLink_label' => 'shared/navigation_links.register',
    //'metaDescription' => __('shared/seo.metaDescription.livewire__auth__login'),
])] class extends Component {
    #[Validate('required|string|email')]
    public string $email = '';

    #[Validate('required|string')]
    public string $password = '';

    public bool $remember = false;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->ensureIsNotRateLimited();

        if (! Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey());
        Session::regenerate();

        $this->redirectIntended(default: route('user.user-prompts.all', absolute: false), navigate: true);
    }

    /**
     * Ensure the authentication request is not rate limited.
     */
    protected function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout(request()));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => __('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the authentication rate limiting throttle key.
     */
    protected function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->email).'|'.request()->ip());
    }
}; ?>

<div class="w-full">
    <form wire:submit="login" class="flex flex-col gap-6">
        @csrf

        {{-- Email Address --}}
        <x-shared.input.string-input
            wire:model="email"
            id="email"
            label="{{ __('pages/auth/register.email.label') }}"
            type="email"
            name="email"
            required
            autofocus
            autocomplete="email"
            placeholder="{{ __('pages/auth/register.email.placeholder') }}"
        />

        {{-- Password --}}
        <div class="relative">
            {{--
            <a
                class="absolute right-0 top-0 font-medium text-on-surface dark:text-on-surface-dark underline-offset-2 hover:text-on-surface-strong focus:outline-hidden focus:underline dark:hover:text-primary-dark transition text-sm"
                href="{{ some link here... }}"
                wire:navigate
            >
                {{ __('pages/auth/login.password.forgot_password_link') }}
            </a>
            --}}

            <x-shared.input.password
                wire:model="password"
                id="password"
                label="{{ __('pages/auth/register.password.label') }}"
                type="password"
                name="password"
                required
                autocomplete="current-password"
                placeholder="{{ __('pages/auth/register.password.placeholder') }}"
            />
        </div>

        {{-- Remember Me --}}
        {{--
        <x-shared.input.checkbox
            wire:model="remember"
            id="remember"
            label="{{ __('pages/auth/login.remember') }}"
        />
        --}}

        {{-- Submit button --}}
        <x-shared.button
            buttonColor="primary"
            type="submit"
            id="submit_btn"
            label="{{ __('pages/auth/login.submit_btn') }}"
        />
    </form>
</div>