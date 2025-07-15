@props([
	'dangerOrSuccess' => '',
	'showSuccess' => false,
	'id' => '',
	'label' => '',
	'name' => '',
	'rows' => '3',
	'placeholder' => '',
	'outerclasses' => '',
])

@php
	if ($errors->has($name)) {
		$dangerOrSuccess = 'danger';
	}
@endphp

<div class="flex w-full max-w-md flex-col gap-1 text-on-surface dark:text-on-surface-dark {{ $outerclasses }}">
	@if (!empty($label))
		<label for="{{ $id }}" class="{{ (($dangerOrSuccess === 'success' && $showSuccess) || ($dangerOrSuccess === 'danger')) ? 'flex items-center gap-1 '.'text-'.$dangerOrSuccess.' ' : '' }}w-fit pl-0.5 text-sm">
			@if (($dangerOrSuccess === 'success' && $showSuccess) || ($dangerOrSuccess === 'danger'))
				<x-dynamic-component :component="'shared.svg.icons.pui.'.($dangerOrSuccess === 'success' ? 'check-success' : ($dangerOrSuccess === 'danger' ? 'x-danger' : ''))" aria-hidden="true" fill="currentColor" class="w-4 h-4" />
			@endif
			{{ $label }}
		</label>
	@endif
	<textarea id="{{ $id }}" class="w-full rounded-radius border{{ (($dangerOrSuccess === 'success' && $showSuccess) || ($dangerOrSuccess === 'danger')) ? ' border-'.$dangerOrSuccess : ' border-outline dark:border-outline-dark' }} bg-surface-alt px-2.5 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark" name="{{ $name }}" rows="{{ $rows }}" placeholder="{{ $placeholder }}" {{ $attributes }}></textarea>
	@if (($dangerOrSuccess === 'success' && $showSuccess) || ($dangerOrSuccess === 'danger'))
		@foreach ($errors->get($name) as $message)
			<small class="pl-0.5 {{ $dangerOrSuccess === 'success' ? 'text-success' : ($dangerOrSuccess === 'danger' ? 'text-danger' : '') }}">{{ $message }}</small>
		@endforeach
	@endif
</div>