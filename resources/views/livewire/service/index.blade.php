<div class="product">
    <div class="row">

        @foreach ($extraServices as $extraService)

        <div class="col-md-4 col-sm-6 first">
            <div class="product-item">
                <div class="product-media">
                    <a href="{{ route('service.extraService.show', $extraService) }}">
                        <img src="{{ asset($extraService->getFirstMediaUrl('images', 'thumb')) }}" class="" alt="">
                    </a>
                    <div class="wrapper-add-to-cart">
                        <div class="add-to-cart-inner">
                            <a href="{{ route('service.extraService.show', $extraService) }}" class="octf-btn octf-btn-primary">Voir </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endforeach

        {{ $extraServices->links() }}
    </div>
</div>