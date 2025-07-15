<div @class(['hidden' => !$visible])>
    <x-shared.input.string-input
        wire:model.live="search"
        type="search"
        name="side-navbar-search"
        placeholder="{{ __('layouts/app.sideNavbar.searchField.placeholder') }}"
        icon="pui.search"
        aria_label="{{ __('layouts/app.sideNavbar.searchField.aria_label') }}"
        class="!py-1.5 !pl-9 !bg-surface dark:!bg-surface-dark/50"
        outerClass="my-4 max-w-xs"
        svgClass="!left-2"
        maxlength="100"
    />
</div>