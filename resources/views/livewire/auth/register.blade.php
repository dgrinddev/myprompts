<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth', [
    'titleKey' => 'shared/title.livewire__auth__register',
    'titleParams' => [],
    'authHeaderTitle' => 'register',
    'authHeaderDescription' => 'register',
    'authBottomNavLink_href' => 'login',
    'authBottomNavLink_prepend' => 'register',
    'authBottomNavLink_label' => 'shared/navigation_links.login',
    //'metaDescription' => __('shared/seo.metaDescription.livewire__auth__register'),
])] class extends Component {
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';
    public bool $accept_terms = false;

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([ 
            'name' => [
                'required',
                'string',
                'min:4',
                'max:20',
                'regex:/^[a-z0-9_]+$/',
                'unique:'.User::class
            ],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', Rules\Password::defaults()],
            'password_confirmation' => [
                'required',
                function ($attribute, $value, $fail) {
                    if ($value !== $this->password) {
                        $fail(__('validation.confirmed', ['attribute' => __('validation.attributes.password')]));
                    }
                },
            ],
            'accept_terms' => ['required', 'accepted'],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered(($user = User::create($validated))));

        Auth::login($user);

        $this->redirect(route('user.user-prompts.all', absolute: false), navigate: true);
    }
}; ?>

<div class="w-full">
    {{--
    @prepend('head')
        @vite('resources/css/pages/auth/register.css')
    @endprepend
    
    <x-slot:aboveSessionStatus>
        <div class="text-center text-sm text-gray-600">
            {{ __('pages/auth/verify-email.verify_your_email') }}
        </div>
    </x-slot>
    --}}

    <form wire:submit="register" class="{{-- w-full --}} flex flex-col gap-6">
        @csrf

        {{-- Username --}}
        <x-shared.input.string-input
            wire:model="name"
            id="name"
            label="{{ __('pages/auth/register.name.label') }}"
            type="text"
            name="name"
            required
            autofocus
            autocomplete="name"
            placeholder="{{ __('pages/auth/register.name.placeholder') }}"
        />
        
        {{-- Email Address --}}
        <x-shared.input.string-input
            wire:model="email"
            id="email"
            label="{{ __('pages/auth/register.email.label') }}"
            type="email"
            name="email"
            required
            autocomplete="email"
            placeholder="{{ __('pages/auth/register.email.placeholder') }}"
        />

        {{-- Password --}}
        <x-shared.input.password
            wire:model="password"
            id="password"
            label="{{ __('pages/auth/register.password.label') }}"
            type="password"
            name="password"
            required
            autocomplete="new-password"
            placeholder="{{ __('pages/auth/register.password.placeholder') }}"
        />

        {{-- Confirm Password --}}
        <x-shared.input.password
            wire:model="password_confirmation"
            id="password_confirmation"
            label="{{ __('pages/auth/register.password_confirmation.label') }}"
            type="password"
            name="password_confirmation"
            required
            autocomplete="new-password"
            placeholder="{{ __('pages/auth/register.password_confirmation.placeholder') }}"
        />

        {{-- Accept Terms & Privacy Policy --}}
        <x-shared.input.checkbox
            wire:model="accept_terms"
            id="accept_terms"
            name="accept_terms"
            required
            labelHTML="{!! __('pages/auth/register.accept_terms.label', ['route_privacy' => route('public.public-pages.cookies-and-privacy-policy'), 'route_terms' => route('public.public-pages.terms-of-use')]) !!}"
            :hasCheckedStrongStyling="false"
        />

        {{-- Submit button --}}
        <x-shared.button
            buttonColor="primary"
            type="submit"
            id="submit_btn"
            label="{{ __('pages/auth/register.submit_btn') }}"
        />
    </form>

</div>