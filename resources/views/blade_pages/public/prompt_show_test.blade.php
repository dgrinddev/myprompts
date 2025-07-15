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
	<h2>SPECIFIK Prompt</h2>
	<strong>{{ $thePrompt['id'] }}</strong><br>
	<a href="{{ route('public.public-profiles.prompt_show_test', ['profile' => $name, 'prompt' => $thePrompt['id']]) }}" target="_blank">{{ route('public.public-profiles.prompt_show_test', ['profile' => $name, 'prompt' => $thePrompt['id']]) }}</a><br>
	<strong>{{ $thePrompt['title'] }}</strong><br>
	{{ $thePrompt['content'] }}
</div>

</x-layouts.guest>