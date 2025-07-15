@prepend('head')
	{{-- @vite('resources/css/pages/public/home.css') --}}
@endprepend

@prepend('styles')
	<style>
		/* home-specifikke styles */
	</style>
@endprepend

@php
	$titleKey = $titleKey ?? 'shared/title.blade_pages__public__home'; // Standard hvis ikke angivet
	$titleParams = $titleParams ?? []; // Standard hvis ikke angivet
	$darkMode = $darkMode ?? NULL; // Standard hvis ikke angivet
@endphp

<x-layouts.guest
	:title-key="$titleKey"
	:title-params="$titleParams"
	:dark-mode="$darkMode"
	class=""
>

<div>
	<p>Navn: {{ $name }}</p>
	<p>Oprettet: {{ $created_at }}</p>
	<h2>Bio</h2>
	<p>{{ $public_profile['bio'] }}</p>
	<h2>Prompts</h2>
	<ul>
		@forelse($public_prompts as $prompt)
			<li>
				<strong>{{ $prompt['id'] }}</strong><br>
				<a href="{{ route('public.public-profiles.prompt_show_test', ['profile' => $name, 'prompt' => $prompt['id']]) }}" target="_blank">{{ route('public.public-profiles.prompt_show_test', ['profile' => $name, 'prompt' => $prompt['id']]) }}</a><br>
				<strong>{{ $prompt['title'] }}</strong><br>
				{{ $prompt['content'] }}
			</li>
		@empty
			<li>Ingen offentlige prompts.</li>
		@endforelse
	</ul>
</div>

</x-layouts.guest>