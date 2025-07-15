<div class="contents">

    <x-shared.modal.modal-body-wrapper>
        <form id="category-form" wire:submit="save">
            @csrf

            <x-shared.input.string-input
                wire:model="name"
                id="name"
                :label="__('shared/category-form.inputs.name.label')"
                type="text"
                name="name"
                required
                :placeholder="__('shared/category-form.inputs.name.placeholder')"
            />

            <x-shared.input.string-input
                wire:model="description"
                id="description"
                :label="__('shared/category-form.inputs.description.label')"
                type="text"
                name="description"
                required
                :placeholder="__('shared/category-form.inputs.description.placeholder')"
            />

            <x-shared.input.string-input
                wire:model="slug"
                id="slug"
                :label="__('shared/category-form.inputs.slug.label')"
                type="text"
                name="slug"
                required
                :placeholder="__('shared/category-form.inputs.slug.placeholder')"
            />
            
        </form>
    </x-shared.modal.modal-body-wrapper>

    <x-shared.modal.modal-footer-wrapper>
        @if ($this->category->exists)
            <form wire:submit="delete">
                <x-shared.button
                    type="submit"
                    :label="__('shared/category-form.delete_btn')"
                    buttonColor="danger"
                    buttonStyle="ghost"
                    icon="bootstrap.trash3"
                    buttonSize="sm"
                    class="w-full"
                />
            </form>
        @endif
        <x-shared.button
            type="submit"
            :label="__('shared/category-form.inputs.submit_btn.'.($this->category->exists ? 'update' : 'create'))"
            form="category-form"
            icon="pui.check-success"
        />
    </x-shared.modal.modal-footer-wrapper>

</div>