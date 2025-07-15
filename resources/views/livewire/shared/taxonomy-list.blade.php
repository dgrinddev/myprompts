<div>
    <ul
        x-cloak
        x-collapse
        x-show="isExpanded"
        aria-labelledby="{{ $collapsibleItem['id'] }}-btn"
        id="{{ $collapsibleItem['id'] }}"
    >
        @forelse ($this->categories as $category)
            @php
                $isCurrent = $this->routeName === 'user.user-categories.show' && $this->currentRouteCategoryId === $category->id;
            @endphp
            <li class="px-1 py-0.5 first:mt-2 relative group" :key="'category-'.$category->id">
                <a wire:navigate href="{{ route('user.user-categories.show', ['category' => $category->id]) }}" class="{{ $isCurrent ? 'text-on-surface-strong bg-primary/10 dark:text-on-surface-dark-strong dark:bg-primary-dark/10' : 'text-on-surface group-hover:bg-primary/5 group-hover:text-on-surface-strong dark:text-on-surface-dark dark:group-hover:text-on-surface-dark-strong dark:group-hover:bg-primary-dark/5' }} flex items-center rounded-radius gap-2 px-2 py-1.5 text-sm underline-offset-2 focus:outline-hidden focus-visible:underline">
                    <span class="{{ $isCurrent ? 'pe-7' : 'group-hover:pe-7' }} truncate group-hover:pe-7">{{ $category->name }}</span>
                    <span class="{{ $isCurrent ? 'hidden' : 'block group-hover:hidden' }} ml-auto font-bold pe-1.5">{{ $category->prompts_count }}</span>
                </a>
                {{-- hvis 1 ikoner så 9 spacing: (gap = 2) (icon+padding = 1 + 3 + 1) (A padding-right = 2) (LI padding-right = 1) --}}
                <x-shared.button
                    x-data
                    x-on:click="
                        $dispatch('open-modal', {
                            id: 'taxonomy-modal',
                            headerTitle: '{{ __('shared/category-form.headerTitle.update') }}',
                        });
                        $dispatch('edit-taxonomy', {
                            id: {{ $category->id }},
                            currentRoute: '{{ $this->routeName }}',
                            currentRouteCategoryId: {{ $this->routeName === 'user.user-categories.show' ? $this->currentRouteCategoryId : 0 }},
                        });
                    "
                    buttonColor="alternate"
                    buttonStyle="floating_action_button"
                    buttonSize="xs"
                    aria_label="{{ __('layouts/app.sideNavbar.collapsibleItems.'.$collapsibleItem['id'].'.editBtn') }}"
                    icon="bootstrap.pencil-fill"
                    class="{{ $isCurrent ? 'visible' : 'invisible group-hover:visible' }} absolute right-3 top-1/2 -translate-y-1/2 border-none {{-- hidden group-hover:inline-flex --}} bg-transparent dark:bg-transparent hover:!bg-primary/10 dark:hover:!bg-primary-dark/10"
                    customBorderRadius="radius"
                    customPadding="p-1"
                />
            </li>
        @empty
            <li class="px-1 py-0.5 mt-2">
                <span class="text-on-surface dark:text-on-surface-dark px-2 py-1.5 text-sm">
                    {{ __('layouts/app.sideNavbar.collapsibleItems.'.$collapsibleItem['id'].'.noItemsMessage') }}
                </span>
            </li>
        @endforelse
    </ul>
</div>