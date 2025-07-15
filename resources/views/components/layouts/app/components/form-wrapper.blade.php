@props([
	/*
	'lol' => '',
	*/
])

<div {{
	$attributes->class([
		'w-full max-w-2xl p-6 rounded-radius border border-outline {{-- bg-surface --}} bg-surface-alt/10 text-on-surface dark:border-outline-dark {{-- dark:bg-surface-dark --}} dark:bg-surface-dark-alt/10 dark:text-on-surface-dark',
	])
}}>
	{{ $slot }}
</div>