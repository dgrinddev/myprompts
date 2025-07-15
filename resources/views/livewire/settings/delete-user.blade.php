<?php

use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new
#[Layout('components.layouts.app.settings', [
    'titleKey' => 'shared/title.livewire__settings__delete_user',
    'headerKey' => 'layouts/settings.header.user__user_settings__delete_user',
    'subHeaderKey' => 'layouts/settings.subHeader.user__user_settings__delete_user',
])]
class extends Component {
    public string $password = '';

    /**
     * Delete the currently authenticated user.
     */
    public function deleteUser(Logout $logout): void
    {
        $this->validate([
            'password' => ['required', 'string', 'current_password'],
        ]);

        tap(Auth::user(), $logout(...))->delete();

        $this->redirect(route('public.public-pages.home', absolute: false), navigate: true);
    }
}; ?>

<div>
    <p class="mb-4 space-x-1 text-sm text-on-surface/75 dark:text-on-surface-dark/75">
        {{ __('pages/user/settings/delete-user.warningOutsideModal') }}
    </p>

    <x-shared.button
        x-data
        x-on:click="$dispatch('open-modal', { id: 'delete-user-modal' });"
        buttonColor="danger"
        class="bg-danger text-on-danger"
        label="{{ __('pages/user/settings/delete-user.openModalBtn_deleteUser') }}"
    />

    <x-shared.modal.modal
        id="delete-user-modal"
        defaultHeaderTitle="{{ __('pages/user/settings/delete-user.modal.headerTitle') }}"
    >
        <p class="pl-0.5 mb-3 space-x-1 text-sm text-on-surface/75 dark:text-on-surface-dark/75">
            {{ __('pages/user/settings/delete-user.modal.warningInsideModal') }}
        </p>

        <form
            wire:submit="deleteUser"
            class="flex flex-col gap-6"
            id="delete-user-form"
        >
            @csrf

            <x-shared.input.password
                wire:model="password"
                id="password"
                label="{{ __('pages/user/settings/delete-user.modal.password.label') }}"
                type="password"
                name="password"
                required
                placeholder="{{ __('pages/user/settings/delete-user.modal.password.placeholder') }}"
            />
        </form>

        <x-slot:footer>
            <x-shared.button
                x-data
                x-on:click="$dispatch('close-modal', { id: 'delete-user-modal' });"
                buttonColor="secondary"
                buttonStyle="outline"
                label="{{ __('pages/user/settings/delete-user.modal.cancel_btn') }}"
            />
            <x-shared.button
                type="submit"
                label="{{ __('pages/user/settings/delete-user.modal.submit_btn') }}"
                form="delete-user-form"
                buttonColor="danger"
            />
        </x-slot>
    </x-shared.modal.modal>
</div>