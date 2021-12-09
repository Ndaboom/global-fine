<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Global fine</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/owl.theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}" />

    <link rel="stylesheet" href="{{ asset('style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/woocommerce.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/royal-preload.css') }}" />
    <!-- REVOLUTION SLIDER CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/revolution/revolution/css/settings.css') }}">
    <!-- REVOLUTION NAVIGATION STYLE -->
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/revolution/revolution/css/navigation.css') }}">

    <style>
        .users_table{
            margin:25px;
        }

        .roles_table{
            margin: 25px;
            max-width: 600px;
        }

        .top-v5{
            background-image: url(images/background/bg-home.jpg);
            background-position: center;
            height: 850px;
        }

    </style>
    @livewireStyles
</head>

<body class="royal_preloader">
    <div id="page" class="site">
        <header id="site-header" class="site-header sticky-header header-static">
            <!-- Main Header start -->
            <div class="header-topbar style-2">
                <div class="octf-area-wrap">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <ul class="social-list">
                                    <li><a href="http://twitter.com/" target="_self"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="http://facebook.com/" target="_self"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="http://linkedin.com/" target="_self"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="http://instagram/" target="_self"><i class="fab fa-instagram"></i></a></li>
                                </ul>
                            </div>
                            <div class="col-md-8">
                                <ul class="topbar-info align-self-end clearfix">
                                    <li><a href="tel:+1-800-456-478-23"><i class="fas fa-phone-alt"></i> +1-800-456-478-23</a></li>
                                    <li><a href="mailto:info@globalfine.com"><i class="fas fa-envelope"></i> info@globalfine.com</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="octf-main-header">
                <div class="octf-area-wrap">
                    <div class="container octf-mainbar-container">
                        <div class="octf-mainbar">
                            <div class="octf-mainbar-row octf-row">
                                <div class="octf-col logo-col">
                                    <div id="site-logo" class="site-logo">
                                        <a href="{{ route('home') }}">
                                            <img src="{{ asset('images/logo.png') }}" alt="Global fine" class="">
                                        </a>
                                    </div>
                                </div>
                                <div class="octf-col menu-col">
                                    <nav id="site-navigation" class="main-navigation">
                                        <ul class="menu">
                                            <li>
                                                <a href="{{ route('home') }}">{{ __('Welcome') }}</a>
                                            </li>
                                            <li class="menu-item-has-children"><a href="#">{{ __('Automobile') }}</a>
                                                <ul class="sub-menu">
                                                    @can('create', App\Models\Automobile\Vehicule::class)
                                                    <li><a href="{{ route('automobile.vehicule.create') }}">{{ __('New') }}</a></li>
                                                    @endcan
                                                    @can('viewAny', App\Models\Automobile\Vehicule::class)
                                                    <li><a href="{{ route('automobile.vehicule.index') }}">{{ __('View all') }}</a></li>
                                                    @endcan
                                                </ul>
                                            </li>
                                            <li class="menu-item-has-children"><a href="#">{{ __('Immobiliers') }}</a>
                                                <ul class="sub-menu">
                                                    @can('create', App\Models\Immovable\Property::class)
                                                    <li><a href="{{ route('immovable.property.create') }}">{{ __('New') }}</a></li>
                                                    @endcan
                                                    @can('viewAny', App\Models\Immovable\Property::class)
                                                    <li><a href="{{ route('immovable.property.index') }}">{{ __('View all') }}</a></li>
                                                    @endcan
                                                </ul>
                                            </li>
                                            <li class="menu-item-has-children"><a href="#">{{ __('Event organizer') }}</a>
                                                <ul class="sub-menu">
                                                    @can('create', App\Models\Event\Organizer::class)
                                                    <li><a href="{{ route('event.organizer.create') }}">{{ __('New') }}</a></li>
                                                    @can('create', App\Models\Service\ExtraService::class)
                                                    <li><a href="{{ route('service.extraService.create') }}">{{ __('Create other service') }}</a></li>
                                                    @endcan
                                                    @endcan
                                                    @can('viewAny', App\Models\Event\Organizer::class)
                                                    @foreach ($organizers as $organizer)
                                                    <li><a href="{{ route('event.organizer.show', [$organizer->id]) }}">{{ $organizer->name }}</a>
                                                    </li>
                                                    @endforeach
                                                    @endcan
                                                </ul>
                                            </li>
                                            @can('viewAny', App\Models\Service\ExtraService::class)
                                            <li>
                                                <a href="{{ route('service.extraService.index') }}">{{ __('Other services') }}</a>
                                            </li>
                                            @endcan
                                            @if (Auth::check())
                                            <li class="menu-item-has-children"><a href="#">{{ __('Administration') }}</a>
                                                <ul>
                                                    @can('role-create')
                                                    <li>
                                                        <a href="/translations">{{ __('Translations') }}</a>
                                                    </li>
                                                    @endcan
                                                    @can('user-create')
                                                    <li>
                                                        <a href="{{ route('users.index') }}">{{ __('Users') }}</a>
                                                    </li>
                                                    @endcan
                                                    @can('role-create')
                                                    <li>
                                                        <a href="{{ route('roles.index') }}">{{ __('Roles') }}</a>
                                                    </li>
                                                    @endcan
                                                </ul>
                                            </li>

                                            <li>
                                                {{ Form::open(array('route' => 'auth.logout')) }}
                                                <button style="    border: 0;outline: none;font-weight: bold;white-space: nowrap;background: inherit;" type="submit">{{ __('Log Out') }}</button>
                                                {{ Form::close() }}
                                            </li>
                                            @else
                                            <li><a href="{{ route('auth.login') }}">{{ __('Login') }}</a></li>
                                            @endif
                                        </ul>
                                    </nav>
                                </div>
                                <div class="octf-col cta-col text-right">
                                    <!-- Call To Action -->
                                    <div class="octf-btn-cta">

                                        <div class="octf-header-module cart-btn-hover">
                                            <div class="h-cart-btn octf-cta-icons">
                                                <a class="cart-icon" href="cart-page.html"><i class="flaticon-shopper"></i><span class="count">0</span></a>
                                            </div>
                                            <div class="site-header-cart">
                                                <div class="widget woocommerce widget_shopping_cart">
                                                    <div class="widget_shopping_cart_content">
                                                        <p class="woocommerce-mini-cart__empty-message">No products in the cart.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="octf-header-module">
                                            <div class="toggle_search octf-cta-icons">
                                                <i class="flaticon-search"></i>
                                            </div>
                                            <!-- Form Search on Header -->
                                            <div class="h-search-form-field collapse">
                                                <div class="h-search-form-inner">
                                                    <form role="search" method="get" id="hsearch-form" class="search-form">
                                                        <label><span class="screen-reader-text">Search for:</span>
                                                            <input type="search" class="search-field" placeholder="Search …" value="" name="s"></label>
                                                        <button type="submit" class="search-submit"><i class="flaticon-search"></i></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header_mobile">
                <div class="container">
                    <div class="mlogo_wrapper clearfix">
                        <div class="mobile_logo">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('images/logo.png') }}" alt="Global fine">
                            </a>
                        </div>
                        <div id="mmenu_toggle">
                            <button></button>
                        </div>
                    </div>
                    <div class="mmenu_wrapper">
                        <div class="mobile_nav collapse">
                            <ul id="menu-main-menu" class="mobile_mainmenu">
                                <li>
                                    <a href="{{ route('home') }}">{{ __('Welcome') }}</a>
                                </li>
                                <li class="menu-item-has-children"><a href="#">{{ __('Automobile') }}</a>
                                    <ul class="sub-menu">
                                        @can('create', App\Models\Automobile\Vehicule::class)
                                        <li><a href="{{ route('automobile.vehicule.create') }}">{{ __('New') }}</a></li>
                                        @endcan
                                        @can('viewAny', App\Models\Automobile\Vehicule::class)
                                        <li><a href="{{ route('automobile.vehicule.index') }}">{{ __('View all') }}</a></li>
                                        @endcan
                                    </ul>
                                </li>
                                <li class="menu-item-has-children"><a href="#">{{ __('Immobiliers') }}</a>
                                    <ul class="sub-menu">
                                        @can('create', App\Models\Immovable\Property::class)
                                        <li><a href="{{ route('immovable.property.create') }}">{{ __('New') }}</a></li>
                                        @endcan
                                        @can('viewAny', App\Models\Immovable\Property::class)
                                        <li><a href="{{ route('immovable.property.index') }}">{{ __('View all') }}</a></li>
                                        @endcan
                                    </ul>
                                </li>
                                <li class="menu-item-has-children"><a href="#">{{ __('Event organizer') }}</a>
                                    <ul class="sub-menu">
                                        @can('create', App\Models\Event\Organizer::class)
                                        <li><a href="{{ route('event.organizer.create') }}">{{ __('New') }}</a></li>
                                        @can('create', App\Models\Service\ExtraService::class)
                                        <li><a href="{{ route('service.extraService.create') }}">{{ __('Create other service') }}</a></li>
                                        @endcan
                                        @endcan
                                        @can('viewAny', App\Models\Event\Organizer::class)
                                        @foreach ($organizers as $organizer)
                                        <li><a href="{{ route('event.organizer.show', [$organizer->id]) }}">{{ $organizer->name }}</a>
                                        </li>
                                        @endforeach
                                        @endcan
                                    </ul>
                                </li>
                                @can('viewAny', App\Models\Service\ExtraService::class)
                                <li>
                                    <a href="{{ route('service.extraService.index') }}">{{ __('Other services') }}</a>
                                </li>
                                @endcan
                                @if (Auth::check())
                                <li class="menu-item-has-children"><a href="#">{{ __('Administration') }}</a>
                                    <ul>
                                        @can('role-create')
                                        <li>
                                            <a href="/translations">{{ __('Translations') }}</a>
                                        </li>
                                        @endcan
                                        @can('user-create')
                                        <li>
                                            <a href="{{ route('users.index') }}">{{ __('Users') }}</a>
                                        </li>
                                        @endcan
                                        @can('role-create')
                                        <li>
                                            <a href="{{ route('roles.index') }}">{{ __('Roles') }}</a>
                                        </li>
                                        @endcan
                                    </ul>
                                </li>

                                <li>
                                    {{ Form::open(array('route' => 'auth.logout')) }}
                                    <button style="    border: 0;outline: none;font-weight: bold;white-space: nowrap;background: inherit;" type="submit">{{ __('Log Out') }}</button>
                                    {{ Form::close() }}
                                </li>
                                @else
                                <li><a href="{{ route('auth.login') }}">{{ __('Login') }}</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        @yield('content')

        <footer id="site-footer" class="site-footer footer-v1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="widget-footer">
                            <h5 class="text-white">Services</h5>
                            <ul class="list-items">
                                <li class="list-item"><a href="">Service de Courtage</a></li>
                                <li class="list-item"><a href="">Service Evenementiel</a></li>
                                <li class="list-item"><a href="">Service de Marketing et Communication</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="widget-footer">
                            <h5 class="text-white">Apprendre</h5>
                            <ul class="list-items">
                                <li class="list-item"><a href="">Social Media Platform</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="widget-footer">
                            <h5 class="text-white">Global fine Service</h5>
                            <ul class="list-items">
                                <li class="list-item"><a href="">A propos</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="widget-footer">
                            <h5 class="text-white">S'abonner</h5>
                            <p>Suivez notre bulletin d'information pour rester à jour sur l'agence.</p>
                            <form id="mc4wp-form-1" class="mc4wp-form mc4wp-form-1343" method="post">
                                <div class="mc4wp-form-fields">
                                    <div class="subscribe-inner-form">
                                        <input type="email" name="email" placeholder="Votre Email" required="required">
                                        <button type="submit" class="subscribe-btn-icon"><i class="flaticon-telegram"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row mt-65">
                    <div class="col-md-6 mb-4 mb-md-0">
                        {{-- <img src="{{ asset('images/logo-light.png') }}" alt="" class="lazyloaded" data-ll-status="loaded"> --}}
                    </div>
                    <div class="col-md-6 text-left text-md-right align-self-center">
                        <p class="copyright-text">Copyright © 2020 Global fine. All Rights Reserved.</p>
                    </div>
                </div>
            </div>
        </footer><!-- #site-footer -->
    </div><!-- #page -->
    <a id="back-to-top" href="#" class="show"><i class="flaticon-up-arrow"></i></a>
    <!-- jQuery -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/jquery.isotope.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/easypiechart.min.js') }}"></script>
    <script src="{{ asset('js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/header-mobile.js') }}"></script>
    <!-- REVOLUTION JS FILES -->

    <script src="{{ asset('plugins/revolution/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('plugins/revolution/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>

    <!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
    <script src="{{ asset('plugins/revolution/revolution/js/extensions/revolution-plugin.js') }}"></script>

    <!-- REVOLUTION SLIDER SCRIPT FILES -->
    <script src="{{ asset('js/rev-script-2.js') }}"></script>
    <script src="{{ asset('js/royal_preloader.min.js') }}"></script>
    <script>
        window.jQuery = window.$ = jQuery;
        (function($) {
            "use strict";
            //Preloader
            Royal_Preloader.config({
                mode: 'logo',
                logo: '{{ asset('
                images / logo.svg ') }}',
                logo_size: [160, 75],
                showProgress: true,
                showPercentage: true,
                text_colour: '#000000',
                background: '#ffffff'
            });
        })(jQuery);
    </script>

    @livewireScripts
</body>

</html>