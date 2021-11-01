<div>
    <form class="" wire:submit.prevent="store">
        <p>{{ __('Update your property') }}</p>
        <p class="form-row form-row-first col-lg-12">
            <input type="text" class="input-text" placeholder="{{ __('Price') }}" wire:model="property.price">
            @error('property.price') <span class="error">{{ $message }}</span> @enderror
        </p>
        <p class="form-row form-row-first col-lg-12">
            <select class="input-text" placeholder="{{ __('Status') }}" wire:model.lazy="property.status">
                <option value="For rent">{{ __('For rent') }}</option>
                <option value="For sell">{{ __('For sell') }}</option>
            </select>
            @error('property.status') <span class="error">{{ $message }}</span> @enderror
        </p>
        <p class="form-row form-row-first col-lg-12">
            <select class="input-text" placeholder="{{ __('Country') }}" wire:model.lazy="country_id">
                @foreach ($countries as $c)
                <option value="{{ $c->id }}">{{ $c->name }}</option>
                @endforeach
            </select>
            @error('country_id') <span class="error">{{ $message }}</span> @enderror
        </p>
        <p class="form-row form-row-first col-lg-12">
            <select class="input-text" placeholder="{{ __('State') }}" wire:model.lazy="state_id">
                @if (!empty($states))
                <option selected>{{ __('Pick a state') }}</option>
                @foreach ($states as $s)
                <option value="{{ $s->id }}">{{ $s->name }}</option>
                @endforeach
                @endif
            </select>
            @error('state_id') <span class="error">{{ $message }}</span> @enderror
        </p>
        <p class="form-row form-row-first col-lg-12">
            <select class="input-text" placeholder="{{ __('City') }}" wire:model.lazy="property.city_id">
                @if (!empty($cities))
                <option selected>{{ __('Pick a city') }}</option>
                @foreach ($cities as $t)
                <option value="{{ $t->id }}">{{ $t->name }}</option>
                @endforeach
                @endif
            </select>
            @error('property.city_id') <span class="error">{{ $message }}</span> @enderror
        </p>
        <p class="form-row form-row-first col-lg-12">
            <input type="text" class="input-text" placeholder="{{ __('Commune') }}" wire:model.lazy="property.commune">
            @error('property.commune') <span class="error">{{ $message }}</span> @enderror
        </p>
        <p class="form-row form-row-first col-lg-12">
            <input type="text" class="input-text" placeholder="{{ __('Quarter') }}" wire:model.lazy="property.quarter">
            @error('property.quarter') <span class="error">{{ $message }}</span> @enderror
        </p>
        <p class="form-row form-row-first col-lg-12">
            <input type="text" class="input-text" placeholder="{{ __('Avenue') }}" wire:model.lazy="property.avenue">
            @error('property.avenue') <span class="error">{{ $message }}</span> @enderror
        </p>
        <p class="form-row form-row-first col-lg-12">
            <input type="text" class="input-text" placeholder="{{ __('Number') }}" wire:model.lazy="property.addr_number">
            @error('property.addr_number') <span class="error">{{ $message }}</span> @enderror
        </p>

        <div class="form-row form-row-last col-lg-12" x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true" x-on:livewire-upload-finish="isUploading = false" x-on:livewire-upload-error="isUploading = false" x-on:livewire-upload-progress="progress = $event.detail.progress">
            <input class="input-text" multiple accept="image/*" type="file" wire:model.lazy="images">
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