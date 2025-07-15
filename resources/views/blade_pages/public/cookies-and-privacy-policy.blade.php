@prepend('head')
	{{-- Structured Data (schema.org) --}}
	<script type="application/ld+json">
	{!! json_encode([
		'@context' => 'https://schema.org/',
		'@type' => 'WebPage',
		'name' => __('pages/public/cookies-and-privacy-policy.header.title'),
		'description' => __('pages/public/cookies-and-privacy-policy.header.subtitle'),
		'url' => route('public.public-pages.cookies-and-privacy-policy'),
		'isPartOf' => [
			'@type' => 'WebSite',
			'name' => config('app.name'),
			'url' => \Illuminate\Support\Str::finish(config('app.url'), '/'),
		],
		'about' => [
			'@type' => 'Thing',
			'name' => 'Privacy Policy',
		],
		'dateModified' => config('app.privacy_policy_updated').'-01T00:00:00Z',
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
		'headline' => __('pages/public/cookies-and-privacy-policy.header.title'),
		'description' => __('pages/public/cookies-and-privacy-policy.header.subtitle'),
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
		'dateModified' => config('app.privacy_policy_updated').'-01T00:00:00Z',
		'mainEntityOfPage' => [
			'@type' => 'WebPage',
			'@id' => route('public.public-pages.cookies-and-privacy-policy'),
		],
		'articleSection' => 'Legal',
		'keywords' => [
			'privacy policy',
			'cookies',
			'GDPR',
			'data protection',
			'user privacy',
			config('app.name'),
		],
	], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
	</script>
@endprepend

@php
	$titleKey = $titleKey ?? 'shared/title.blade_pages__public__cookies_and_privacy_policy';
	$titleParams = $titleParams ?? [];
	$darkMode = $darkMode ?? NULL;
	// ___ SEO ___ //
	$metaDescription = $metaDescription ?? __('shared/seo.metaDescription.blade_pages__public__cookies_and_privacy_policy');
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
					{{ __('pages/public/cookies-and-privacy-policy.header.title') }}
				</h1>
				<p class="text-on-surface dark:text-on-surface-dark text-lg md:text-xl max-w-2xl mx-auto">
					{{ __('pages/public/cookies-and-privacy-policy.header.subtitle') }}
				</p>
				<p class="text-on-surface/75 dark:text-on-surface-dark/75 text-sm mt-4">
					{{ __('pages/public/cookies-and-privacy-policy.header.lastUpdated') }}
				</p>
			</div>

			{{-- Content Sections --}}
			<div class="prose prose-lg max-w-none">
				{{-- Introduction --}}
				<section class="mb-12">
					<h2 class="text-on-surface-strong dark:text-on-surface-dark-strong text-2xl font-semibold mb-6">
						{{ __('pages/public/cookies-and-privacy-policy.introduction.title') }}
					</h2>
					<div class="text-on-surface dark:text-on-surface-dark space-y-4">
						<p>{{ __('pages/public/cookies-and-privacy-policy.introduction.paragraph1') }}</p>
						<p>{{ __('pages/public/cookies-and-privacy-policy.introduction.paragraph2') }}</p>
					</div>
				</section>

				{{-- Cookie Banner Explanation --}}
				<section class="mb-12">
					<h2 class="text-on-surface-strong dark:text-on-surface-dark-strong text-2xl font-semibold mb-6">
						{{ __('pages/public/cookies-and-privacy-policy.noBanner.title') }}
					</h2>
					<div class="text-on-surface dark:text-on-surface-dark space-y-4">
						<p>{{ __('pages/public/cookies-and-privacy-policy.noBanner.explanation') }}</p>
						<div class="bg-primary/10 dark:bg-primary-dark/10 border border-primary/20 dark:border-primary-dark/20 rounded-radius p-4">
							<p class="text-sm font-medium text-primary dark:text-primary-dark">
								{{ __('pages/public/cookies-and-privacy-policy.noBanner.notice') }}
							</p>
						</div>
					</div>
				</section>

				{{-- Cookies Section --}}
				<section class="mb-12">
					<h2 class="text-on-surface-strong dark:text-on-surface-dark-strong text-2xl font-semibold mb-6">
						{{ __('pages/public/cookies-and-privacy-policy.cookies.title') }}
					</h2>
					<div class="text-on-surface dark:text-on-surface-dark space-y-6">
						<p>{{ __('pages/public/cookies-and-privacy-policy.cookies.description') }}</p>
						
						<div>
							<h3 class="text-on-surface-strong dark:text-on-surface-dark-strong text-xl font-medium mb-4">
								{{ __('pages/public/cookies-and-privacy-policy.cookies.essential.title') }}
							</h3>
							<p class="mb-4">{{ __('pages/public/cookies-and-privacy-policy.cookies.essential.description') }}</p>
							
							{{-- Cookie Table --}}
							<div class="overflow-x-auto">
								<table class="w-full border border-outline/20 dark:border-outline-dark/20 rounded-radius">
									<thead class="bg-surface-alt/50 dark:bg-surface-dark-alt/50">
										<tr>
											<th class="text-left p-3 text-sm font-medium text-on-surface-strong dark:text-on-surface-dark-strong border-b border-outline/20 dark:border-outline-dark/20">
												{{ __('pages/public/cookies-and-privacy-policy.cookies.table.name') }}
											</th>
											<th class="text-left p-3 text-sm font-medium text-on-surface-strong dark:text-on-surface-dark-strong border-b border-outline/20 dark:border-outline-dark/20">
												{{ __('pages/public/cookies-and-privacy-policy.cookies.table.purpose') }}
											</th>
											<th class="text-left p-3 text-sm font-medium text-on-surface-strong dark:text-on-surface-dark-strong border-b border-outline/20 dark:border-outline-dark/20">
												{{ __('pages/public/cookies-and-privacy-policy.cookies.table.lifespan') }}
											</th>
											<th class="text-left p-3 text-sm font-medium text-on-surface-strong dark:text-on-surface-dark-strong border-b border-outline/20 dark:border-outline-dark/20">
												{{ __('pages/public/cookies-and-privacy-policy.cookies.table.category') }}
											</th>
										</tr>
									</thead>
									<tbody>
										<tr class="border-b border-outline/10 dark:border-outline-dark/10">
											<td class="p-3 text-sm">
												<strong class="text-on-surface-strong dark:text-on-surface-dark-strong">{{ __('pages/public/cookies-and-privacy-policy.cookies.list.session.name') }}</strong>
											</td>
											<td class="p-3 text-sm">{{ __('pages/public/cookies-and-privacy-policy.cookies.list.session.purpose') }}</td>
											<td class="p-3 text-sm">{{ __('pages/public/cookies-and-privacy-policy.cookies.list.session.lifespan') }}</td>
											<td class="p-3 text-sm">
												<span class="inline-flex items-center px-2 py-1 rounded-radius text-xs font-medium bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-200">
													{{ __('pages/public/cookies-and-privacy-policy.cookies.list.session.category') }}
												</span>
											</td>
										</tr>
										<tr class="border-b border-outline/10 dark:border-outline-dark/10">
											<td class="p-3 text-sm">
												<strong class="text-on-surface-strong dark:text-on-surface-dark-strong">{{ __('pages/public/cookies-and-privacy-policy.cookies.list.csrf.name') }}</strong>
											</td>
											<td class="p-3 text-sm">{{ __('pages/public/cookies-and-privacy-policy.cookies.list.csrf.purpose') }}</td>
											<td class="p-3 text-sm">{{ __('pages/public/cookies-and-privacy-policy.cookies.list.csrf.lifespan') }}</td>
											<td class="p-3 text-sm">
												<span class="inline-flex items-center px-2 py-1 rounded-radius text-xs font-medium bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-200">
													{{ __('pages/public/cookies-and-privacy-policy.cookies.list.csrf.category') }}
												</span>
											</td>
										</tr>
										<tr class="border-b border-outline/10 dark:border-outline-dark/10">
											<td class="p-3 text-sm">
												<strong class="text-on-surface-strong dark:text-on-surface-dark-strong">{{ __('pages/public/cookies-and-privacy-policy.cookies.list.auth.name') }}</strong>
											</td>
											<td class="p-3 text-sm">{{ __('pages/public/cookies-and-privacy-policy.cookies.list.auth.purpose') }}</td>
											<td class="p-3 text-sm">{{ __('pages/public/cookies-and-privacy-policy.cookies.list.auth.lifespan') }}</td>
											<td class="p-3 text-sm">
												<span class="inline-flex items-center px-2 py-1 rounded-radius text-xs font-medium bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-200">
													{{ __('pages/public/cookies-and-privacy-policy.cookies.list.auth.category') }}
												</span>
											</td>
										</tr>
										<tr>
											<td class="p-3 text-sm">
												<strong class="text-on-surface-strong dark:text-on-surface-dark-strong">{{ __('pages/public/cookies-and-privacy-policy.cookies.list.cloudflare.name') }}</strong>
											</td>
											<td class="p-3 text-sm">{{ __('pages/public/cookies-and-privacy-policy.cookies.list.cloudflare.purpose') }}</td>
											<td class="p-3 text-sm">{{ __('pages/public/cookies-and-privacy-policy.cookies.list.cloudflare.lifespan') }}</td>
											<td class="p-3 text-sm">
												<span class="inline-flex items-center px-2 py-1 rounded-radius text-xs font-medium bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-200">
													{{ __('pages/public/cookies-and-privacy-policy.cookies.list.cloudflare.category') }}
												</span>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</section>

				{{-- Data Collection --}}
				<section class="mb-12">
					<h2 class="text-on-surface-strong dark:text-on-surface-dark-strong text-2xl font-semibold mb-6">
						{{ __('pages/public/cookies-and-privacy-policy.dataCollection.title') }}
					</h2>
					<div class="text-on-surface dark:text-on-surface-dark space-y-6">
						<div>
							<h3 class="text-on-surface-strong dark:text-on-surface-dark-strong text-xl font-medium mb-3">
								{{ __('pages/public/cookies-and-privacy-policy.dataCollection.accountInfo.title') }}
							</h3>
							<p class="mb-3">{{ __('pages/public/cookies-and-privacy-policy.dataCollection.accountInfo.description') }}</p>
							<ul class="list-disc pl-6 space-y-1 text-on-surface/90 dark:text-on-surface-dark/90">
								<li>{{ __('pages/public/cookies-and-privacy-policy.dataCollection.accountInfo.items.username') }}</li>
								<li>{{ __('pages/public/cookies-and-privacy-policy.dataCollection.accountInfo.items.email') }}</li>
								<li>{{ __('pages/public/cookies-and-privacy-policy.dataCollection.accountInfo.items.password') }}</li>
							</ul>
						</div>

						<div>
							<h3 class="text-on-surface-strong dark:text-on-surface-dark-strong text-xl font-medium mb-3">
								{{ __('pages/public/cookies-and-privacy-policy.dataCollection.contentData.title') }}
							</h3>
							<p class="mb-3">{{ __('pages/public/cookies-and-privacy-policy.dataCollection.contentData.description') }}</p>
							<ul class="list-disc pl-6 space-y-1 text-on-surface/90 dark:text-on-surface-dark/90">
								<li>{{ __('pages/public/cookies-and-privacy-policy.dataCollection.contentData.items.prompts') }}</li>
								<li>{{ __('pages/public/cookies-and-privacy-policy.dataCollection.contentData.items.categories') }}</li>
								<li>{{ __('pages/public/cookies-and-privacy-policy.dataCollection.contentData.items.settings') }}</li>
							</ul>
						</div>

						<div>
							<h3 class="text-on-surface-strong dark:text-on-surface-dark-strong text-xl font-medium mb-3">
								{{ __('pages/public/cookies-and-privacy-policy.dataCollection.technicalData.title') }}
							</h3>
							<p class="mb-3">{{ __('pages/public/cookies-and-privacy-policy.dataCollection.technicalData.description') }}</p>
							<ul class="list-disc pl-6 space-y-1 text-on-surface/90 dark:text-on-surface-dark/90">
								<li>{{ __('pages/public/cookies-and-privacy-policy.dataCollection.technicalData.items.ipAddress') }}</li>
								<li>{{ __('pages/public/cookies-and-privacy-policy.dataCollection.technicalData.items.browserInfo') }}</li>
								<li>{{ __('pages/public/cookies-and-privacy-policy.dataCollection.technicalData.items.deviceInfo') }}</li>
							</ul>
						</div>
					</div>
				</section>

				{{-- Data Processors and Hosting --}}
				<section class="mb-12">
					<h2 class="text-on-surface-strong dark:text-on-surface-dark-strong text-2xl font-semibold mb-6">
						{{ __('pages/public/cookies-and-privacy-policy.dataProcessors.title') }}
					</h2>
					<div class="text-on-surface dark:text-on-surface-dark space-y-6">
						<p>{{ __('pages/public/cookies-and-privacy-policy.dataProcessors.description') }}</p>
						
						<div class="grid gap-6 md:grid-cols-1">
							<div class="border border-outline/20 dark:border-outline-dark/20 rounded-radius p-6">
								<h3 class="text-on-surface-strong dark:text-on-surface-dark-strong text-xl font-medium mb-3">
									{{ __('pages/public/cookies-and-privacy-policy.dataProcessors.hosting.title') }}
								</h3>
								<div class="space-y-3">
									<div>
										<p class="font-medium">{{ __('pages/public/cookies-and-privacy-policy.dataProcessors.hosting.provider.title') }}</p>
										<p class="text-sm text-on-surface/80 dark:text-on-surface-dark/80">{{ __('pages/public/cookies-and-privacy-policy.dataProcessors.hosting.provider.description') }}</p>
									</div>
									<div>
										<p class="font-medium">{{ __('pages/public/cookies-and-privacy-policy.dataProcessors.hosting.location.title') }}</p>
										<p class="text-sm text-on-surface/80 dark:text-on-surface-dark/80">{{ __('pages/public/cookies-and-privacy-policy.dataProcessors.hosting.location.description') }}</p>
									</div>
									<div>
										<p class="font-medium">{{ __('pages/public/cookies-and-privacy-policy.dataProcessors.hosting.purpose.title') }}</p>
										<p class="text-sm text-on-surface/80 dark:text-on-surface-dark/80">{{ __('pages/public/cookies-and-privacy-policy.dataProcessors.hosting.purpose.description') }}</p>
									</div>
								</div>
							</div>

							<div class="border border-outline/20 dark:border-outline-dark/20 rounded-radius p-6">
								<h3 class="text-on-surface-strong dark:text-on-surface-dark-strong text-xl font-medium mb-3">
									{{ __('pages/public/cookies-and-privacy-policy.dataProcessors.cloudflare.title') }}
								</h3>
								<div class="space-y-3">
									<div>
										<p class="font-medium">{{ __('pages/public/cookies-and-privacy-policy.dataProcessors.cloudflare.provider.title') }}</p>
										<p class="text-sm text-on-surface/80 dark:text-on-surface-dark/80">{{ __('pages/public/cookies-and-privacy-policy.dataProcessors.cloudflare.provider.description') }}</p>
									</div>
									<div>
										<p class="font-medium">{{ __('pages/public/cookies-and-privacy-policy.dataProcessors.cloudflare.services.title') }}</p>
										<ul class="text-sm text-on-surface/80 dark:text-on-surface-dark/80 list-disc list-inside space-y-1">
											<li>{{ __('pages/public/cookies-and-privacy-policy.dataProcessors.cloudflare.services.cdn') }}</li>
											<li>{{ __('pages/public/cookies-and-privacy-policy.dataProcessors.cloudflare.services.ddos') }}</li>
											<li>{{ __('pages/public/cookies-and-privacy-policy.dataProcessors.cloudflare.services.edge') }}</li>
											<li>{{ __('pages/public/cookies-and-privacy-policy.dataProcessors.cloudflare.services.security') }}</li>
										</ul>
									</div>
									<div>
										<p class="font-medium">{{ __('pages/public/cookies-and-privacy-policy.dataProcessors.cloudflare.transfer.title') }}</p>
										<p class="text-sm text-on-surface/80 dark:text-on-surface-dark/80">{{ __('pages/public/cookies-and-privacy-policy.dataProcessors.cloudflare.transfer.description') }}</p>
									</div>
								</div>
							</div>
						</div>

						<div class="bg-surface-alt/50 dark:bg-surface-dark-alt/50 rounded-radius p-4">
							<p class="text-sm font-medium text-on-surface-strong dark:text-on-surface-dark-strong mb-2">
								{{ __('pages/public/cookies-and-privacy-policy.dataProcessors.legal.title') }}
							</p>
							<p class="text-sm">{{ __('pages/public/cookies-and-privacy-policy.dataProcessors.legal.description') }}</p>
						</div>
					</div>
				</section>

				{{-- Data Usage --}}
				<section class="mb-12">
					<h2 class="text-on-surface-strong dark:text-on-surface-dark-strong text-2xl font-semibold mb-6">
						{{ __('pages/public/cookies-and-privacy-policy.dataUsage.title') }}
					</h2>
					<div class="text-on-surface dark:text-on-surface-dark space-y-4">
						<p>{{ __('pages/public/cookies-and-privacy-policy.dataUsage.description') }}</p>
						<ul class="list-disc pl-6 space-y-2 text-on-surface/90 dark:text-on-surface-dark/90">
							<li>{{ __('pages/public/cookies-and-privacy-policy.dataUsage.purposes.service') }}</li>
							<li>{{ __('pages/public/cookies-and-privacy-policy.dataUsage.purposes.security') }}</li>
							<li>{{ __('pages/public/cookies-and-privacy-policy.dataUsage.purposes.communication') }}</li>
							<li>{{ __('pages/public/cookies-and-privacy-policy.dataUsage.purposes.legal') }}</li>
						</ul>
					</div>
				</section>

				{{-- Data Sharing --}}
				<section class="mb-12">
					<h2 class="text-on-surface-strong dark:text-on-surface-dark-strong text-2xl font-semibold mb-6">
						{{ __('pages/public/cookies-and-privacy-policy.dataSharing.title') }}
					</h2>
					<div class="text-on-surface dark:text-on-surface-dark space-y-4">
						<p>{{ __('pages/public/cookies-and-privacy-policy.dataSharing.noSharing') }}</p>
						<p>{{ __('pages/public/cookies-and-privacy-policy.dataSharing.exceptions') }}</p>
						<ul class="list-disc pl-6 space-y-1 text-on-surface/90 dark:text-on-surface-dark/90">
							<li>{{ __('pages/public/cookies-and-privacy-policy.dataSharing.legal.compliance') }}</li>
							<li>{{ __('pages/public/cookies-and-privacy-policy.dataSharing.legal.safety') }}</li>
							<li>{{ __('pages/public/cookies-and-privacy-policy.dataSharing.legal.consent') }}</li>
						</ul>
					</div>
				</section>

				{{-- Data Security --}}
				<section class="mb-12">
					<h2 class="text-on-surface-strong dark:text-on-surface-dark-strong text-2xl font-semibold mb-6">
						{{ __('pages/public/cookies-and-privacy-policy.security.title') }}
					</h2>
					<div class="text-on-surface dark:text-on-surface-dark space-y-4">
						<p>{{ __('pages/public/cookies-and-privacy-policy.security.description') }}</p>
						<ul class="list-disc pl-6 space-y-1 text-on-surface/90 dark:text-on-surface-dark/90">
							<li>{{ __('pages/public/cookies-and-privacy-policy.security.measures.encryption') }}</li>
							<li>{{ __('pages/public/cookies-and-privacy-policy.security.measures.access') }}</li>
							<li>{{ __('pages/public/cookies-and-privacy-policy.security.measures.monitoring') }}</li>
							<li>{{ __('pages/public/cookies-and-privacy-policy.security.measures.updates') }}</li>
						</ul>
					</div>
				</section>

				{{-- Your Rights --}}
				<section class="mb-12">
					<h2 class="text-on-surface-strong dark:text-on-surface-dark-strong text-2xl font-semibold mb-6">
						{{ __('pages/public/cookies-and-privacy-policy.rights.title') }}
					</h2>
					<div class="text-on-surface dark:text-on-surface-dark space-y-4">
						<p>{{ __('pages/public/cookies-and-privacy-policy.rights.description') }}</p>
						<ul class="list-disc pl-6 space-y-2 text-on-surface/90 dark:text-on-surface-dark/90">
							<li><strong>{{ __('pages/public/cookies-and-privacy-policy.rights.access.title') }}</strong> - {{ __('pages/public/cookies-and-privacy-policy.rights.access.description') }}</li>
							<li><strong>{{ __('pages/public/cookies-and-privacy-policy.rights.rectification.title') }}</strong> - {{ __('pages/public/cookies-and-privacy-policy.rights.rectification.description') }}</li>
							<li><strong>{{ __('pages/public/cookies-and-privacy-policy.rights.erasure.title') }}</strong> - {{ __('pages/public/cookies-and-privacy-policy.rights.erasure.description') }}</li>
							<li><strong>{{ __('pages/public/cookies-and-privacy-policy.rights.portability.title') }}</strong> - {{ __('pages/public/cookies-and-privacy-policy.rights.portability.description') }}</li>
							<li><strong>{{ __('pages/public/cookies-and-privacy-policy.rights.objection.title') }}</strong> - {{ __('pages/public/cookies-and-privacy-policy.rights.objection.description') }}</li>
						</ul>
					</div>
				</section>

				{{-- Data Retention --}}
				<section class="mb-12">
					<h2 class="text-on-surface-strong dark:text-on-surface-dark-strong text-2xl font-semibold mb-6">
						{{ __('pages/public/cookies-and-privacy-policy.retention.title') }}
					</h2>
					<div class="text-on-surface dark:text-on-surface-dark space-y-4">
						<p>{{ __('pages/public/cookies-and-privacy-policy.retention.description') }}</p>
						<ul class="list-disc pl-6 space-y-1 text-on-surface/90 dark:text-on-surface-dark/90">
							<li>{{ __('pages/public/cookies-and-privacy-policy.retention.account') }}</li>
							<li>{{ __('pages/public/cookies-and-privacy-policy.retention.inactive') }}</li>
							<li>{{ __('pages/public/cookies-and-privacy-policy.retention.legal') }}</li>
						</ul>
					</div>
				</section>

				{{-- Changes to Policy --}}
				<section class="mb-12">
					<h2 class="text-on-surface-strong dark:text-on-surface-dark-strong text-2xl font-semibold mb-6">
						{{ __('pages/public/cookies-and-privacy-policy.changes.title') }}
					</h2>
					<div class="text-on-surface dark:text-on-surface-dark space-y-4">
						<p>{{ __('pages/public/cookies-and-privacy-policy.changes.description') }}</p>
						<p>{{ __('pages/public/cookies-and-privacy-policy.changes.notification') }}</p>
					</div>
				</section>

				{{-- Contact Information --}}
				<section class="mb-12">
					<h2 class="text-on-surface-strong dark:text-on-surface-dark-strong text-2xl font-semibold mb-6">
						{{ __('pages/public/cookies-and-privacy-policy.contact.title') }}
					</h2>
					<div class="text-on-surface dark:text-on-surface-dark space-y-4">
						<p>{{ __('pages/public/cookies-and-privacy-policy.contact.description') }}</p>
						<div class="bg-surface-alt/50 dark:bg-surface-dark-alt/50 rounded-radius p-4">
							<p class="font-medium text-on-surface-strong dark:text-on-surface-dark-strong mb-2">
								{{ __('pages/public/cookies-and-privacy-policy.contact.info.title') }}
							</p>
							<p>
								{{ __('pages/public/cookies-and-privacy-policy.contact.info.email') }}
								<x-muddle-text-random :email="config('app.legal_email')" />
							</p>
							<p>{{ __('pages/public/cookies-and-privacy-policy.contact.info.response') }}</p>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>

</x-layouts.guest>