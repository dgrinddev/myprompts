@props([
    'dangerOrSuccess' => '',
    'showSuccess' => false,
    'id' => '',
		'name' => '',
    'label' => '',
    'labelHTML' => '',
    'checked' => false,
    'hasCheckedStrongStyling' => true,
])

@php
    if ($errors->has($id)) {
        $dangerOrSuccess = 'danger';
    }
@endphp

<div class="flex flex-col items-start">
	<label for="{{ $id }}" class="flex items-center gap-2 text-sm font-medium text-on-surface dark:text-on-surface-dark{{ $hasCheckedStrongStyling ? ' has-checked:text-on-surface-strong dark:has-checked:text-on-surface-dark-strong' : '' }} has-disabled:cursor-not-allowed has-disabled:opacity-75">
		<span class="relative flex items-center">
				<input id="{{ $id }}" type="checkbox" name="{{ $name }}" class="before:content[''] peer relative size-4 appearance-none overflow-hidden rounded-sm border border-outline bg-surface-alt before:absolute before:inset-0 checked:border-primary checked:before:bg-primary focus:outline-2 focus:outline-offset-2 focus:outline-outline-strong checked:focus:outline-primary active:outline-offset-0 disabled:cursor-not-allowed dark:border-outline-dark dark:bg-surface-dark-alt dark:checked:border-primary-dark dark:checked:before:bg-primary-dark dark:focus:outline-outline-dark-strong dark:checked:focus:outline-primary-dark" {!! $checked ? 'checked' : '' !!} {{ $attributes }} />
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" stroke="currentColor" fill="none" stroke-width="4" class="pointer-events-none invisible absolute left-1/2 top-1/2 size-3 -translate-x-1/2 -translate-y-1/2 text-on-primary peer-checked:visible dark:text-on-primary-dark">
						<path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/>
				</svg>
		</span>
		@if (!empty($label))
			<span>{{ $label }}</span>
		@endif
		@if (!empty($labelHTML))
			<span>{!! $labelHTML !!}</span>
		@endif
	</label>
	@if (($dangerOrSuccess === 'success' && $showSuccess) || ($dangerOrSuccess === 'danger'))
		@foreach ($errors->get($name) as $message)
			<small class="pl-0.5 {{ $dangerOrSuccess === 'success' ? 'text-success' : ($dangerOrSuccess === 'danger' ? 'text-danger' : '') }}">{{ $message }}</small>
		@endforeach
	@endif
</div>