<div class="flex flex-col items-center">
    <x-layouts.app.components.header
        header="{{ __($headerKey, $headerParams) }}"
        class="!max-w-2xl"
    />

    <x-layouts.app.components.form-wrapper>
        <form
            wire:submit="save"
            class="flex flex-col gap-6"
        >
            @csrf
    
            {{-- title --}}
            <x-shared.input.string-input
                wire:model="title"
                id="title"
                label="{{ __('pages/user/prompt-form.inputs.title.label') }}"
                type="text"
                name="title"
                required
                autofocus
                placeholder="{{ __('pages/user/prompt-form.inputs.title.placeholder') }}"
                outerClass=""
            />
    
            {{-- prompt type --}}
            <x-shared.input.radio.container
                wire:model="type"
                :choices="[
                    [
                        'id' => 'type_text',
                        'label' => __('pages/user/prompt-form.inputs.type.label.text'),
                        'checked' => true,
                        'value' => 'text',
                    ],
                    [
                        'id' => 'type_image',
                        'label' => __('pages/user/prompt-form.inputs.type.label.image'),
                        'checked' => false,
                        'value' => 'image',
                    ],
                    [
                        'id' => 'type_other',
                        'label' => __('pages/user/prompt-form.inputs.type.label.other'),
                        'checked' => false,
                        'value' => 'other',
                    ],
                ]"
                name="type"
                labelclasses="!min-w-42 max-md:w-full! md:max-lg:w-1/2! lg:w-full!"
                outerclasses=""
                outerlabel="{{ __('pages/user/prompt-form.inputs.type.outerlabel') }}"
                choicesouterclasses="flex flex-col sm:flex-row md:flex-col lg:flex-row gap-2"
                required
            />
    
            {{-- Category_id --}}
            <x-shared.input.select.select
                wire:model="category_id"
                :choices="$this->allCategories()"
                id="category_id"
                label="{{ __('pages/user/prompt-form.inputs.category_id.label') }}"
                name="category_id"
                placeholder="{{ __('pages/user/prompt-form.inputs.category_id.placeholder') }}"
                :nullableOnEdit="true"
                :withAddBtn="true"
                addBtnAriaLabel="{{ __('pages/user/prompt-form.inputs.category_id.addBtnAriaLabel') }}"
                addBtnOnClick="
                    $dispatch('open-modal', {
                        id: 'taxonomy-modal',
                        headerTitle: '{{ __('shared/category-form.headerTitle.create') }}',
                    });
                    $dispatch('add-taxonomy');
                "
                :useWireKey="true"
                wireKeyPrefix="category"
                outerclasses="!max-w-full max-sm:w-full! sm:w-1/2!"
            />
    
            {{-- Content --}}
            <x-shared.input.textarea
                wire:model="content"
                id="content"
                label="{{ __('pages/user/prompt-form.inputs.content.label') }}"
                name="content"
                rows="5"
                required
                placeholder="{{ __('pages/user/prompt-form.inputs.content.placeholder') }}"
                outerclasses="!max-w-full"
            />
    
            {{-- Submit button --}}
            <x-shared.button
                buttonColor="primary"
                type="submit"
                id="submit_btn"
                label="{{ __( 'pages/user/prompt-form.inputs.submit_btn.'.($prompt->exists ? 'update' : 'create') ) }}"
                class="max-sm:w-full sm:w-1/2 self-center"
            />
        </form>
    </x-layouts.app.components.form-wrapper>

</div>