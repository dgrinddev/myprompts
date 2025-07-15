@props([
	'route' => '',
	'btnIcon' => '',
	'label' => '',
])

<a {{
	$attributes->class([
		'flex items-center rounded-radius gap-2',
		'bg-primary/10 dark:bg-primary-dark/10 text-on-surface-strong dark:text-on-surface-dark-strong cursor-default pointer-events-none' => request()->routeIs($route),
		'hover:bg-primary/5 dark:hover:bg-primary-dark/5 text-on-surface dark:text-on-surface-dark hover:text-on-surface-strong dark:hover:text-on-surface-dark-strong cursor-pointer' => !(request()->routeIs($route)),
		'px-2 py-1.5 text-sm font-medium underline-offset-2 focus-visible:underline focus:outline-hidden',
	])->merge([
		'href' => route($route),
	])
}}>
	<x-dynamic-component :component="'shared.svg.icons.'.$btnIcon" fill="currentColor" class="size-5 shrink-0" aria-hidden="true" />
	<span>{{ $label }}</span>
	@if (request()->routeIs($route))
		<span class="sr-only">{{ __('shared/accessibility.srOnly.active') }}</span>
	@endif
</a>