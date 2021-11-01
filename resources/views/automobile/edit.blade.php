@extends('base')

@section('styles')
<!-- REVOLUTION SLIDER CSS -->
<link rel="stylesheet" type="text/css" href="plugins/revolution/revolution/css/settings.css">
<!-- REVOLUTION NAVIGATION STYLE -->
<link rel="stylesheet" type="text/css" href="plugins/revolution/revolution/css/navigation.css">
@endsection

@section('content')
<div id="content" class="site-content">
    <section class="shop-cart" style="padding-top:20px; padding-right:20px;width:70%;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="shop_checkout">
                        <h2 class="page-title">{{ __('Update vehicule') }}</h2>
                        <livewire:automobile.form-update :vehicule="$vehicule" />
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection;