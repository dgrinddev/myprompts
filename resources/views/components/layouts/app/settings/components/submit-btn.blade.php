@props([
	'on',
])

<div class="flex items-center gap-4">
		<x-shared.button
				buttonColor="primary"
				type="submit"
				id="submit_btn"
				label="{{ __( 'layouts/settings.inputs.submit_btn.label' ) }}"
				class="w-fit"
		/>

		<div
				x-data="{ shown: false, timeout: null }"
				x-init="@this.on('{{ $on }}', () => { clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, 2000); })"
				x-show.transition.out.opacity.duration.1500ms="shown"
				x-transition:leave.opacity.duration.1500ms
				style="display: none"
				class="text-sm me-3"
		>
				{{ __('layouts/settings.inputs.submit_btn.savedMessage') }}
		</div>
</div>