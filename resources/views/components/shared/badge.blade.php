@props([
	'badgeColor' => 'default', // default, primary, secondary, inverse, info, danger, warning, success
	'badgeStyle' => 'default', // default, soft, indicator
	'label' => 'Label',
	'icon' => '',
	'customIconClasses' => '',
])

@php
	$borderColor = null;
	$bgColor = null;
	$borderColorDark = null;
	$bgColorDark = null;
	$textColor = null;
	$textColorDark = null;

	if (!empty($icon)) {
		$badgeStyle = 'indicator';
	}

	$indicatorColor = in_array($badgeColor, ['default','inverse']) ? 'on-surface' : $badgeColor;
	$indicatorColorDark = in_array($badgeColor, ['default','inverse','primary','secondary']) ? $indicatorColor.'-dark' : $indicatorColor;

	if (in_array($badgeColor, ['primary','secondary'])) {
		$borderColor = $badgeColor;
		$bgColor = $badgeColor;
		$textColor = ($badgeStyle === 'soft' || $badgeStyle === 'indicator' ? $badgeColor : 'on-'.$badgeColor);
	} else if (in_array($badgeColor, ['info','danger','warning','success'])) {
		$borderColor = $badgeColor;
		$bgColor = $badgeColor;
		$borderColorDark = $borderColor;
		$bgColorDark = $bgColor;
		$textColor = ($badgeStyle === 'soft' || $badgeStyle === 'indicator' ? $badgeColor : 'on-'.$badgeColor);
		$textColorDark = $textColor;
	} else if ($badgeColor === 'inverse') {
		$borderColor = 'outline-dark';
		$borderColorDark = 'outline';
		$bgColor = 'surface-dark-alt';
		$bgColorDark = 'surface-alt';
		$textColor = ($badgeStyle === 'soft' || $badgeStyle === 'indicator' ? 'on-surface' : 'on-surface-dark');
		$textColorDark = ($badgeStyle === 'soft' || $badgeStyle === 'indicator' ? 'on-surface-dark' : 'on-surface');
	} else if ($badgeColor === 'default') {
		$borderColor = 'outline';
		$bgColor = 'surface-alt';
		$bgColorDark = 'surface-dark-alt';
		$textColor = 'on-surface';
	}

	$borderColorDark = $borderColorDark ?? $borderColor.'-dark';
	$bgColorDark = $bgColorDark ?? $bgColor.'-dark';
	$textColorDark = $textColorDark ?? $textColor.'-dark';
@endphp

<span {{
	$attributes->class([
		'rounded-radius w-fit',
		'inline-flex overflow-hidden' => $badgeStyle === 'soft' || $badgeStyle === 'indicator',
		'border border-'.$borderColor,
		'bg-'.$bgColor => !in_array($badgeStyle, ['soft','indicator']),
		'bg-surface' => in_array($badgeStyle, ['soft','indicator']),
		'px-2 py-1' => $badgeStyle === 'default',
		'text-xs font-medium'.' '.'text-'.$textColor.' '.'dark:border-'.$borderColorDark,
		'dark:bg-'.$bgColorDark => !in_array($badgeStyle, ['soft','indicator']),
		'dark:bg-surface-dark' => in_array($badgeStyle, ['soft','indicator']),
		'dark:text-'.$textColorDark,
		'min-w-0' => !in_array($badgeStyle, ['soft','indicator']),
	])
}}>
	@if ($badgeStyle === 'soft' || $badgeStyle === 'indicator')
		<span class="px-2 py-1 {{ ($badgeStyle === 'indicator' ? 'flex items-center gap-1' : '') }} bg-{{ $bgColor }}/10 dark:bg-{{ $bgColorDark }}/10 min-w-0">
	@endif
		@if ($badgeStyle === 'indicator' && empty($icon))
			<span class="size-1.5 rounded-full bg-{{ $indicatorColor }} dark:bg-{{ $indicatorColorDark }}"></span>
		@endif
		@if (!empty($icon))
			<x-dynamic-component component="shared.svg.icons.{{ $icon }}" aria-hidden="true" fill="currentColor" class="{{ (!empty($customIconClasses) ? $customIconClasses : 'size-4 flex-none') }}" />
		@endif
			<span class="truncate">{{ $label }}</span>
	@if ($badgeStyle === 'soft' || $badgeStyle === 'indicator')
		</span>
	@endif
</span>