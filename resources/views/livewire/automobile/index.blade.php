<div class="product">
<div class="row">

    @foreach ($vehicules as $vehicule)

    <div class="col-md-4 col-sm-6 first">
        <div class="product-item">
            <div class="product-media"> 
                <a href="single-product.html">
                    <img src="{{ asset($vehicule->getFirstMediaUrl('images', 'thumb')) }}" class="" alt="">
                </a>
                <div class="wrapper-add-to-cart">
                    <div class="add-to-cart-inner">
                        <a href="{{ route('automobile.vehicule.show', $vehicule) }}" class="octf-btn octf-btn-primary">Voir </a>           
                    </div>
                </div>
            </div>
            <h2 class="woocommerce-loop-product__title"><a href="{{ route('automobile.vehicule.show', $vehicule) }}">{{ $vehicule->model->make->title }} {{ $vehicule->model->title }}</a></h2>
            <div class="star-rating">
                <span><i class="fa fa-star"></i></span>
                <span><i class="fa fa-star"></i></span>
                <span><i class="fa fa-star"></i></span>
                <span><i class="fa fa-star"></i></span>
                <span><i class="fa fa-star"></i></span>
            </div>
            <span class="price-product"><span class="amount"><span>$</span>{{ $vehicule->price }}</span></span>
        </div>
    </div>

    @endforeach

    {{ $vehicules->links() }}
</div>
</div>