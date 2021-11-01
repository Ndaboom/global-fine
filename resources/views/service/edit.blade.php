@extends('base')

@section('styles')
<!-- REVOLUTION SLIDER CSS -->
<link rel="stylesheet" type="text/css" href="plugins/revolution/revolution/css/settings.css">
<!-- REVOLUTION NAVIGATION STYLE -->
<link rel="stylesheet" type="text/css" href="plugins/revolution/revolution/css/navigation.css">
@endsection

@section('content')
<div id="content" class="site-content">
    <section class="shop-cart" style="width:70%; padding-right: 20px;padding-top:20px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="shop_checkout">
                        <h2 class="page-title">{{ __('Update extra service') }}</h2>
                        <livewire:service.form-update :extraService="$extraService" />
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection;