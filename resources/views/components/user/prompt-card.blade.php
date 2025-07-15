@php
	$promptTypeIcon = [
		'text' => 'heroicons.document-text-outline',
		'image' => 'heroicons.photo-outline',
		'other' => 'bootstrap.robot',
	];
@endphp

<article
	id="{{ $prompt->id }}"
	class="{{-- pointer-fine:group --}} group flex rounded-radius {{-- max-w-sm --}} flex-col overflow-hidden border border-outline bg-surface {{-- bg-surface-alt --}} text-on-surface dark:border-outline-dark dark:bg-surface-dark {{-- dark:bg-surface-dark-alt --}} dark:text-on-surface-dark"
	{{ $attributes }}
>
	<div class="flex flex-col gap-1.75 justify-between h-full {{-- gap-4 --}} {{-- p-6 --}} p-4">
		<div class="flex flex-col gap-1.5">
			<div class="flex items-center gap-3 justify-between min-h-5.5">
				<div class="flex items-center gap-2 {{-- font-medium --}} min-w-0">
					<x-dynamic-component
						x-data="{
							text: { fill: 'none', 'stroke-width': '1.5', stroke: 'currentColor' },
							image: { fill: 'none', 'stroke-width': '1.5', stroke: 'currentColor' },
							other: { fill: 'currentColor' }
						}"
						:component="'shared.svg.icons.'.$promptTypeIcon[$prompt->type]"
						aria-hidden="true"
						class="size-3 text-on-surface/50 dark:text-on-surface-dark/50 flex-none"
						x-bind="{{ $prompt->type }}"
					/>
					<h3
						class="{{-- text-balance --}} text-sm font-bold {{-- text-xl lg:text-2xl font-bold --}} text-on-surface-strong dark:text-on-surface-dark-strong truncate"
					>
						{{ $prompt->title }}
					</h3>
				</div>

				<div class="{{-- flex pointer-fine:hidden group-hover:flex --}} hidden group-hover:flex items-center gap-2">
					<x-shared.button
						x-data="{ copied: false }"
						x-on:click="
							navigator.clipboard.writeText($el.dataset.promptcontent)
								.then(() => {
									copied = true;
									setTimeout(() => { copied = false; }, 2000);
								})
								.catch(err => console.error(err))
						"
						data-promptcontent="{{ $prompt->content }}"
						buttonColor="alternate"
						buttonStyle="floating_action_button"
						buttonSize="xs"
						aria_label="{{ __( 'pages/user/prompt-list.promptCard.copy.aria_label' ) }}"
						:icon="true"
						class="hover:!bg-on-primary dark:hover:!bg-surface-dark-alt border-none text-on-surface-strong/60 hover:text-on-surface-strong dark:text-on-surface-dark-strong/60 dark:hover:text-on-surface-dark-strong"
						x-bind:class="copied ? 'focus-visible:outline-success dark:focus-visible:outline-success !cursor-default' : 'cursor-pointer'"
						customBorderRadius="radius"
						customTextColor="on-surface"
						customPadding="p-1"
						customOutlineColor="primary"
						customOutlineColorDark="primary-dark"
						x-bind:title="copied ? '{{ __( 'pages/user/prompt-list.promptCard.copied.title' ) }}' : '{{ __( 'pages/user/prompt-list.promptCard.copy.title' ) }}'"
					>
						<x-shared.svg.icons.bootstrap.clipboard-check
							x-show="copied"
							x-cloak
							x-transition:enter="transition ease-out duration-300"
							x-transition:enter-start="opacity-0 scale-90"
							x-transition:enter-end="opacity-100 scale-100"
							class="size-3.5 fill-success dark:fill-success"
							fill="currentColor"
							aria-hidden="true"
						/>
						<x-shared.svg.icons.bootstrap.clipboard-fill
							x-show="!copied"
							x-transition:enter="transition ease-out duration-300"
							x-transition:enter-start="opacity-0"
							x-transition:enter-end="opacity-100"
							class="size-3.5 fill-on-on-surface-strong dark:fill-on-on-surface-dark-strong"
							fill="currentColor"
							aria-hidden="true"
						/>
					</x-shared.button>

					<x-shared.button
						buttonColor="alternate"
						buttonStyle="floating_action_button"
						buttonSize="xs"
						aria_label="{{ __( 'pages/user/prompt-list.promptCard.edit.aria_label' ) }}"
						icon="bootstrap.pencil-fill"
						class="hover:!bg-on-primary dark:hover:!bg-surface-dark-alt border-none text-on-surface-strong/60 hover:text-on-surface-strong dark:text-on-surface-dark-strong/60 dark:hover:text-on-surface-dark-strong"
						customBorderRadius="radius"
						customTextColor="on-surface"
						customPadding="p-1"
						customOutlineColor="primary"
						customOutlineColorDark="primary-dark"
						title="{{ __( 'pages/user/prompt-list.promptCard.edit.title' ) }}"
						href="{{ route('user.user-prompts.edit', ['prompt' => $prompt->id]) }}"
						wire:navigate
					/>

					<x-shared.button
						wire:click="deletePrompt({{ $prompt->id }})"
						wire:confirm="{{ __( 'pages/user/prompt-list.promptCard.delete.confirm' ) }}"
						buttonColor="alternate"
						buttonStyle="floating_action_button"
						buttonSize="xs"
						aria_label="{{ __( 'pages/user/prompt-list.promptCard.delete.aria_label' ) }}"
						icon="bootstrap.trash3-fill"
						class="hover:!bg-on-primary dark:hover:!bg-surface-dark-alt border-none text-on-surface-strong/60 hover:text-on-surface-strong dark:text-on-surface-dark-strong/60 dark:hover:text-on-surface-dark-strong"
						customBorderRadius="radius"
						customTextColor="on-surface"
						customPadding="p-1"
						customOutlineColor="primary"
						customOutlineColorDark="primary-dark"
						title="{{ __( 'pages/user/prompt-list.promptCard.delete.title' ) }}"
					/>

				</div>
			</div>
			<p class="text-pretty text-sm line-clamp-3">{{ $prompt->excerpt }}</p>
		</div>
		<div class="flex items-center gap-2 justify-between min-h-6">
			@if ($prompt->category)
				<x-shared.badge
					badgeColor="default"
					badgeStyle="default"
					label="{{ $prompt->category?->name }}"
					icon="bootstrap.collection"
					class="!text-on-surface/75 dark:!text-on-surface-dark/75 !bg-surface-alt dark:!bg-surface-dark-alt !border-0"
					customIconClasses="size-3 flex-none"
				/>
			@else
				<span class="invisible"></span>
			@endif
			<span
				class="text-xs text-on-surface/50 dark:text-on-surface-dark/50 text-nowrap"
			>
				{{ $prompt->created_at->locale(app()->getLocale())->diffForHumans() }}
			</span>
		</div>
	</div>
</article>