@php
	$titleKey = $titleKey ?? 'shared/title.livewire__user__dashboard'; // Standard hvis ikke angivet
	$titleParams = $titleParams ?? []; // Standard hvis ikke angivet
@endphp

<x-layouts.app
	:title-key="$titleKey"
	:title-params="$titleParams"
	class=""
>

	<p>Her er $promptid <strong>{{ $prompt->id }}</strong></p>
	<p>Her er $prompttitle <strong>{{ $prompt->title }}</strong></p>
	<p>Her er $promptcontent <strong>{{ $prompt->content }}</strong></p>

</x-layouts.app>