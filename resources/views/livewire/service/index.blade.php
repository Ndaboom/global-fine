<div class="content-area col-lg-9 col-md-12 col-sm-12 col-xs-12">
        @foreach ($extraServices as $extraService)

        <article class="post-box">
            <div class="post-inner">
                <div class="entry-media">
                    <a href="{{ route('service.extraService.show', $extraService) }}"><img src="{{ asset($extraService->getFirstMediaUrl('images', 'thumb')) }}" alt=""></a>
                </div>
                <div class="inner-post">
                    <div class="entry-summary the-excerpt">
                        <p>{{ $extraService->description }}</p>
                    </div>
                    <div class="btn-readmore"><a href="{{ route('service.extraService.show', $extraService) }}"><i class="flaticon-right-arrow-1"></i> LEARN MORE</a></div>
                </div>
            </div>
        </article>

        @endforeach

        {{ $extraServices->links() }}

        <ul class="page-pagination none-style">
            <li><a class="prev page-numbers" href="#"><i class="flaticon-back"></i></a></li>
            <li><a class="page-numbers" href="#">1</a></li>
            <li><span aria-current="page" class="page-numbers current">2</span></li>
            <li><a class="page-numbers" href="#">3</a></li>
            <li><a class="next page-numbers" href="#"><i class="flaticon-right-arrow-1"></i></a></li>
        </ul>
</div>
