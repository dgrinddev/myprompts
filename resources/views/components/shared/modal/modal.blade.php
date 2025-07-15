@props([
    'defaultHeaderTitle' => __('shared/components.modal.defaultHeaderTitle'),
    'id' => '',
])

<div
	x-data="{
    modalIsOpen: false,
    headerTitle: '',
    }"
	x-on:open-modal.window="
        if ($event.detail.id === '{{ $id }}') {
            modalIsOpen = true;
            headerTitle = $event.detail.headerTitle ?? '{{ $defaultHeaderTitle }}';
        }
    "
	x-on:close-modal.window="
        if ($event.detail.id === '{{ $id }}') {
            modalIsOpen = false;
        }
    "
>
    <div x-cloak x-show="modalIsOpen" x-transition.opacity.duration.200ms x-trap.inert.noscroll="modalIsOpen" x-on:keydown.esc.window="modalIsOpen = false" x-on:click.self="modalIsOpen = false" class="fixed inset-0 z-40 flex items-center justify-center bg-black/20 p-4 pb-8 backdrop-blur-md sm:items-center lg:p-8" role="dialog" aria-modal="true" aria-labelledby="modalTitle">
        <!-- Modal Dialog -->
        <div x-show="modalIsOpen" x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity" x-transition:enter-start="opacity-0 scale-50" x-transition:enter-end="opacity-100 scale-100" class="flex flex-col gap-4 overflow-hidden rounded-radius border border-outline bg-surface text-on-surface dark:border-outline-dark dark:bg-surface-dark-alt dark:text-on-surface-dark w-full max-w-sm">
            <!-- Dialog Header -->
            <div class="flex items-center justify-between border-b border-outline bg-surface-alt/60 p-4 dark:border-outline-dark dark:bg-surface-dark/20">
                <h3 x-text="headerTitle" id="{{ $id }}-modalTitle" class="font-semibold tracking-wide text-on-surface-strong dark:text-on-surface-dark-strong"></h3>
                <button x-on:click="modalIsOpen = false" aria-label="{{ __('shared/components.modal.closeBtn_ariaLabel') }}" class="cursor-pointer hover:text-secondary">
                    <x-shared.svg.icons.pui.x aria-hidden="true" stroke="currentColor" fill="none" stroke-width="1.4" class="w-5 h-5" />
                </button>
            </div>
            @if(isset($customBody))
                {{ $customBody }}
            @endif
            @if ($slot->hasActualContent())
                <x-shared.modal.modal-body-wrapper>
                    {{ $slot }}
                </x-shared.modal.modal-body-wrapper>
            @endif
            @if(isset($footer))
                <x-shared.modal.modal-footer-wrapper>
                    {{ $footer }}
                </x-shared.modal.modal-footer-wrapper>
            @endif
        </div>
    </div>
</div>