@prepend('head')
	{{-- Structured Data (schema.org) --}}
	<script type="application/ld+json">
	{!! json_encode([
		'@context' => 'https://schema.org/',
		'@type' => 'WebPage',
		'name' => __('pages/public/terms-of-use.header.title'),
		'description' => __('pages/public/terms-of-use.header.subtitle'),
		'url' => route('public.public-pages.terms-of-use'),
		'isPartOf' => [
			'@type' => 'WebSite',
			'name' => config('app.name'),
			'url' => \Illuminate\Support\Str::finish(config('app.url'), '/'),
		],
		'about' => [
			'@type' => 'Thing',
			'name' => 'Terms of Use',
		],
		'dateModified' => config('app.terms_of_use_updated').'-01T00:00:00Z',
		'author' => [
			'@type' => 'Organization',
			'name' => config('app.name'),
		],
		'publisher' => [
			'@type' => 'Organization',
			'name' => config('app.name'),
			'url' => \Illuminate\Support\Str::finish(config('app.url'), '/'),
		],
	], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
	</script>

	<script type="application/ld+json">
	{!! json_encode([
		'@context' => 'https://schema.org/',
		'@type' => 'Article',
		'headline' => __('pages/public/terms-of-use.header.title'),
		'description' => __('pages/public/terms-of-use.header.subtitle'),
		'author' => [
			'@type' => 'Organization',
			'name' => config('app.name'),
		],
		'publisher' => [
			'@type' => 'Organization',
			'name' => config('app.name'),
			'url' => \Illuminate\Support\Str::finish(config('app.url'), '/'),
		],
		'datePublished' => '2025-07-01T00:00:00Z',
		'dateModified' => config('app.terms_of_use_updated').'-01T00:00:00Z',
		'mainEntityOfPage' => [
			'@type' => 'WebPage',
			'@id' => route('public.public-pages.terms-of-use'),
		],
		'articleSection' => 'Legal',
		'keywords' => [
			'terms of use',
			'terms of service',
			'user agreement',
			'legal terms',
			'service conditions',
			config('app.name'),
		],
	], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
	</script>
@endprepend

@php
	$titleKey = $titleKey ?? 'shared/title.blade_pages__public__terms_of_use';
	$titleParams = $titleParams ?? [];
	$darkMode = $darkMode ?? NULL;
	// ___ SEO ___ //
	$metaDescription = $metaDescription ?? __('shared/seo.metaDescription.blade_pages__public__terms_of_use');
@endphp

<x-layouts.guest
	:title-key="$titleKey"
	:title-params="$titleParams"
	:dark-mode="$darkMode"
	class=""
	{{-- ___ SEO ___ --}}
	:meta-description="$metaDescription"
>

	<div class="py-10 md:py-16">
		<div class="container max-w-4xl mx-auto">
			{{-- Header Section --}}
			<div class="text-center mb-12 md:mb-16">
				<h1 class="text-on-surface-strong dark:text-on-surface-dark-strong text-3xl font-semibold leading-snug mb-4 md:text-4xl lg:text-5xl text-balance">
					{{ __('pages/public/terms-of-use.header.title') }}
				</h1>
				<p class="text-on-surface dark:text-on-surface-dark text-lg md:text-xl max-w-2xl mx-auto">
					{{ __('pages/public/terms-of-use.header.subtitle') }}
				</p>
				<p class="text-on-surface/75 dark:text-on-surface-dark/75 text-sm mt-4">
					{{ __('pages/public/terms-of-use.header.lastUpdated') }}
				</p>
			</div>

			{{-- Content Sections --}}
			<div class="prose prose-lg max-w-none">
				{{-- Introduction --}}
				<section class="mb-12">
					<h2 class="text-on-surface-strong dark:text-on-surface-dark-strong text-2xl font-semibold mb-6">
						{{ __('pages/public/terms-of-use.introduction.title') }}
					</h2>
					<div class="text-on-surface dark:text-on-surface-dark space-y-4">
						<p>{{ __('pages/public/terms-of-use.introduction.paragraph1') }}</p>
						<p>{{ __('pages/public/terms-of-use.introduction.paragraph2') }}</p>
						<p>{{ __('pages/public/terms-of-use.introduction.paragraph3') }}</p>
					</div>
				</section>

				{{-- Service Description --}}
				<section class="mb-12">
					<h2 class="text-on-surface-strong dark:text-on-surface-dark-strong text-2xl font-semibold mb-6">
						{{ __('pages/public/terms-of-use.service.title') }}
					</h2>
					<div class="text-on-surface dark:text-on-surface-dark space-y-4">
						<p>{{ __('pages/public/terms-of-use.service.description') }}</p>
						<p>{{ __('pages/public/terms-of-use.service.features') }}</p>
						<ul class="list-disc pl-6 space-y-1 text-on-surface/90 dark:text-on-surface-dark/90">
							<li>{{ __('pages/public/terms-of-use.service.featuresList.storage') }}</li>
							<li>{{ __('pages/public/terms-of-use.service.featuresList.organization') }}</li>
							<li>{{ __('pages/public/terms-of-use.service.featuresList.management') }}</li>
							<li>{{ __('pages/public/terms-of-use.service.featuresList.access') }}</li>
						</ul>
					</div>
				</section>

				{{-- Account Registration --}}
				<section class="mb-12">
					<h2 class="text-on-surface-strong dark:text-on-surface-dark-strong text-2xl font-semibold mb-6">
						{{ __('pages/public/terms-of-use.account.title') }}
					</h2>
					<div class="text-on-surface dark:text-on-surface-dark space-y-4">
						<p>{{ __('pages/public/terms-of-use.account.registration') }}</p>
						<p>{{ __('pages/public/terms-of-use.account.requirements') }}</p>
						<ul class="list-disc pl-6 space-y-1 text-on-surface/90 dark:text-on-surface-dark/90">
							<li>{{ __('pages/public/terms-of-use.account.requirementsList.age') }}</li>
							<li>{{ __('pages/public/terms-of-use.account.requirementsList.accurate') }}</li>
							<li>{{ __('pages/public/terms-of-use.account.requirementsList.secure') }}</li>
							<li>{{ __('pages/public/terms-of-use.account.requirementsList.responsible') }}</li>
						</ul>
						<p>{{ __('pages/public/terms-of-use.account.security') }}</p>
					</div>
				</section>

				{{-- Acceptable Use --}}
				<section class="mb-12">
					<h2 class="text-on-surface-strong dark:text-on-surface-dark-strong text-2xl font-semibold mb-6">
						{{ __('pages/public/terms-of-use.usage.title') }}
					</h2>
					<div class="text-on-surface dark:text-on-surface-dark space-y-6">
						<div>
							<h3 class="text-on-surface-strong dark:text-on-surface-dark-strong text-xl font-medium mb-3">
								{{ __('pages/public/terms-of-use.usage.permitted.title') }}
							</h3>
							<p class="mb-3">{{ __('pages/public/terms-of-use.usage.permitted.description') }}</p>
							<ul class="list-disc pl-6 space-y-1 text-on-surface/90 dark:text-on-surface-dark/90">
								<li>{{ __('pages/public/terms-of-use.usage.permitted.list.personal') }}</li>
								<li>{{ __('pages/public/terms-of-use.usage.permitted.list.professional') }}</li>
								<li>{{ __('pages/public/terms-of-use.usage.permitted.list.educational') }}</li>
								<li>{{ __('pages/public/terms-of-use.usage.permitted.list.creative') }}</li>
							</ul>
						</div>

						<div>
							<h3 class="text-on-surface-strong dark:text-on-surface-dark-strong text-xl font-medium mb-3">
								{{ __('pages/public/terms-of-use.usage.prohibited.title') }}
							</h3>
							<p class="mb-3">{{ __('pages/public/terms-of-use.usage.prohibited.description') }}</p>
							<ul class="list-disc pl-6 space-y-1 text-on-surface/90 dark:text-on-surface-dark/90">
								<li>{{ __('pages/public/terms-of-use.usage.prohibited.list.illegal') }}</li>
								<li>{{ __('pages/public/terms-of-use.usage.prohibited.list.harmful') }}</li>
								<li>{{ __('pages/public/terms-of-use.usage.prohibited.list.harassment') }}</li>
								<li>{{ __('pages/public/terms-of-use.usage.prohibited.list.spam') }}</li>
								<li>{{ __('pages/public/terms-of-use.usage.prohibited.list.malware') }}</li>
								<li>{{ __('pages/public/terms-of-use.usage.prohibited.list.reverse') }}</li>
								<li>{{ __('pages/public/terms-of-use.usage.prohibited.list.overload') }}</li>
							</ul>
						</div>
					</div>
				</section>

				{{-- Content Ownership --}}
				<section class="mb-12">
					<h2 class="text-on-surface-strong dark:text-on-surface-dark-strong text-2xl font-semibold mb-6">
						{{ __('pages/public/terms-of-use.content.title') }}
					</h2>
					<div class="text-on-surface dark:text-on-surface-dark space-y-6">
						<div>
							<h3 class="text-on-surface-strong dark:text-on-surface-dark-strong text-xl font-medium mb-3">
								{{ __('pages/public/terms-of-use.content.ownership.title') }}
							</h3>
							<p>{{ __('pages/public/terms-of-use.content.ownership.description') }}</p>
						</div>

						<div>
							<h3 class="text-on-surface-strong dark:text-on-surface-dark-strong text-xl font-medium mb-3">
								{{ __('pages/public/terms-of-use.content.responsibility.title') }}
							</h3>
							<p>{{ __('pages/public/terms-of-use.content.responsibility.description') }}</p>
						</div>

						<div>
							<h3 class="text-on-surface-strong dark:text-on-surface-dark-strong text-xl font-medium mb-3">
								{{ __('pages/public/terms-of-use.content.backup.title') }}
							</h3>
							<p>{{ __('pages/public/terms-of-use.content.backup.description') }}</p>
						</div>
					</div>
				</section>

				{{-- Intellectual Property Rights --}}
				<section class="mb-12">
					<h2 class="text-on-surface-strong dark:text-on-surface-dark-strong text-2xl font-semibold mb-6">
						{{ __('pages/public/terms-of-use.intellectualProperty.title') }}
					</h2>
					<div class="text-on-surface dark:text-on-surface-dark space-y-6">
						<div>
							<h3 class="text-on-surface-strong dark:text-on-surface-dark-strong text-xl font-medium mb-3">
								{{ __('pages/public/terms-of-use.intellectualProperty.platform.title') }}
							</h3>
							<p>{{ __('pages/public/terms-of-use.intellectualProperty.platform.description') }}</p>
						</div>

						<div>
							<h3 class="text-on-surface-strong dark:text-on-surface-dark-strong text-xl font-medium mb-3">
								{{ __('pages/public/terms-of-use.intellectualProperty.proprietary.title') }}
							</h3>
							<p>{{ __('pages/public/terms-of-use.intellectualProperty.proprietary.description') }}</p>
						</div>

						<div>
							<h3 class="text-on-surface-strong dark:text-on-surface-dark-strong text-xl font-medium mb-3">
								{{ __('pages/public/terms-of-use.intellectualProperty.userContent.title') }}
							</h3>
							<p>{{ __('pages/public/terms-of-use.intellectualProperty.userContent.description') }}</p>
						</div>
					</div>
				</section>

				{{-- Service Availability --}}
				<section class="mb-12">
					<h2 class="text-on-surface-strong dark:text-on-surface-dark-strong text-2xl font-semibold mb-6">
						{{ __('pages/public/terms-of-use.availability.title') }}
					</h2>
					<div class="text-on-surface dark:text-on-surface-dark space-y-4">
						<p>{{ __('pages/public/terms-of-use.availability.effort') }}</p>
						<p>{{ __('pages/public/terms-of-use.availability.infrastructure') }}</p>
						<p>{{ __('pages/public/terms-of-use.availability.interruptions') }}</p>
						<ul class="list-disc pl-6 space-y-1 text-on-surface/90 dark:text-on-surface-dark/90">
							<li>{{ __('pages/public/terms-of-use.availability.reasons.maintenance') }}</li>
							<li>{{ __('pages/public/terms-of-use.availability.reasons.technical') }}</li>
							<li>{{ __('pages/public/terms-of-use.availability.reasons.security') }}</li>
							<li>{{ __('pages/public/terms-of-use.availability.reasons.legal') }}</li>
							<li>{{ __('pages/public/terms-of-use.availability.reasons.provider') }}</li>
						</ul>
						<p>{{ __('pages/public/terms-of-use.availability.notification') }}</p>
					</div>
				</section>

				{{-- Privacy and Data Protection Reference --}}
				<section class="mb-12">
					<h2 class="text-on-surface-strong dark:text-on-surface-dark-strong text-2xl font-semibold mb-6">
						{{ __('pages/public/terms-of-use.privacy.title') }}
					</h2>
					<div class="text-on-surface dark:text-on-surface-dark space-y-4">
						<p>{{ __('pages/public/terms-of-use.privacy.overview') }}</p>
						<div class="bg-surface-alt/50 dark:bg-surface-dark-alt/50 rounded-radius p-4">
							<p class="font-medium text-on-surface-strong dark:text-on-surface-dark-strong mb-2">
								{{ __('pages/public/terms-of-use.privacy.reference.title') }}
							</p>
							<p class="text-sm">{{ __('pages/public/terms-of-use.privacy.reference.description') }}</p>
						</div>
						<p>{{ __('pages/public/terms-of-use.privacy.compliance') }}</p>
					</div>
				</section>

				{{-- Termination --}}
				<section class="mb-12">
					<h2 class="text-on-surface-strong dark:text-on-surface-dark-strong text-2xl font-semibold mb-6">
						{{ __('pages/public/terms-of-use.termination.title') }}
					</h2>
					<div class="text-on-surface dark:text-on-surface-dark space-y-6">
						<div>
							<h3 class="text-on-surface-strong dark:text-on-surface-dark-strong text-xl font-medium mb-3">
								{{ __('pages/public/terms-of-use.termination.byUser.title') }}
							</h3>
							<p>{{ __('pages/public/terms-of-use.termination.byUser.description') }}</p>
						</div>

						<div>
							<h3 class="text-on-surface-strong dark:text-on-surface-dark-strong text-xl font-medium mb-3">
								{{ __('pages/public/terms-of-use.termination.byUs.title') }}
							</h3>
							<p class="mb-3">{{ __('pages/public/terms-of-use.termination.byUs.description') }}</p>
							<ul class="list-disc pl-6 space-y-1 text-on-surface/90 dark:text-on-surface-dark/90">
								<li>{{ __('pages/public/terms-of-use.termination.byUs.reasons.violation') }}</li>
								<li>{{ __('pages/public/terms-of-use.termination.byUs.reasons.illegal') }}</li>
								<li>{{ __('pages/public/terms-of-use.termination.byUs.reasons.inactive') }}</li>
								<li>{{ __('pages/public/terms-of-use.termination.byUs.reasons.discretion') }}</li>
							</ul>
						</div>

						<div>
							<h3 class="text-on-surface-strong dark:text-on-surface-dark-strong text-xl font-medium mb-3">
								{{ __('pages/public/terms-of-use.termination.effect.title') }}
							</h3>
							<p>{{ __('pages/public/terms-of-use.termination.effect.description') }}</p>
						</div>
					</div>
				</section>

				{{-- Disclaimers --}}
				<section class="mb-12">
					<h2 class="text-on-surface-strong dark:text-on-surface-dark-strong text-2xl font-semibold mb-6">
						{{ __('pages/public/terms-of-use.disclaimers.title') }}
					</h2>
					<div class="text-on-surface dark:text-on-surface-dark space-y-4">
						<div class="bg-surface-alt/50 dark:bg-surface-dark-alt/50 rounded-radius p-4">
							<p class="font-medium text-on-surface-strong dark:text-on-surface-dark-strong mb-2">
								{{ __('pages/public/terms-of-use.disclaimers.warranty.title') }}
							</p>
							<p class="text-sm">{{ __('pages/public/terms-of-use.disclaimers.warranty.description') }}</p>
						</div>
						<div class="bg-surface-alt/50 dark:bg-surface-dark-alt/50 rounded-radius p-4">
							<p class="font-medium text-on-surface-strong dark:text-on-surface-dark-strong mb-2">
								{{ __('pages/public/terms-of-use.disclaimers.liability.title') }}
							</p>
							<p class="text-sm">{{ __('pages/public/terms-of-use.disclaimers.liability.description') }}</p>
						</div>
						<div class="bg-surface-alt/50 dark:bg-surface-dark-alt/50 rounded-radius p-4">
							<p class="font-medium text-on-surface-strong dark:text-on-surface-dark-strong mb-2">
								{{ __('pages/public/terms-of-use.disclaimers.thirdParty.title') }}
							</p>
							<p class="text-sm">{{ __('pages/public/terms-of-use.disclaimers.thirdParty.description') }}</p>
						</div>
					</div>
				</section>

				{{-- Changes to Terms --}}
				<section class="mb-12">
					<h2 class="text-on-surface-strong dark:text-on-surface-dark-strong text-2xl font-semibold mb-6">
						{{ __('pages/public/terms-of-use.changes.title') }}
					</h2>
					<div class="text-on-surface dark:text-on-surface-dark space-y-4">
						<p>{{ __('pages/public/terms-of-use.changes.description') }}</p>
						<p>{{ __('pages/public/terms-of-use.changes.notification') }}</p>
						<p>{{ __('pages/public/terms-of-use.changes.continued') }}</p>
					</div>
				</section>

				{{-- Governing Law --}}
				<section class="mb-12">
					<h2 class="text-on-surface-strong dark:text-on-surface-dark-strong text-2xl font-semibold mb-6">
						{{ __('pages/public/terms-of-use.law.title') }}
					</h2>
					<div class="text-on-surface dark:text-on-surface-dark space-y-4">
						<p>{{ __('pages/public/terms-of-use.law.governing') }}</p>
						<p>{{ __('pages/public/terms-of-use.law.disputes') }}</p>
					</div>
				</section>

				{{-- Contact Information --}}
				<section class="mb-12">
					<h2 class="text-on-surface-strong dark:text-on-surface-dark-strong text-2xl font-semibold mb-6">
						{{ __('pages/public/terms-of-use.contact.title') }}
					</h2>
					<div class="text-on-surface dark:text-on-surface-dark space-y-4">
						<p>{{ __('pages/public/terms-of-use.contact.description') }}</p>
						<div class="bg-surface-alt/50 dark:bg-surface-dark-alt/50 rounded-radius p-4">
							<p class="font-medium text-on-surface-strong dark:text-on-surface-dark-strong mb-2">
								{{ __('pages/public/terms-of-use.contact.info.title') }}
							</p>
							<p>
									{{ __('pages/public/terms-of-use.contact.info.email') }}
									<x-muddle-text-random :email="config('app.legal_email')" />
							</p>
							<p>{{ __('pages/public/terms-of-use.contact.info.response') }}</p>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>

</x-layouts.guest>