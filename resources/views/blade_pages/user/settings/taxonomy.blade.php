@php
	$titleKey = $titleKey ?? 'shared/title.blade_pages__user__settings__taxonomy'; // Standard hvis ikke angivet
	$titleParams = $titleParams ?? []; // Standard hvis ikke angivet
@endphp

<x-layouts.app.settings
	:title-key="$titleKey"
	:title-params="$titleParams"
	class=""
>

	<p>Dette er tags/categories indstillinger</p>

</x-layouts.app.settings>