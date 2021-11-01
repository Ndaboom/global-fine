@extends('base')

@section('styles')
@endsection

@section('content')

<div id="content" class="site-content">
            <section class="shop-single">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 mb-4 mb-lg-0 text-center align-self-center">
                            <div class="product-slide">
                                <div class="zoom"></div>
                                <div class="single-product owl-carousel owl-theme">
                                @foreach ($vehicule->getMedia('images') as $key=>$image)
                                    <div class="item" data-hash="{{ $key }}">
                                        <a href="{{ asset($image->getUrl('thumb')) }}" class="link-image-action"><i class="flaticon-search"></i></a>
                                        <img src="{{ asset($image->getUrl('thumb')) }}" alt="" data-zoom="{{ asset($image->getUrl('thumb')) }}">
                                    </div>
                                @endforeach
                                </div>
                                <div class="nav-img">
                                @foreach ($vehicule->getMedia('images') as $key=>$image)
                                    <div class="item">
                                        <div>
                                            <a class="" href="#{{$key}}">
                                                <img src="{{ asset($image->getUrl('thumb')) }}" alt="">
                                            </a> 
                                        </div>
                                    </div>
                                @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 align-self-center">
                            <div class="summary entry-summary">
                                <h2 class="single-product-title">{{ $vehicule->model->make->title }}  {{ $vehicule->model->title }}</h2>
                                <div class="single-product-rating">
                                    <div class="star-rating">
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                        <a href="#reviews" class="woocommerce-review-link" rel="nofollow"> 
                                        @can('update', $vehicule)
                                            <a href="{{ route('automobile.vehicule.edit', $vehicule) }}">Mettre à jour</a>
                                        @endcan  
                                        </a>
                                    </div>
                                </div>
                                <span class="single-price price-product"><span class="amount"><span>$</span>{{ $vehicule->price }}</span></span>
                                <p>{{ $vehicule->description }}</p>
                                <form class="cart" method="post">
                                    <div class="single-quantity">
                                        <label class="screen-reader-text">Boost Your Business quantity</label>
                                        <input type="number" id="quantity" class="input-text qty text" step="1" min="1" name="quantity" value="1" title="Qty" placeholder="">
                                    </div>
                                    <button type="submit" name="add-to-cart" class="octf-btn single_add_to_cart_button button alt">CONTACTER VENDEUR</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="space-70"></div>
                    <div class="row">
                        <div class="col-md-12 mb-5">
                            <div class="ot-tabs">
                                <ul class="tabs-heading unstyle">
                                    <li class="tab-link octf-btn current" data-tab="tab-1">Description</li>
                                    <li class="tab-link octf-btn" data-tab="tab-2">Infomation</li>
                                    <li class="tab-link octf-btn" data-tab="tab-3">Review <span>(01)</span></li>
                                </ul>
                                <div id="tab-1" class="tab-content current">
                                    {{ $vehicule->description }}
                                </div>
                                <div id="tab-2" class="tab-content">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <table class="woocommerce-product-attributes shop_attributes">
                                                <tbody>
                                                
                                                @if ($vehicule->status == 'For sell')
                                                    <tr>
                                                        <th>Model</th>
                                                        <td><p>{{ $vehicule->model->title }}</p></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Fabriqué en </th>
                                                        <td><p>{{ $vehicule->made_year }}</p></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Status</th>
                                                        <td><p>{{ $vehicule->status }}</p></td>
                                                    </tr>
                                                @else
                                                    <tr>
                                                        <th>Precision</th>
                                                        <td><p>{{ $vehicule->precision }}</p></td>
                                                    </tr>
                                                @endif
                            
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div id="tab-3" class="tab-content">
                                    <h2 class="woocommerce-reviews-title">1 review for <span>{{ $vehicule->model->title }}</span></h2>
                                    <div class="review-comment">
                                        <ol class="review-comment-list">
                                            <li class="comment-item">
                                                <div class="comment-wrap">
                                                    <div class="avatar-author-review">
                                                        <img src="images/author-review.jpg" alt="" class="review-avatar">
                                                    </div>
                                                    <div class="review-rating">
                                                        <span><i class="fa fa-star"></i></span>
                                                        <span><i class="fa fa-star"></i></span>
                                                        <span><i class="fa fa-star"></i></span>
                                                        <span><i class="fa fa-star"></i></span>
                                                        <span><i class="fa fa-star"></i></span>
                                                    </div>
                                                    <div class="review-comment-content">
                                                        <div class="comment-meta">
                                                            <h6 class="comment-author">Tom Black </h6>
                                                            <span class="comment-time"> - March 13, 2020</span>
                                                        </div>
                                                        <div class="comment-text">
                                                            <p>Nice car !</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ol>
                                    </div>
                                    <div class="review-form">
                                        <span class="comment-reply-title">Add a review </span>
                                        <form class="review-comment-form">
                                            <p class="comment-notes"><span id="email-notes">Your email address will not be published.</span> Required fields are marked <span class="required">*</span></p>
                                            <div class="comment-form-rating">
                                                <label>Your rating <span class="required">*</span></label>
                                                <div class="review-comment-rating mb-3">
                                                    <span><i class="far fa-star"></i></span>
                                                    <span><i class="far fa-star"></i></span>
                                                    <span><i class="far fa-star"></i></span>
                                                    <span><i class="far fa-star"></i></span>
                                                    <span><i class="far fa-star"></i></span>
                                                </div>
                                            </div>
                                            <p class="comment-form-author">
                                                <input id="author" name="author" type="text" value="" size="30" placeholder="Name *" required="">
                                            </p>
                                            <p class="comment-form-email">
                                                <input id="email" name="email" type="text" value="" size="30" placeholder="Email *" required="">
                                            </p>
                                            <p class="comment-form-comment">
                                                <textarea id="comment" name="comment" cols="45" rows="8" placeholder="Comment *" required=""></textarea>
                                            </p>
                                            <p class="form-submit">
                                                <input name="submit" type="submit" id="submit" class="octf-btn" value="Submit"> 
                                            </p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
        </div>
@endsection