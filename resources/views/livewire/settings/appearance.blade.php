<?php

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new
#[Layout('components.layouts.app.settings', [
    'titleKey' => 'shared/title.livewire__settings__appearance',
    'headerKey' => 'layouts/settings.header.user__user_settings__appearance',
    'subHeaderKey' => 'layouts/settings.subHeader.user__user_settings__appearance',
])]
class extends Component {
    public string $color_mode = '';

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $this->color_mode = Auth::user()->settings->color_mode;
    }

    /**
     * Update the color_mode for the currently authenticated user.
     */
    public function updateColorMode()
    {
        $userSettings = Auth::user()->settings;

        $validated = $this->validate([ 
            'color_mode' => [
                'required',
                Rule::in(['light', 'dark', 'system']),
            ],
        ]);

        $userSettings->fill($validated);

        $userSettings->save();

        // Tving siden til at reloade
        return redirect(request()->header('Referer'));
        
        /*
        $this->dispatch('color_mode-updated', color_mode: $this->color_mode);
        */
    }
}; ?>

<form
    class="flex flex-col gap-6"
>
    @csrf

    @php
        $choices = [
            [
                'id' => 'color_mode_light',
                'label' => __('pages/user/settings/appearance.inputs.color_mode.label.light'),
                'checked' => false,
                'value' => 'light',
            ],
            [
                'id' => 'color_mode_dark',
                'label' => __('pages/user/settings/appearance.inputs.color_mode.label.dark'),
                'checked' => false,
                'value' => 'dark',
            ],
            /*
            [
                'id' => 'color_mode_system',
                'label' => __('pages/user/settings/appearance.inputs.color_mode.label.system'),
                'checked' => true,
                'value' => 'system',
            ],
            */
        ];
    @endphp

    <x-shared.input.radio.container
        wire:model.live="color_mode"
        wire:change="updateColorMode()"
        :choices="$choices"
        name="color_mode"
        labelclasses="!min-w-26 max-md:w-full! {{ count($choices) > 2 ? 'md:max-lg:w-1/2!' : 'md:max-lg:w-full!' }} lg:w-full!"
        outerclasses=""
        outerlabel="{{ __('pages/user/settings/appearance.inputs.color_mode.outerlabel') }}"
        choicesouterclasses="flex flex-col sm:flex-row {{ count($choices) > 2 ? 'md:flex-col' : 'md:flex-row' }} lg:flex-row gap-2"
        required
    />

    {{-- Submit button --}}
    {{--
    <x-layouts.app.settings.components.submit-btn on="appearance-updated" />
    --}}

</form>