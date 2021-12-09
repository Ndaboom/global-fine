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
            </div>
        </div>
    </section>

</div>

@endsection