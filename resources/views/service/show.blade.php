@extends('base')

@section('styles')
@endsection

@section('content')

<div id="content" class="site-content">
    <section class="portfolio-single" style="padding-top: 20px;">
        <div class="container">
            <div class="row">
                @foreach ($extraService->getMedia('images') as $image)
                <div class="col-md-12 mb-5">
                    <img src="{{ asset($image->getUrl('thumb')) }}" style="width: 100%;" alt="">
                </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-md-8">
                    @can('update', $extraService)
                    <a href="{{ route('service.extraService.edit', $extraService) }}">{{ __('Update') }}</a>
                    @endcan
                    <p>{{ $extraService->description }}</p>
                </div>
                <div class="offset-lg-1 col-lg-3 col-md-4">
                    <div class="row">
                        <div class="col-md-12 col-6">
                            <div class="project-detail mb-3">
                                <span>PUBLISHED:</span>
                                <strong>April 20, 2019</strong>
                            </div>
                        </div>
                        <div class="col-md-12 col-6">
                            <div class="project-detail mb-3">
                                <span>CATEGORY:</span>
                                <strong>Design / Ideas</strong>
                            </div>
                        </div>
                        <div class="col-md-12 col-6">
                            <div class="project-detail mb-3">
                                <span>CLIENT:</span>
                                <strong>ThemeModern</strong>
                            </div>
                        </div>
                        <div class="col-md-12 col-6">
                            <div class="otf-social-share clearfix shape-circle">
                                <a class="share-facebook" href="facebook.html" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                <a class="share-twitter" href="twitter.html" target="_blank"><i class="fab fa-twitter"></i></a>
                                <a class="share-pinterest" href="pinterest.com" target="_blank"><i class="fab fa-pinterest-p"></i></a>
                                <a class="share-linkedin" href="linkedin.html" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

@endsection