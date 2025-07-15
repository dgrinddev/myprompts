@props([
	/* header */
	'beforeHeaderHTML' => '',
	'beforeHeader' => '',
	'beforeHeaderClasses' => '',
	'header' => '',
	'headerClasses' => '',
	'headerHTML' => '',
	'afterHeader' => '',
	'afterHeaderClasses' => '',
	'afterHeaderHTML' => '',
	/* subHeader */
	'beforeSubHeaderHTML' => '',
	'beforeSubHeader' => '',
	'beforeSubHeaderClasses' => '',
	'subHeader' => '',
	'subHeaderClasses' => '',
	'subHeaderHTML' => '',
	'afterSubHeader' => '',
	'afterSubHeaderClasses' => '',
	'afterSubHeaderHTML' => '',
])

<div
	{{ $attributes->merge(['class' => 'w-full max-w-2xl mb-3 md:mb-4 lg:mb-6 flex flex-col gap-1 md:gap-1.5 lg:gap-2']) }}
>
	@if (!empty($header) || !empty($headerHTML))
		<h1 class="{{-- text-2xl --}} text-lg lg:text-xl font-medium text-on-surface-strong dark:text-on-surface-dark-strong text-balance">
			@if (!empty($beforeHeaderHTML))
				{!! $beforeHeaderHTML !!}
			@endif
			@if (!empty($beforeHeader))
				<span class="{{ $beforeHeaderClasses }}">{{ $beforeHeader }}</span>
			@endif
			@if (!empty($header))
				<span class="{{ $headerClasses }}">{{ $header }}</span>
			@endif
			@if (!empty($headerHTML))
				{!! $headerHTML !!}
			@endif
			@if (!empty($afterHeader))
				<span class="{{ $afterHeaderClasses }}">{{ $afterHeader }}</span>
			@endif
			@if (!empty($afterHeaderHTML))
				{!! $afterHeaderHTML !!}
			@endif
		</h1>
	@endif
	@if (!empty($subHeader) || !empty($subHeaderHTML))
		<p class="{{-- text-base --}} text-sm text-on-surface dark:text-on-surface-dark text-pretty">
			@if (!empty($beforeSubHeaderHTML))
				{!! $beforeSubHeaderHTML !!}
			@endif
			@if (!empty($beforeSubHeader))
				<span class="{{ $beforeSubHeaderClasses }}">{{ $beforeSubHeader }}</span>
			@endif
			@if (!empty($subHeader))
				<span class="{{ $subHeaderClasses }}">{{ $subHeader }}</span>
			@endif
			@if (!empty($subHeaderHTML))
				{!! $subHeaderHTML !!}
			@endif
			@if (!empty($afterSubHeader))
				<span class="{{ $afterSubHeaderClasses }}">{{ $afterSubHeader }}</span>
			@endif
			@if (!empty($afterSubHeaderHTML))
				{!! $afterSubHeaderHTML !!}
			@endif
		</p>
	@endif
</div>