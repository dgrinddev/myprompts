@props([
	'dangerOrSuccess' => '',
	'showSuccess' => false,
	'addBtnAriaLabel' => '',
	'addBtnOnClick' => '',
])

<button
	x-on:click="{{ $addBtnOnClick }}"
	type="button"
	class="flex items-center justify-center rounded-r-radius {{ (($dangerOrSuccess === 'success' && $showSuccess) || ($dangerOrSuccess === 'danger')) ? 'border-t border-r border-b ' : 'border ' }}border-outline bg-surface-alt px-4 py-2 text-on-surface hover:opacity-75 focus-visible:z-10 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary active:opacity-100 active:outline-offset-0 dark:border-outline-dark dark:bg-surface-dark-alt dark:text-on-surface-dark dark:focus-visible:outline-primary-dark cursor-pointer"
	aria-label="{{ $addBtnAriaLabel }}"
	{{ $attributes }}
>
	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" stroke="currentColor" fill="none" stroke-width="2" class="size-4">
		<path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
	</svg>
</button>