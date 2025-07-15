<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new
#[Layout('components.layouts.app.settings', [
    'titleKey' => 'shared/title.livewire__settings__profile',
    'headerKey' => 'layouts/settings.header.user__user_settings__profile',
    'subHeaderKey' => 'layouts/settings.subHeader.user__user_settings__profile',
])]
class extends Component {
    public string $name = '';
    public string $email = '';

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
    }

    /**
     * Update the profile information for the currently authenticated user.
     */
    public function updateProfileInformation(): void
    {
        $user = Auth::user();

        $validated = $this->validate([ 
            'name' => [
                'required',
                'string',
                'min:4',
                'max:20',
                'regex:/^[a-z0-9_]+$/',
                Rule::unique(User::class)->ignore($user->id),
            ],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($user->id),
            ],
        ]);

        $user->fill($validated);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        $this->dispatch('profile-updated', name: $user->name);
    }

    /**
     * Send an email verification notification to the current user.
     */
    public function resendVerificationNotification(): void
    {
        $user = Auth::user();

        if ($user->hasVerifiedEmail()) {
            $this->redirectIntended(default: route('user.user-prompts.all', absolute: false));

            return;
        }

        $user->sendEmailVerificationNotification();

        Session::flash('status', 'verification-link-sent');
    }
}; ?>

<form
    wire:submit="updateProfileInformation"
    class="flex flex-col gap-6"
>
    @csrf

    {{-- name --}}
    <x-shared.input.string-input
        wire:model="name"
        id="name"
        label="{{ __('pages/user/settings/profile.inputs.name.label') }}"
        type="text"
        name="name"
        required
        autofocus
        autocomplete="name"
        placeholder="{{ __('pages/user/settings/profile.inputs.name.placeholder') }}"
        outerClass=""
    />

    {{-- email --}}
    <x-shared.input.string-input
        wire:model="email"
        id="email"
        label="{{ __('pages/user/settings/profile.inputs.email.label') }}"
        type="email"
        name="email"
        required
        autocomplete="email"
        placeholder="{{ __('pages/user/settings/profile.inputs.email.placeholder') }}"
        outerClass=""
    >
        @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail &&! auth()->user()->hasVerifiedEmail())
            <div class="pl-0.5 mt-1 space-x-1 text-sm text-on-surface/75 dark:text-on-surface-dark/75">
                {{ __('pages/user/settings/profile.inputs.email.emailIsUnverified') }}
                <span></span>
                <button
                    type="button"
                    wire:click.prevent="resendVerificationNotification"
                    class="font-medium text-on-surface dark:text-on-surface-dark underline-offset-2 hover:text-on-surface-strong focus:outline-hidden focus:underline dark:hover:text-primary-dark transition text-sm cursor-pointer"
                >
                    {{ __('pages/user/settings/profile.inputs.email.resendVerificationEmail') }}
                </button>
            </div>
            @if (session('status') === 'verification-link-sent')
                <small class="pl-0.5 text-success text-sm mt-1 font-medium">{{ __('pages/user/settings/profile.inputs.email.verificationEmailSent') }}</small>
            @endif
        @endif
    </x-shared.input.string-input>

    {{-- Submit button --}}
    <x-layouts.app.settings.components.submit-btn on="profile-updated" />

</form>