<div>
    <form class="" wire:submit.prevent="store">
        <p>{{ __('Add extra service') }}</p>
        <p class="form-row form-row-first col-lg-12">
            <input type="text" class="input-text" placeholder="{{ __('Description') }}" wire:model="description">
            @error('description') <span class="error">{{ $message }}</span> @enderror
        </p>

        <div class="form-row form-row-last col-lg-12" x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true" x-on:livewire-upload-finish="isUploading = false" x-on:livewire-upload-error="isUploading = false" x-on:livewire-upload-progress="progress = $event.detail.progress">
            <input required="required" class="input-text" multiple accept="image/*" type="file" wire:model.lazy="images">
            <!-- Progress Bar -->
            {{-- <div x-show="isUploading" class="uk-width-1-1">
                <progress max="100" x-bind:value="progress"></progress>
            </div> --}}
            @error('images.*') <span class="error">{{ $message }}</span> @enderror
        </div>
        <p class="form-row form-row-last col-lg-12">
            <button type="submit" class="octf-btn button" wire:loading.attr="disabled">
                {{ __('Submit') }}
                <div wire:loading.inline>...</div>
            </button>
        </p>
        <div class="clear"></div>
    </form>
</div>