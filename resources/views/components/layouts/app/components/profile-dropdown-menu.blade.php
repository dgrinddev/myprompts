@props([
    'sideOrTopNavbar' => 'side',
])

<div x-data="{ userDropdownIsOpen: false }" class="{{ $sideOrTopNavbar === 'top' ? 'relative' : 'mt-auto' }}" x-on:keydown.esc.window="userDropdownIsOpen = false">
    {{-- dropdown-menu knappen --}}
    <button type="button" class="flex w-full items-center rounded-radius gap-2 p-2 text-left text-on-surface hover:bg-primary/5 hover:text-on-surface-strong focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary dark:text-on-surface-dark dark:hover:bg-primary-dark/5 dark:hover:text-on-surface-dark-strong dark:focus-visible:outline-primary-dark" x-bind:class="userDropdownIsOpen ? 'bg-primary/10 dark:bg-primary-dark/10' : ''" aria-haspopup="true" x-on:click="userDropdownIsOpen = ! userDropdownIsOpen" x-bind:aria-expanded="userDropdownIsOpen">
        <img src="{{ asset('images/components/layouts/app/profile-icon.png') }}" class="size-8 object-cover rounded-radius" alt="{{ __('layouts/app.topNavbar.profileDropdown.avatarAltText') }}" aria-hidden="true"/>
        <div class="{{ $sideOrTopNavbar === 'top' ? 'hidden md:flex' : 'flex' }} flex-col min-w-0">
            <span class="text-sm font-bold text-on-surface-strong dark:text-on-surface-dark-strong truncate">{{ auth()->user()->email }}</span>
            <span class="{{ $sideOrTopNavbar === 'top' ? '' : 'truncate '/* 'w-32 overflow-hidden text-ellipsis md:w-36 ' */ }}text-xs" aria-hidden="true">{{ '@'.auth()->user()->name }}</span>
            <span class="sr-only">{{ __('layouts/app.topNavbar.profileDropdown.srOnly') }}</span>
        </div>
        @if ($sideOrTopNavbar !== 'top')
            <x-shared.svg.icons.pui.chevron-right stroke="currentColor" fill="none" stroke-width="2" class="{{--  --}}ml-auto size-4 shrink-0 -rotate-90 md:rotate-0" aria-hidden="true" />
        @endif
    </button>

    @php
        $groupsAndMenuItems = [
            [
                [
                    'route' => 'user.user-settings.profile',
                    'btnIcon' => 'bootstrap.person',
                    'label' => 'shared/navigation_links.user__user_settings__profile',
                ],
                [
                    'route' => 'user.user-settings.password',
                    'btnIcon' => 'bootstrap.shield-lock',
                    'label' => 'shared/navigation_links.user__user_settings__password',
                ],
                [
                    'route' => 'user.user-settings.appearance',
                    'btnIcon' => 'bootstrap.sliders',
                    'label' => 'shared/navigation_links.user__user_settings__appearance',
                ],
                [
                    'route' => 'user.user-settings.delete-user',
                    'btnIcon' => 'bootstrap.person-x',
                    'label' => 'shared/navigation_links.user__user_settings__delete_user',
                    'addClasses' => '!text-danger',
                ],
            ],
            [
                [
                    'route' => 'logout',
                    'btnIcon' => 'bootstrap.box-arrow-left',
                    'label' => 'shared/navigation_links.logout',
                    'addClasses' => 'w-full',
                    'method' => 'POST',
                ],
            ],
        ];

        if (optional(auth()->user())->hasRole('admin')) {
            $adminGroup = [
                [
                    'route' => 'admin.admin-pages.admin-dashboard',
                    'btnIcon' => 'bootstrap.gear',
                    'label' => 'shared/navigation_links.admin__admin_pages__admin_dashboard.default',
                ],
            ];
            array_unshift($groupsAndMenuItems, $adminGroup);
        }
    @endphp

    {{-- Indholdet i dropdown-menu --}}
    <div x-cloak x-show="userDropdownIsOpen" class="absolute {{ $sideOrTopNavbar === 'top' ? 'top-14 right-0 h-fit' : 'bottom-20 right-6 -mr-1' }} z-20 w-48 border divide-y divide-outline border-outline bg-surface dark:divide-outline-dark dark:border-outline-dark dark:bg-surface-dark rounded-radius{{ $sideOrTopNavbar === 'top' ? '' : ' md:-right-44 md:bottom-4' }}" role="menu" x-on:click.outside="userDropdownIsOpen = false" x-on:keydown.down.prevent="$focus.wrap().next()" x-on:keydown.up.prevent="$focus.wrap().previous()" x-transition="" x-trap="userDropdownIsOpen">
        {{-- der er en border i bunden af hver div for at adskille grupper af menu-punkter i dropdown --}}
        @foreach ($groupsAndMenuItems as $group)
            <div class="flex flex-col py-1.5">
                {{-- hver a-tag er et menu-punkt --}}
                @foreach ($group as $menuItem)
                    @if (!empty($menuItem['method']))
                        <form
                            method="{{ $menuItem['method'] }}"
                            action="{{ route($menuItem['route']) }}"
                        >
                            @csrf
                    @endif
                            <{!! !empty($menuItem['method']) ? 'button' : 'a' !!}
                                {!! !empty($menuItem['method']) ? 'type="submit"' : 'href="'.route($menuItem['route']).'"' !!}
                                class="flex items-center gap-2 px-2 py-1.5 text-sm font-medium {{ request()->routeIs($menuItem['route']) ? 'bg-primary/10 dark:bg-primary-dark/10 text-on-surface-strong dark:text-on-surface-dark-strong cursor-default pointer-events-none' : 'hover:bg-primary/5 dark:hover:bg-primary-dark/5 text-on-surface dark:text-on-surface-dark hover:text-on-surface-strong dark:hover:text-on-surface-dark-strong cursor-pointer' }} underline-offset-2 focus-visible:underline focus:outline-hidden {{ $menuItem['addClasses'] ?? '' }}"
                                role="menuitem"
                                {!! !empty($menuItem['method']) ? '' : 'wire:navigate' !!}
                            >
                                @if ($menuItem['btnIcon'])
                                    <x-dynamic-component :component="'shared.svg.icons.'.$menuItem['btnIcon']" fill="currentColor" class="size-5 shrink-0" aria-hidden="true" />
                                @endif
                                <span>{{ __($menuItem['label']) }}</span>
                            </{!! !empty($menuItem['method']) ? 'button' : 'a' !!}>
                    @if (!empty($menuItem['method']))
                        </form>
                    @endif
                @endforeach
            </div>
        @endforeach
    </div>
</div>