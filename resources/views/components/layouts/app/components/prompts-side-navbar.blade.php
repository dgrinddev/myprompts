@props([
	'outerClass' => '',
])

<div class="{{ $outerClass }}">
	<div class="flex flex-col gap-2 {{-- overflow-y-auto --}} pb-6">
			{{-- linkItems --}}
			@php
					$linkItems = [
							[
									'route' => 'user.user-prompts.create',
									'btnIcon' => 'pui.plus',
									'label' => 'shared/navigation_links.user__user_prompts__create',
									'class' => 'hidden md:flex',
							],
							[
									'route' => 'user.user-prompts.all',
									'btnIcon' => 'bootstrap.grid-3x3-gap',
									'label' => 'shared/navigation_links.user__user_prompts__all.default',
									'class' => '',
							],
							[
									'route' => 'user.user-prompts.uncategorized',
									'btnIcon' => 'bootstrap.inbox',
									'label' => 'shared/navigation_links.user__user_prompts__uncategorized',
									'class' => '',
							],
					];
			@endphp
			@foreach ($linkItems as $linkItem)
				<x-layouts.app.components.navbar-link-btn
					wire:navigate
					route="{{ $linkItem['route'] }}"
					btnIcon="{{ $linkItem['btnIcon'] }}"
					label="{{ __($linkItem['label']) }}"
					class="{{ $linkItem['class'] }}"
				/>
			@endforeach

			{{-- collapsibleItems --}}
			@php
					$collapsibleItems = [
							[
									'id' => 'sideNavbar_collapsibleItem_categories',
									'btnIcon' => 'bootstrap.collection',
									'subItems' => [
											'random-cat',
											'random-cat2',
									],
							],
							/*
							[
									'id' => 'sideNavbar_collapsibleItem_tags',
									'btnIcon' => 'pui.loading',
									'subItems' => [
											'random-tag',
											'random-tag2',
									],
							],
							*/
					];
			@endphp
			@foreach ($collapsibleItems as $collapsibleItem)
					{{-- collapsible item --}}
					<div x-data="{ isExpanded: {{ request()->routeIs('user.user-categories.show') ? 'true' : 'false' }} }" class="flex flex-col">
							{{-- collapse knappen --}}
							<div class="group relative flex flex-col">{{-- div tilføjet for relative position --}}
									<button type="button" x-on:click="isExpanded = ! isExpanded" id="{{ $collapsibleItem['id'] }}-btn" aria-controls="{{ $collapsibleItem['id'] }}" x-bind:aria-expanded="isExpanded ? 'true' : 'false'" class="flex items-center justify-between rounded-radius gap-2 px-2 py-1.5 text-sm font-medium underline-offset-2 focus:outline-hidden focus-visible:underline" x-bind:class="isExpanded ? 'text-on-surface-strong bg-primary/10 dark:text-on-surface-dark-strong dark:bg-primary-dark/10' :  'text-on-surface group-hover:bg-primary/5 group-hover:text-on-surface-strong dark:text-on-surface-dark dark:group-hover:text-on-surface-dark-strong dark:group-hover:bg-primary-dark/5'">
											<x-dynamic-component :component="'shared.svg.icons.'.$collapsibleItem['btnIcon']" fill="currentColor" class="size-5 shrink-0" x-bind:class="isExpanded ? 'hidden' : 'group-hover:hidden'" aria-hidden="true" />
											<x-shared.svg.icons.pui.chevron-down-dropdown fill="currentColor" class="size-5 transition-transform rotate-0 shrink-0" x-bind:class="isExpanded ? 'rotate-180 block' : 'rotate-0 hidden group-hover:block'" aria-hidden="true" />
											<span class="mr-auto text-left truncate group-hover:pe-7">{{ __('layouts/app.sideNavbar.collapsibleItems.'.$collapsibleItem['id'].'.btnLabel') }}</span>
											{{-- hvis 2 ikoner så 16 spacing: (gap = 2) (icon+padding = 0.5 + 4 + 0.5) (gap = 2) (icon+padding = 0.5 + 4 + 0.5) (padding-right = 2) --}}
											{{-- hvis 1 ikoner så 9 spacing: (gap = 2) (icon+padding = 0.5 + 4 + 0.5) (padding-right = 2) --}}
									</button>

									<x-shared.button
										x-data
										x-on:click="
											$dispatch('open-modal', {
												id: 'taxonomy-modal',
												headerTitle: '{{ __('shared/category-form.headerTitle.create') }}',
											});
											$dispatch('add-taxonomy');
										"
										buttonColor="alternate"
										buttonStyle="floating_action_button"
										buttonSize="sm"
										aria_label="{{ __('layouts/app.sideNavbar.collapsibleItems.'.$collapsibleItem['id'].'.addBtn') }}"
										icon="pui.plus"
										class="absolute right-2 top-1/2 -translate-y-1/2 border-none {{-- hidden group-hover:inline-flex --}} bg-transparent dark:bg-transparent hover:!bg-primary/10 dark:hover:!bg-primary-dark/10"
										x-bind:class="isExpanded ? 'visible' : 'invisible group-hover:visible'"
										customBorderRadius="radius"
										customPadding="p-0.5"
									/>
							</div>
	
							{{-- Indholdet i collapsible item --}}
							<livewire:shared.taxonomy-list
									:collapsibleItem="$collapsibleItem"
									:key="$collapsibleItem['id']"
							/>
					</div>
			@endforeach
	</div>

	{{--
	<x-shared.button
		x-data
		x-on:click="$dispatch('open-modal', { id: 'random-modal' });"
		label="Random knap"
	/>
	--}}

</div>