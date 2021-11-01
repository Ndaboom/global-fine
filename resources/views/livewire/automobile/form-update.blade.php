<div>
    <form class="" wire:submit.prevent="store">
        <p>{{ __('Update your car') }}</p>
        <p class="form-row form-row-first col-lg-12">
            <input type="text" class="input-text" placeholder="{{ __('Price') }}" wire:model="vehicule.price">
            @error('vehicule.price') <span class="error">{{ $message }}</span> @enderror
        </p>
        <p class="form-row form-row-first col-lg-12">
            <select class="input-text" placeholder="{{ __('Make') }}" wire:model="make">
                @foreach ($makes_list as $make_item)
                <option value="{{ $make_item->id }}">{{ $make_item->title }}</option>
                @endforeach
            </select>
            @error('vehicule.make') <span class="error">{{ $message }}</span> @enderror
        </p>
        <p class="form-row form-row-first col-lg-12">
            <select class="input-text" placeholder="{{ __('Model') }}" wire:model="vehicule.model_id">
                @foreach ($models_list as $model)
                <option value="{{ $model->id }}">{{ $model->title }}</option>
                @endforeach
            </select>
            @error('vehicule.model') <span class="error">{{ $message }}</span> @enderror
        </p>
        <p class="form-row form-row-first col-lg-12">
            <select class="input-text" placeholder="{{ __('Status') }}" wire:model.lazy="vehicule.status">
                <option value="For sell">{{ __('For sell') }}</option>
                <option value="For rent">{{ __('For rent') }}</option>
            </select>
            @error('vehicule.status') <span class="error">{{ $message }}</span> @enderror
        </p>

        <p class="form-row form-row-first col-lg-12">
            <select class="input-text" placeholder="{{ __('Made year') }}" wire:model.lazy="vehicule.made_year" {{ $vehicule->status == 'For rent'? 'disabled': '' }}>
                @for ($i = 1940; $i <= date('Y'); $i++) <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
            </select>
            @error('vehicule.made_year') <span class="error">{{ $message }}</span> @enderror
        </p>
        <p class="form-row form-row-first col-lg-12">
            <input type="text" class="input-text" placeholder="{{ __('Plate number') }}" wire:model.lazy="vehicule.plate_number" {{ $vehicule->status == 'For rent'? 'disabled': '' }}>
            @error('vehicule.place_number') <span class="error">{{ $message }}</span> @enderror
        </p>
        <p class="form-row form-row-first col-lg-12">
            <select class="input-text" placeholder="{{ __('Precision') }}" wire:model.lazy="vehicule.precision" {{ $vehicule->status == 'For sell'? 'disabled': '' }}>
                <option value="With driver">{{ __('With driver') }}</option>
                <option value="Without driver">{{ __('Without driver') }}</option>
            </select>
            @error('vehicule.precision') <span class="error">{{ $message }}</span> @enderror
        </p>
        <p class="form-row form-row-first col-lg-12">
            <textarea class="input-text" placeholder="{{ __('Description') }}" wire:model.lazy="vehicule.description"></textarea>
            @error('vehicule.description') <span class="error">{{ $message }}</span> @enderror
        </p>

        <div class="form-row form-row-last col-lg-12" x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true" x-on:livewire-upload-finish="isUploading = false" x-on:livewire-upload-error="isUploading = false" x-on:livewire-upload-progress="progress = $event.detail.progress">
            <input class="input-text" multiple accept="image/*" type="file" wire:model.lazy="images">
            <!-- Progress Bar -->
            <div x-show="isUploading" class="uk-width-1-1">
                <progress max="100" x-bind:value="progress"></progress>
            </div>
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