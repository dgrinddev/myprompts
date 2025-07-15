@props([
	'dangerOrSuccess' => '',
	'showSuccess' => false,
	'val' => '',
	'choices' => [],
	/*
	'choices' => [
		[
			'value' => '',
			'text' => '',
		],
	],
	*/
	'id' => '',
	'label' => '',
	'name' => '',
	'placeholder' => '',
	'nullableOnEdit' => false,
	'withAddBtn' => false,
	'addBtnAriaLabel' => '',
	'addBtnOnClick' => '',
	'useWireKey' => false,
	'wireKeyPrefix' => '',
	'outerclasses' => '',
])

@php
	if ($errors->has($name)) {
		$dangerOrSuccess = 'danger';
	}
@endphp

{{-- IF SELECTS WITH DEPENDANT INSERT THIS AROUND BOTH SELECTS:
<div x-data="{ firstValue: '', secondValue: '' }" class="flex w-full flex-col items-center gap-4">
--}}
<div class="{{ $withAddBtn ? '' : 'relative ' }}flex w-full max-w-xs flex-col gap-1 text-on-surface dark:text-on-surface-dark {{ $outerclasses }}">
	@if (!empty($label))
		<label for="{{ $id }}" class="{{ (($dangerOrSuccess === 'success' && $showSuccess) || ($dangerOrSuccess === 'danger')) ? 'flex items-center gap-1 '.'text-'.$dangerOrSuccess.' ' : '' }}w-fit pl-0.5 text-sm">
			@if (($dangerOrSuccess === 'success' && $showSuccess) || ($dangerOrSuccess === 'danger'))
				<x-dynamic-component :component="'shared.svg.icons.pui.'.($dangerOrSuccess === 'success' ? 'check-success' : ($dangerOrSuccess === 'danger' ? 'x-danger' : ''))" aria-hidden="true" fill="currentColor" class="w-4 h-4" />
			@endif
			{{ $label }}
		</label>
	@endif
	@if ($withAddBtn)
	<div class="flex flex-row">
		<div class="w-full relative">
	@endif
			<x-shared.svg.icons.pui.chevron-down-dropdown fill="currentColor" class="absolute {{ false ? 'pointer-events-none' : '' }} right-4 {{ $withAddBtn ? 'z-11 top-2 ' : 'top-8 ' }}size-5" aria-hidden="true" />
			<select id="{{ $id }}" name="{{ $name }}" class="w-full appearance-none {{ $withAddBtn ? 'focus-visible:z-10 relative rounded-l-radius border-t border-l border-b bg-surface-alt/50 ' : 'rounded-radius border bg-surface-alt ' }}{{ $withAddBtn && (($dangerOrSuccess === 'success' && $showSuccess) || ($dangerOrSuccess === 'danger')) ? 'border-r ' : '' }}{{ (($dangerOrSuccess === 'success' && $showSuccess) || ($dangerOrSuccess === 'danger')) ? ' border-'.$dangerOrSuccess : ' border-outline dark:border-outline-dark' }} ps-4 pe-10 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark truncate" {{ $attributes->except(['addBtnAriaLabel', 'addBtnOnClick']) }}
				{{-- IF SELECTS WITH DEPENDANT INSERT THIS IN FIRST SELECT: x-model="firstValue" --}}
				{{-- IF SELECTS WITH DEPENDANT INSERT THIS IN SECOND SELECT: x-model="secondValue" x-bind:disabled="!firstValue" --}}
			>
				{{-- IF SELECTS WITH DEPENDANT INSERT THIS IN SECOND SELECT:
				<option value="" x-bind:selected="!firstValue" x-text="firstValue ? 'Select Year' : 'Select Model First'"></option>
				--}}
				@if (empty($val) || $nullableOnEdit)
					<option value="">{{ $placeholder }}</option>
				@endif
				@foreach ($choices as $choice)
					<option
						@if($useWireKey)
							wire:key="{{ $wireKeyPrefix }}-{{ $choice['value'] }}"
						@endif
						value="{{ $choice['value'] }}"
					>
						{{ $choice['text'] }}
					</option>
				@endforeach
			</select>
	@if ($withAddBtn)
		</div>
		<x-shared.input.select.add-btn
			:dangerOrSuccess="$dangerOrSuccess"
			:showSuccess="$showSuccess"
			:addBtnAriaLabel="$addBtnAriaLabel"
			:addBtnOnClick="$addBtnOnClick"
		/>
	</div>
	@endif
	@if (($dangerOrSuccess === 'success' && $showSuccess) || ($dangerOrSuccess === 'danger'))
		@foreach ($errors->get($name) as $message)
			<small class="pl-0.5 {{ $dangerOrSuccess === 'success' ? 'text-success' : ($dangerOrSuccess === 'danger' ? 'text-danger' : '') }}">{{ $message }}</small>
		@endforeach
	@endif
</div>
{{-- IF SELECTS WITH DEPENDANT INSERT THIS AROUND BOTH SELECTS:
</div>
--}}