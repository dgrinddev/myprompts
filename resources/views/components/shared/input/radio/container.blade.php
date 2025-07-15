@props([
	'dangerOrSuccess' => '',
	'showSuccess' => false,
	'choices' => [],
	/*
	'choices' => [
		[
			'id' => '',
			'label' => '',
			'checked' => true,
		],
	],
	*/
	'name' => '',
	'labelclasses' => '',
	'size' => 'md', // sm, md, lg, xl
	'outerclasses' => '',
	'outerlabel' => '',
	'choicesouterclasses' => 'flex flex-col gap-2',
])

@php
	switch ($size) {
		case 'sm':
			$outerCircleSize = 'h-3 w-3';
			$innerCircleSize = 'before:h-1 before:w-1';
			$labelTextSize = 'text-xs';
			break;
		case 'md':
			$outerCircleSize = 'h-4 w-4';
			$innerCircleSize = 'before:h-1.5 before:w-1.5';
			$labelTextSize = 'text-sm';
			break;
		case 'lg':
			$outerCircleSize = 'h-5 w-5';
			$innerCircleSize = 'before:h-2 before:w-2';
			$labelTextSize = 'text-base';
			break;
		case 'xl':
			$outerCircleSize = 'h-6 w-6';
			$innerCircleSize = 'before:h-2.5 before:w-2.5';
			$labelTextSize = 'text-lg';
			break;
	}

	if ($errors->has($name)) {
		$dangerOrSuccess = 'danger';
	}
@endphp

<div class="flex w-full flex-col gap-1 text-on-surface dark:text-on-surface-dark {{ $outerclasses }}">
	@if (!empty($outerlabel))
		<p class="{{ (($dangerOrSuccess === 'success' && $showSuccess) || ($dangerOrSuccess === 'danger')) ? 'flex items-center gap-1 '.'text-'.$dangerOrSuccess.' ' : '' }}w-fit pl-0.5 text-sm">
			@if (($dangerOrSuccess === 'success' && $showSuccess) || ($dangerOrSuccess === 'danger'))
				<x-dynamic-component :component="'shared.svg.icons.pui.'.($dangerOrSuccess === 'success' ? 'check-success' : ($dangerOrSuccess === 'danger' ? 'x-danger' : ''))" aria-hidden="true" fill="currentColor" class="w-4 h-4" />
			@endif
			{{ $outerlabel }}
		</p>
	@endif
	<div class="{{ $choicesouterclasses }}">
		@foreach ($choices as $choice)
			<label for="{{ $choice['id'] }}" class="flex w-fit min-w-52 items-center justify-start gap-2 rounded-radius border border-outline bg-surface-alt px-4 py-2 font-medium text-on-surface has-disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt dark:text-on-surface-dark {{ $labelclasses }}">
					<input id="{{ $choice['id'] }}" type="radio" class="before:content[''] relative {{ $outerCircleSize }} appearance-none rounded-full border border-outline bg-surface before:invisible before:absolute before:left-1/2 before:top-1/2 {{ $innerCircleSize }} before:-translate-x-1/2 before:-translate-y-1/2 before:rounded-full before:bg-on-primary checked:border-primary checked:bg-primary checked:before:visible focus:outline-2 focus:outline-offset-2 focus:outline-outline-strong checked:focus:outline-primary disabled:cursor-not-allowed dark:border-outline-dark dark:bg-surface-dark dark:before:bg-on-primary-dark dark:checked:border-primary-dark dark:checked:bg-primary-dark dark:focus:outline-outline-dark-strong dark:checked:focus:outline-primary-dark" name="{{ $name }}" value="{{ $choice['value'] }}" {!! $choice['checked'] ? 'checked' : '' !!} {{ $attributes }}>
					<span class="{{ $labelTextSize }}">{{ $choice['label'] }}</span>
			</label>
		@endforeach
	</div>
	@if (($dangerOrSuccess === 'success' && $showSuccess) || ($dangerOrSuccess === 'danger'))
		@foreach ($errors->get($name) as $message)
			<small class="pl-0.5 {{ $dangerOrSuccess === 'success' ? 'text-success' : ($dangerOrSuccess === 'danger' ? 'text-danger' : '') }}">{{ $message }}</small>
		@endforeach
	@endif
</div>