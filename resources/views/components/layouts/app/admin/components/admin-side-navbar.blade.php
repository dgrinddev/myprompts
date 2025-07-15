@props([
	'outerClass' => '',
])

<div class="{{ $outerClass }}">
	<div class="flex flex-col gap-2 {{-- overflow-y-auto --}} pb-6">
			{{-- linkItems --}}
			@php
					$linkItems = [
							[
									'route' => 'user.user-prompts.all',
									'btnIcon' => 'bootstrap.arrow-left',
									'label' => 'shared/navigation_links.user__user_prompts__all.backToPrompts',
									'class' => '',
							],
							[
									'route' => 'admin.admin-pages.admin-dashboard',
									'btnIcon' => 'bootstrap.gear',
									'label' => 'shared/navigation_links.admin__admin_pages__admin_dashboard.default',
									'class' => '',
							],
							[
									'route' => 'admin.admin-pages.users-overview',
									'btnIcon' => 'bootstrap.gear',
									'label' => 'shared/navigation_links.admin__admin_pages__users_overview',
									'class' => '',
							],
					];
			@endphp
			@foreach ($linkItems as $linkItem)
				<x-layouts.app.components.navbar-link-btn
					route="{{ $linkItem['route'] }}"
					btnIcon="{{ $linkItem['btnIcon'] }}"
					label="{{ __($linkItem['label']) }}"
					class="{{ $linkItem['class'] }}"
					wire:navigate
				/>
			@endforeach
	</div>
</div>