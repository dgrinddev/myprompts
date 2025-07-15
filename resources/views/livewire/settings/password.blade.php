<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new
#[Layout('components.layouts.app.settings', [
    'titleKey' => 'shared/title.livewire__settings__password',
    'headerKey' => 'layouts/settings.header.user__user_settings__password',
    'subHeaderKey' => 'layouts/settings.subHeader.user__user_settings__password',
])]
class extends Component {
    public string $current_password = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Update the password for the currently authenticated user.
     */
    public function updatePassword(): void
    {
        try {
            $validated = $this->validate([
                'current_password' => ['required', 'string', 'current_password'],
                'password' => ['required', 'string', Password::defaults()],
                'password_confirmation' => [
                    'required',
                    function ($attribute, $value, $fail) {
                        if ($value !== $this->password) {
                            $fail(__('validation.confirmed', ['attribute' => __('validation.attributes.password')]));
                        }
                    },
                ],
            ]);
        } catch (ValidationException $e) {
            $this->reset('current_password', 'password', 'password_confirmation');

            throw $e;
        }

        Auth::user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        $this->reset('current_password', 'password', 'password_confirmation');

        $this->dispatch('password-updated');
    }
}; ?>

<form
    wire:submit="updatePassword"
    class="flex flex-col gap-6"
>
    @csrf

    <x-shared.input.password
        wire:model="current_password"
        id="update_password_current_passwordpassword"
        label="{{ __('pages/user/settings/password.inputs.current_password.label') }}"
        type="password"
        name="current_password"
        required
        autocomplete="current-password"
        placeholder="{{ __('pages/user/settings/password.inputs.current_password.placeholder') }}"
    />

    <x-shared.input.password
        wire:model="password"
        id="update_password_password"
        label="{{ __('pages/user/settings/password.inputs.password.label') }}"
        type="password"
        name="password"
        required
        autocomplete="new-password"
        placeholder="{{ __('pages/user/settings/password.inputs.password.placeholder') }}"
    />

    <x-shared.input.password
        wire:model="password_confirmation"
        id="update_password_password_confirmation"
        label="{{ __('pages/user/settings/password.inputs.password_confirmation.label') }}"
        type="password"
        name="password_confirmation"
        required
        autocomplete="new-password"
        placeholder="{{ __('pages/user/settings/password.inputs.password_confirmation.placeholder') }}"
    />

    {{-- Submit button --}}
    <x-layouts.app.settings.components.submit-btn on="password-updated" />

</form>