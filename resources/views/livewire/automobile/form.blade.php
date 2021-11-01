<div>
    <form class="" wire:submit.prevent="store">
        <p>{{ __('Add a new car to the collection') }}</p>
        <p class="form-row form-row-first col-lg-12">
            <input type="text" class="input-text" placeholder="{{ __('Price') }}" wire:model="price">
            @error('price') <span class="error">{{ $message }}</span> @enderror
        </p>
        <p class="form-row form-row-first col-lg-12">
            <select class="input-text" placeholder="{{ __('Make') }}" wire:model="make">
                <option selected>{{ __('Select a make') }}</option>
                @foreach ($makes_list as $make)
                <option value="{{ $make->id }}">{{ $make->title }}</option>
                @endforeach
            </select>
            @error('make') <span class="error">{{ $message }}</span> @enderror
        </p>
        @if ($models_list)
        <p class="form-row form-row-first col-lg-12">
            <select class="input-text" placeholder="{{ __('Model') }}" wire:model="model_id">
                @foreach ($models_list as $model)
                <option value="{{ $model->id }}">{{ $model->title }}</option>
                @endforeach
            </select>
            @error('model') <span class="error">{{ $message }}</span> @enderror
        </p>
        @endif
        <p class="form-row form-row-first col-lg-12">
            <select class="input-text" placeholder="{{ __('Status') }}" wire:model.lazy="status">
                <option selected>{{ __('Select a make') }}</option>
                <option value="For sell">{{ __('For sell') }}</option>
                <option value="For rent">{{ __('For rent') }}</option>
            </select>
            @error('status') <span class="error">{{ $message }}</span> @enderror
        </p>

        <p class="form-row form-row-first col-lg-12">
            <select class="input-text" placeholder="{{ __('Made year') }}" wire:model.lazy="made_year" {{ $status == 'For rent'? 'disabled': '' }}>
                @for ($i = 1940; $i <= date('Y'); $i++) <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
            </select>
            @error('made_year') <span class="error">{{ $message }}</span> @enderror
        </p>
        <p class="form-row form-row-first col-lg-12">
            <input type="text" class="input-text" placeholder="{{ __('Plate number') }}" wire:model.lazy="plate_number" {{ $status == 'For rent'? 'disabled': '' }}>
            @error('plate_number') <span class="error">{{ $message }}</span> @enderror
        </p>
        <p class="form-row form-row-first col-lg-12">
            <select class="input-text" placeholder="{{ __('Precision') }}" wire:model.lazy="precision" {{ $status == 'For sell'? 'disabled': '' }}>
                <option selected>{{ __('Choose status') }}</option>
                <option value="With driver">{{ __('With driver') }}</option>
                <option value="Without driver">{{ __('Without driver') }}</option>
            </select>
            @error('precision') <span class="error">{{ $message }}</span> @enderror
        </p>
        <p class="form-row form-row-first col-lg-12">
            <textarea class="input-text" placeholder="{{ __('Description') }}" wire:model.lazy="description"></textarea>
            @error('description') <span class="error">{{ $message }}</span> @enderror
        </p>

        <div class="form-row form-row-last col-lg-12" x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true" x-on:livewire-upload-finish="isUploading = false" x-on:livewire-upload-error="isUploading = false" x-on:livewire-upload-progress="progress = $event.detail.progress">
            <input required="required" class="input-text" multiple accept="image/*" type="file" wire:model.lazy="images">
            <!-- Progress Bar -->
            <!-- <div x-show="isUploading" class="uk-width-1-1">
                <progress max="100" x-bind:value="progress"></progress>
            </div> -->
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