<div>
    <form class="" wire:submit.prevent="submit">
        <p>{{ __('Login for management purposes') }}</p>
        <p class="form-row form-row-first col-lg-12">
            <input type="text" class="input-text" placeholder="{{ __('Email') }}" wire:model.lazy="email">
            @error('email') <span class="error">{{ $message }}</span> @enderror
        </p>
        <p class="form-row form-row-first col-lg-12">
            <input type="password" class="input-text" placeholder="{{ __('Password') }}" wire:model.lazy="password">
            @error('password') <span class="error">{{ $message }}</span> @enderror
        </p>
        <p class="form-row form-row-last col-lg-12">
            <button type="submit" class="octf-btn button" wire:loading.attr="disabled">
                {{ __('Login') }}
                <div wire:loading.inline>...</div>
            </button>
        </p>
        <div class="clear"></div>
    </form>
</div>