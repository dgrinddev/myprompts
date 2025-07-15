@prepend('head')
	{{-- @vite('resources/css/pages/public/home.css') --}}

	{{-- google search console --}}
	<meta name="google-site-verification" content="{{ config('app.google_search_console_verification') }}">

	{{-- Structured Data (schema.org) --}}
	<script type="application/ld+json">
	{!! json_encode([
			'@context' => 'https://schema.org/',
			'@type' => 'WebSite',
			'name' => config('app.name'),
			'url' => \App\Helpers\CustomUrlHelper::currentCanonicalUrl(),
	], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
	</script>

	<script type="application/ld+json">
	{!! json_encode([
			'@context' => 'https://schema.org',
			'@type' => 'SoftwareApplication',
			'name' => config('app.name'),
			'description' => 'Free AI prompt manager for ChatGPT, Midjourney, and other AI tools. Store, categorize, and instantly access your prompts with '.config('app.name'),
			'operatingSystem' => 'Web',
			'applicationCategory' => 'Productivity',
			'offers' => [
					'@type' => 'Offer',
					'price' => '0.00',
					'priceCurrency' => 'USD',
			],
			'downloadUrl' => \Illuminate\Support\Str::finish(config('app.url'), '/'),
			'author' => [
					'@type' => 'Person',
					'name' => __('pages/public/home.footer.credits.link_label'),
			],
	], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
	</script>

	<script type="application/ld+json">
	{!! json_encode([
			'@context' => 'https://schema.org',
			'@type' => 'Organization',
			'name' => config('app.name'),
			'url' => \Illuminate\Support\Str::finish(config('app.url'), '/'),
			'logo' => asset('images/other/logo.png'),
			'sameAs' => [
				"https://www.facebook.com/layoutlive.dk/",
				"https://layoutlive.dk/"
			],
	], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
	</script>

	<script type="application/ld+json">
	{!! json_encode([
			'@context' => 'https://schema.org',
			'@type' => 'FAQPage',
			'mainEntity' => collect(__('pages/public/home.faqSection.faqsQuestion'))->map(function ($question, $index) {
					return [
							'@type' => 'Question',
							'name' => $question,
							'acceptedAnswer' => [
									'@type' => 'Answer',
									'text' => __('pages/public/home.faqSection.faqsAnswer.'.$index),
							],
					];
			})->values()->all(),
	], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
	</script>
@endprepend

@prepend('styles')
	<style>
		/* home-specifikke styles */
	</style>
@endprepend

@php
	$titleKey = $titleKey ?? 'shared/title.blade_pages__public__home'; // Standard hvis ikke angivet
	$titleParams = $titleParams ?? [];
	$darkMode = $darkMode ?? NULL;
	//$themeColors = $themeColors ?? ['light' => '#85afff', 'dark'  => '#00256b'];
	$usesBunnyCdn = $usesBunnyCdn ?? true;
	// ___ SEO ___ //
	$metaDescription = $metaDescription ?? __('shared/seo.metaDescription.blade_pages__public__home');
	$ogTitle = $ogTitle ?? __('shared/seo.ogTitle.blade_pages__public__home');
	$ogDescription = $ogDescription ?? __('shared/seo.ogDescription.blade_pages__public__home');
@endphp

<x-layouts.guest
	:title-key="$titleKey"
	:title-params="$titleParams"
	:dark-mode="$darkMode"
	{{--
	:theme-colors="$themeColors"
	--}}
	:uses-bunny-cdn="$usesBunnyCdn"
	class=""
	{{-- ___ SEO ___ --}}
	:meta-description="$metaDescription"
	:og-title="$ogTitle"
	:og-description="$ogDescription"
>

{{--
<script>
	document.addEventListener('alpine:init', () => {
		Alpine.data('fadeInAnimation', () => ({
			shown: false,
			get animationClasses() {
				return this.shown
					? 'opacity-100 translate-y-[0px] blur-[0px] transition duration-700 ease-out'
					: 'opacity-0 translate-y-[30px] blur-[5px]';
			}
		}))
	})
</script>
--}}

{{-- Hero section --}}
<section id="hero-section" class="py-10 md:py-16 scroll-mt-17.5 md:scroll-mt-6.5">
	<div class="text-center">
		<div class="max-w-screen-md mx-auto">
			<div x-data="{ shown: false }" x-intersect.once="shown = true">
				<p
				x-cloak="bevarplads"
				:class="shown ? 'opacity-100 translate-y-[0px] blur-[0px] transition duration-700 ease-out' : 'opacity-0 translate-y-[30px] blur-[5px]'"
				class="delay-0 will-change-transform text-sm uppercase tracking-wider dark:bg-surface-dark-alt dark:text-on-surface-dark max-w-max mx-auto px-3 py-1 rounded-full border-t dark:border-primary/20 backdrop-blur-3xl mb-6 md:mb-10">
					{{ __('pages/public/home.heroSection.subtitle') }}
				</p>
				@php
						$headerSizeIsSmall = true;
						$headerBadgeSizeIsSmall = true;
				@endphp
				<h1
				x-cloak="bevarplads"
				:class="shown ? 'opacity-100 translate-y-[0px] blur-[0px] transition duration-700 ease-out' : 'opacity-0 translate-y-[30px] blur-[5px]'"
				class="delay-400 will-change-transform text-on-surface-strong dark:text-on-surface-dark-strong font-semibold !leading-tight mb-4 md:mb-5 {{ $headerSizeIsSmall ? 'text-3xl md:text-4xl lg:text-5xl' : 'text-4xl md:text-5xl lg:text-6xl' }} text-balance">
					{{ __('pages/public/home.heroSection.title') }}
					<span class="relative isolate ms-2">
						{{ __('pages/public/home.heroSection.decoTitle') }}
						<span class="absolute -z-10 -left-6 -right-4 dark:bg-surface-dark-alt/80 rounded-full px-8 ms-3 border-t dark:border-outline-dark-strong/25 shadow-[inset_0px_0px_30px_0px] dark:shadow-outline-dark {{ $headerBadgeSizeIsSmall ? 'top-2.25 bottom-0.5 md:top-2.5 md:bottom-0.5 lg:top-4 lg:bottom-0.5' : 'top-2.5 bottom-0.5 md:top-3.5 md:bottom-0.5 lg:top-4 lg:bottom-0.5' }}{{-- lg:top-4 lg:bottom-2 --}}"></span>
					</span>
				</h1>
				<p
				x-cloak="bevarplads"
				:class="shown ? 'opacity-100 translate-y-[0px] blur-[0px] transition duration-700 ease-out' : 'opacity-0 translate-y-[30px] blur-[5px]'"
				class="delay-800 will-change-transform text-on-surface dark:text-on-surface-dark md:text-xl">
					{{ __('pages/public/home.heroSection.text') }}
				</p>
				<div
					x-cloak="bevarplads"
					:class="shown ? 'opacity-100 translate-y-[0px] blur-[0px] transition duration-700 ease-out' : 'opacity-0 translate-y-[30px] blur-[5px]'"
					class="delay-1200 will-change-transform flex justify-center gap-2 mt-6 md:mt-10"
				>
					<x-shared.button
						buttonColor="primary"
						label="{{ __('pages/public/home.heroSection.primaryBtn') }}"
						href="{{ route('register') }}"
					/>
					<div x-data="{videoModalIsOpen: false}">
							<button x-on:click="videoModalIsOpen = true, $refs.video.play()" type="button" class="inline-flex items-center gap-2 bg-transparent rounded-radius px-4 py-2 text-center text-sm font-medium tracking-wide text-primary transition hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary active:opacity-100 active:outline-offset-0 disabled:opacity-75 disabled:cursor-not-allowed dark:text-primary-dark dark:focus-visible:outline-primary-dark cursor-pointer">
									<x-shared.svg.icons.pui.play-fill aria-hidden="true" fill="currentColor" class="w-4 h-4" />
									{{ __('pages/public/home.heroSection.secondaryBtn') }}
							</button>
							<template x-teleport="body">
								<div x-cloak x-show="videoModalIsOpen" x-transition.opacity.duration.200ms x-trap.inert.noscroll="videoModalIsOpen" x-on:keydown.esc.window="videoModalIsOpen = false, $refs.video.pause()" x-on:click.self="videoModalIsOpen = false, $refs.video.pause()" class="fixed inset-0 z-30 flex items-center justify-center bg-black/20 p-4 backdrop-blur-md lg:p-8" role="dialog" aria-modal="true" aria-labelledby="videoModalTitle">
										<!-- Modal Dialog -->
										<div x-show="videoModalIsOpen" x-transition:enter="transition ease-out duration-300 delay-200" x-transition:enter-start="opacity-0 translate-y-8" x-transition:enter-end="opacity-100 translate-y-0" class="max-w-2xl w-full relative">
												<!-- Close Button -->
												<button type="button" x-show="videoModalIsOpen" x-on:click="videoModalIsOpen = false, $refs.video.pause()" x-transition:enter="transition ease-out duration-200 delay-500" x-transition:enter-start="opacity-0 scale-0" x-transition:enter-end="opacity-100 scale-100" class="absolute -top-12 right-0 flex items-center justify-center rounded-full bg-surface-alt p-1.5 text-on-surface-strong hover:opacity-75 active:opacity-100 dark:bg-surface-dark-alt dark:text-on-surface-dark-strong cursor-pointer" aria-label="{{ __('pages/public/home.heroSection.videoModal_CloseBtn_ariaLabel') }}">
													<x-shared.svg.icons.pui.x aria-hidden="true" stroke="currentColor" fill="none" stroke-width="1.4" class="w-4 h-4" />
												</button>
												<!-- Video -->
												<video x-ref="video" class="w-full max-w-2xl rounded-radius aspect-video" controls>
														{{--
														<track default kind="captions" srclang="en" src="path to your .vtt file" />
														--}}
														<source src="https://myprompts-video-pull.b-cdn.net/myprompts-demo-video.webm" type="video/webm">
														<source src="https://myprompts-video-pull.b-cdn.net/myprompts-demo-video.mp4" type="video/mp4">
														{{ __('pages/public/home.heroSection.videoModal_videoUnsupported') }}
												</video>
										</div>
								</div>
							</template>
					</div>
				</div>
			</div>
		</div>
		<div class="relative mt-12 max-w-screen-xl mx-auto isolate rounded-xl md:mt-16" x-data="{ shown: true {{-- false --}} }" {{-- x-intersect.once="shown = true" --}}>
			<figure
			{{-- x-cloak="bevarplads" --}}
			:class="shown ? 'opacity-100 translate-y-[0px] blur-[0px] transition duration-1500 ease-back-in-out' : 'opacity-0 translate-y-[120px] blur-[5px]'"
			class="delay-500 will-change-transform dark:bg-surface-dark border dark:border-surface-dark-alt backdrop-blur-3xl rounded-xl shadow-2xl overflow-hidden hero-scale-animation"
			style="view-timeline-name: --figure-reveal; view-timeline-axis: block; animation: scale-on-scroll linear; animation-timeline: --figure-reveal; animation-range: entry 50% cover 100%;"
			>
				<img src="{{ asset('images/blade_pages/public/home/hero-banner-large.webp') }}" width="1468" height="815" fetchpriority="high" alt="{{ __('pages/public/home.heroSection.bannerImg') }}">
			</figure>

			{{-- Blurry glow effect --}}
			<div
				x-cloak="bevarplads"
				:class="shown ? 'opacity-100 scale-100 transition duration-2000 ease-back-in-out' : 'opacity-0 scale-80'"
				class="delay-500 will-change-transform absolute dark:bg-primary inset-5 blur-[50px] -z-10">
			</div>
			<div
				x-cloak="bevarplads"
				:class="shown ? 'opacity-100 scale-100 transition duration-2000 ease-back-out' : 'opacity-0 scale-40'"
				class="delay-1500 will-change-transform absolute inset-0 dark:bg-primary/65 blur-[200px] scale-y-75 scale-x-125 rounded-full -z-10">
			</div>
		</div>
	</div>
</section>

{{-- brand section --}}
{{--
<section class="py-8 md:py-16">
	<div class="">
		<p class="dark:text-on-surface-dark">
			Powering data insights for today's startup and tomorrow's leader.
		</p>
		<div class="">

		</div>
	</div>
</section>
--}}

{{-- Feature section --}}
@php
$features = [
	[
		'id' => 'promptList_interface',
		'icon' => 'bootstrap.card-heading',
		'iconBoxColor' => 'bg-[#245AC4]',
		'imgSrc' => 'images/blade_pages/public/home/feature-1-dark-large.webp',
	],
	[
		'id' => 'promptForm_interface',
		'icon' => 'pui.pencil-square',
		'iconBoxColor' => 'bg-[#0A96AC]',
		'imgSrc' => 'images/blade_pages/public/home/feature-2-dark-large.webp',
	],
	[
		'id' => 'copying',
		'icon' => 'bootstrap.clipboard',
		'iconBoxColor' => 'bg-[#B48E0B]',
	],
	[
		'id' => 'categories',
		'icon' => 'bootstrap.collection',
		'iconBoxColor' => 'bg-[#B2393A]',
	],
	[
		'id' => 'security',
		'icon' => 'bootstrap.shield-lock',
		'iconBoxColor' => 'bg-[#7F44B2]',
	],
];
@endphp
<section id="feature-section" class="mt-7.5 md:mt-12 scroll-mt-27.5 md:scroll-mt-22.5">
	<div class="">
		<div {{-- section-head --}}
		x-data="{ shown: false }" x-intersect.once="shown = true"
		class="pb-8 md:pb-16 text-center lg:max-w-screen-sm lg:mx-auto"
		>
			<p
			x-cloak="bevarplads"
			:class="shown ? 'opacity-100 translate-y-[0px] blur-[0px] transition duration-400 ease-out' : 'opacity-0 translate-y-[20px] blur-[2px]'"
			class="delay-0 will-change-transform text-sm uppercase tracking-wider font-medium dark:bg-surface-dark-alt dark:text-on-surface-dark max-w-max mx-auto px-3 py-1 rounded-full border-t dark:border-primary/20 backdrop-blur-3xl"
			>
				{{ __('pages/public/home.featureSection.subtitle') }}
			</p>
			<h2
			x-cloak="bevarplads"
			:class="shown ? 'opacity-100 translate-y-[0px] blur-[0px] transition duration-400 ease-out' : 'opacity-0 translate-y-[20px] blur-[2px]'"
			class="delay-200 will-change-transform text-on-surface-strong dark:text-on-surface-dark-strong text-3xl font-semibold leading-snug py-3 md:text-[40px]"
			>
				{{ __('pages/public/home.featureSection.title') }}
			</h2>
			<p
			x-cloak="bevarplads"
			:class="shown ? 'opacity-100 translate-y-[0px] blur-[0px] transition duration-400 ease-out' : 'opacity-0 translate-y-[20px] blur-[2px]'"
			class="delay-400 will-change-transform text-on-surface dark:text-on-surface-dark md:text-xl"
			>
				{{ __('pages/public/home.featureSection.text') }}
			</p>
		</div>
		<div class="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-6">
			@foreach ($features as $feature)
				<div {{-- FeatureCard --}}
					x-data="{ shown: false }" x-intersect.once="shown = true"
					@class([
						'relative overflow-hidden p-[1px] ring ring-inset ring-outline/50 dark:ring-outline-dark/50 rounded-radius',
						'md:col-span-2 lg:col-span-1 xl:col-span-3' => $loop->index < 2,
						'xl:col-span-2' => $loop->index >= 2,
					])
				>
					<div class="flex flex-col relative isolate bg-surface-alt dark:bg-surface-dark-alt backdrop-blur-md rounded-radius overflow-hidden h-full">
						<div class="p-8 grow">{{-- FeatureCard body --}}
							<div
							x-cloak="bevarplads"
							:class="shown ? 'opacity-100 translate-y-[0px] blur-[0px] transition duration-400 ease-out' : 'opacity-0 translate-y-[20px] blur-[2px]'"
							class="delay-0 will-change-transform w-16 h-16 grid place-items-center rounded-full flex-shrink-0 {{ $feature['iconBoxColor'] }}"
							>
								<x-dynamic-component :component="'shared.svg.icons.'.$feature['icon']" aria-hidden="true" fill="currentColor" class="w-7.5 h-7.5 text-on-surface dark:text-on-surface-dark" />
							</div>
							<h3
							x-cloak="bevarplads"
							:class="shown ? 'opacity-100 translate-y-[0px] blur-[0px] transition duration-400 ease-out' : 'opacity-0 translate-y-[20px] blur-[2px]'"
							class="delay-200 will-change-transform text-on-surface-strong dark:text-on-surface-dark-strong text-xl font-medium mt-4 mb-3"
							>
								{{ __('pages/public/home.featureSection.featureCardsTitle.'.$feature['id']) }}
							</h3>
							<p
							x-cloak="bevarplads"
							:class="shown ? 'opacity-100 translate-y-[0px] blur-[0px] transition duration-400 ease-out' : 'opacity-0 translate-y-[20px] blur-[2px]'"
							class="delay-400 will-change-transform text-on-surface dark:text-on-surface-dark {{-- line-clamp-2 --}}"
							>
								{{ __('pages/public/home.featureSection.featureCardsDesc.'.$feature['id']) }}
							</p>
							{{--
							<div
							x-cloak="bevarplads"
							:class="shown ? 'opacity-100 translate-y-[0px] blur-[0px] transition duration-400 ease-out' : 'opacity-0 translate-y-[20px] blur-[2px]'"
							class="delay-600 will-change-transform h-auto mt-3"
							>
								<a
								href="#"
								class="group w-fit font-medium text-primary underline-offset-2 hover:underline focus:underline focus:outline-hidden dark:text-primary-darkfff"
								>
									{{ __('pages/public/home.featureSection.featureCardsBtn') }}
									<x-shared.svg.icons.pui.arrow-right-short aria-hidden="true" stroke="currentColor" fill="none" stroke-width="2.5" class="inline size-4 transition-transform duration-150 group-hover:translate-x-1" />
								</a>
							</div>
							--}}
						</div>
						@if (!empty($feature['imgSrc']))
							<figure {{-- FeatureCard image --}}
							x-cloak="bevarplads"
							:class="shown ? 'opacity-100 translate-y-[0px] blur-[0px] transition duration-400 ease-out' : 'opacity-0 translate-y-[20px] blur-[2px]'"
							class="delay-800 will-change-transform p-6 pt-0"
							>
								<img src="{{ asset($feature['imgSrc']) }}" alt="{{ __('pages/public/home.featureSection.featureCardsImg.'.$feature['id']) }}" class="{{ false ? 'border dark:border-surface-dark-alt' : 'border border-outline dark:border-outline-dark' }}">
							</figure>
						@endif
					</div>
				</div>
			@endforeach
		</div>
	</div>
</section>

{{-- FAQ section --}}
@php
$faqs = [
	[
		'id' => '0',
	],
	[
		'id' => '1',
	],
	[
		'id' => '2',
	],
	[
		'id' => '3',
	],
	[
		'id' => '4',
	],
	[
		'id' => '5',
	],
];
@endphp
<section id="faq-section" class="mt-16.5 md:mt-21.5 pb-16.5 md:pb-21.5 scroll-mt-27.5 md:scroll-mt-22.5">
	<div {{-- section-head --}}
	x-data="{ shown: false }" x-intersect.once="shown = true"
	class="pb-8 md:pb-16 text-center lg:max-w-screen-sm lg:mx-auto"
	>
		<p
		x-cloak="bevarplads"
		:class="shown ? 'opacity-100 translate-y-[0px] blur-[0px] transition duration-400 ease-out' : 'opacity-0 translate-y-[20px] blur-[2px]'"
		class="delay-0 will-change-transform text-sm uppercase tracking-wider font-medium dark:bg-surface-dark-alt dark:text-on-surface-dark max-w-max mx-auto px-3 py-1 rounded-full border-t dark:border-primary/20 backdrop-blur-3xl"
		>
			{{ __('pages/public/home.faqSection.subtitle') }}
		</p>
		<h2
		x-cloak="bevarplads"
		:class="shown ? 'opacity-100 translate-y-[0px] blur-[0px] transition duration-400 ease-out' : 'opacity-0 translate-y-[20px] blur-[2px]'"
		class="delay-200 will-change-transform text-on-surface-strong dark:text-on-surface-dark-strong text-3xl font-semibold leading-snug py-3 md:text-[40px]"
		>
			{{ __('pages/public/home.faqSection.title') }}
		</h2>
		<p
		x-cloak="bevarplads"
		:class="shown ? 'opacity-100 translate-y-[0px] blur-[0px] transition duration-400 ease-out' : 'opacity-0 translate-y-[20px] blur-[2px]'"
		class="delay-400 will-change-transform text-on-surface dark:text-on-surface-dark md:text-xl"
		>
			{{ __('pages/public/home.faqSection.text') }}
		</p>
	</div>
	<div class="max-w-screen-md mx-auto"> {{-- FAQ Accordion --}}
		<div class="w-full divide-y divide-outline overflow-hidden rounded-radius border border-outline bg-surface-alt/40 text-on-surface dark:divide-outline-dark dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:text-on-surface-dark">
			@foreach ($faqs as $faq)
				<div x-data="{ isExpanded: false }">
						<button id="controls_{{ $faq['id'] }}" type="button" class="flex w-full items-center justify-between gap-4 bg-surface-alt p-4 text-left underline-offset-2 hover:bg-surface-alt/75 focus-visible:bg-surface-alt/75 focus-visible:underline focus-visible:outline-hidden dark:bg-surface-dark-alt dark:hover:bg-surface-dark-alt/75 dark:focus-visible:bg-surface-dark-alt/75 cursor-pointer" aria-controls="{{ $faq['id'] }}" x-on:click="isExpanded = ! isExpanded" x-bind:class="isExpanded ? 'text-on-surface-strong dark:text-on-surface-dark-strong font-bold'  : 'text-on-surface dark:text-on-surface-dark font-medium'" x-bind:aria-expanded="isExpanded ? 'true' : 'false'">
								{{ __('pages/public/home.faqSection.faqsQuestion.'.$faq['id']) }}
								<x-shared.svg.icons.pui.chevron-down-accordion fill="none" stroke-width="2" stroke="currentColor" class="size-5 shrink-0 transition" aria-hidden="true" x-bind:class="isExpanded  ?  'rotate-180'  :  ''" />
						</button>
						<div x-cloak x-show="isExpanded" id="{{ $faq['id'] }}" role="region" aria-labelledby="controls_{{ $faq['id'] }}" x-collapse>
								<div class="p-4 text-sm sm:text-base text-pretty">
									{!! __('pages/public/home.faqSection.faqsAnswer.'.$faq['id']) !!}
								</div>
						</div>
				</div>
			@endforeach
		</div>
	</div>
	{{-- Support message --}}
	{{--
	<div class="mt-8 text-center lg:max-w-screen-sm lg:mx-auto">
		<p class="text-on-surface dark:text-on-surface-dark">{!! __('pages/public/home.faqSection.supportMessage') !!}</p>
	</div>
	--}}
</section>

</x-layouts.guest>