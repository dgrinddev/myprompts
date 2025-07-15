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
									'route' => 'user.user-settings.profile',
									'btnIcon' => 'bootstrap.person',
									'label' => 'shared/navigation_links.user__user_settings__profile',
									'class' => '',
							],
							[
									'route' => 'user.user-settings.password',
									'btnIcon' => 'bootstrap.shield-lock',
									'label' => 'shared/navigation_links.user__user_settings__password',
									'class' => '',
							],
							[
									'route' => 'user.user-settings.appearance',
									'btnIcon' => 'bootstrap.sliders',
									'label' => 'shared/navigation_links.user__user_settings__appearance',
									'class' => '',
							],
							[
									'route' => 'user.user-settings.delete-user',
									'btnIcon' => 'bootstrap.person-x',
									'label' => 'shared/navigation_links.user__user_settings__delete_user',
									'class' => '!text-danger',
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