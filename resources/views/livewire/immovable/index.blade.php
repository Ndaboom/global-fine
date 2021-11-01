<div>

    <!-- My code hahaha  -->

    <div class="entry-content" style="padding-top:20px;">
        <div class="container">
            <div class="row">
                <div class="content-area col-lg-9 col-md-12 col-sm-12 col-xs-12">
                    @foreach ($properties as $property)
                    <article class="post-box">
                        <div class="post-inner">
                            <div class="entry-media">
                                <div class="post-cat">
                                    <span class="posted-in"><a href="#">{{ $property->city->name }}</a> <a href="#">Development</a></span>
                                </div>
                                <a href="{{ route('immovable.property.show', $property) }}"><img src="{{ asset($property->getFirstMediaUrl('images', 'thumb')) }}" alt="Event image"></a>
                            </div>
                            <div class="inner-post">
                                <div class="entry-header">
                                    <div class="entry-meta">
                                        <span class="byline"> <a class="url fn n" href="#">{{ __('Status') }}: {{ $property->status }}</a></span>
                                    </div>
                                </div>
                                <div class="btn-readmore"><a href="{{ route('immovable.property.show', $property) }}"><i class="flaticon-right-arrow-1"></i> Voir plus</a></div>
                            </div>
                        </div>
                    </article>
                    @endforeach
                    
                    <ul class="page-pagination none-style">
                        <li><a class="prev page-numbers" href="#"><i class="flaticon-back"></i></a></li>
                        <li><a class="page-numbers" href="#">1</a></li>
                        <li><span aria-current="page" class="page-numbers current">2</span></li>
                        <li><a class="page-numbers" href="#">3</a></li>
                        <li><a class="next page-numbers" href="#"><i class="flaticon-right-arrow-1"></i></a></li>
                    </ul>
                </div>
                <div class="widget-area primary-sidebar col-lg-3 col-md-12 col-sm-12 col-xs-12">
                    <aside class="widget widget_categories">
                        <h5 class="widget-title">Categories</h5>
                        <ul>
                            <li><a href="#">Design</a> <span class="posts-count">(3)</span></li>
                            <li><a href="#">Development</a> <span class="posts-count">(5)</span></li>
                            <li><a href="#">Startup</a> <span class="posts-count">(1)</span></li>
                            <li><a href="#">Technology</a> <span class="posts-count">(3)</span></li>
                        </ul>
                    </aside>
                    <aside id="search-2" class="widget widget_search">
                        <form role="search" method="get" id="search-form" class="search-form">
                            <input type="search" class="search-field" placeholder="Search…" value="" name="s">
                            <button type="submit" class="search-submit"><i class="flaticon-search"></i></button>
                        </form>
                    </aside>
                    <aside class="widget widget_recent_news">
                        <h5 class="widget-title">Recent Posts</h5>
                        <ul class="recent-news clearfix">
                            <li class="clearfix"> 
                                <div class="thumb">
                                    <a href="post.html"><img src="images/recent-img-1.jpg" alt=""></a>
                                </div>
                                <div class="entry-header">
                                    <h6><a href="post.html">Plan Your Project  with Your Software</a></h6>
                                    <span class="post-on"><span class="entry-date">November 21, 2019</span></span>
                                </div>
                            </li>
                  
                            <li class="clearfix"> 
                                <div class="thumb">
                                    <a href="post.html"><img src="images/recent-img-2.jpg" alt=""></a>
                                </div>
                                <div class="entry-header">
                                    <h6><a href="post.html">You have a Great  Business Idea?</a></h6>
                                    <span class="post-on"><span class="entry-date">November 21, 2019</span></span>
                                </div>
                            </li>
                  
                            <li class="clearfix"> 
                                <div class="thumb">
                                    <a href="post.html"><img src="images/recent-img-3.jpg" alt=""></a>
                                </div>
                                <div class="entry-header">
                                    <h6><a href="post.html">Building Data Analytics  Software</a></h6>
                                    <span class="post-on"><span class="entry-date">September 24, 2019</span></span>
                                </div>
                            </li>
                        </ul>
                    </aside>
                    <aside class="widget instagram_widget">
                        <h5 class="widget-title">Instagram</h5>
                        <div class="widget-insta-feeds instafeed-gallery">
                            <div class="instafeed-item">
                                <a href="#" target="_blank"><img src="images/ft-gallery-1.jpg" alt=""></a>
                            </div>
                            <div class="instafeed-item">
                                <a href="#" target="_blank"><img src="images/ft-gallery-2.jpg" alt=""></a>
                            </div>
                            <div class="instafeed-item">
                                <a href="#" target="_blank"><img src="images/ft-gallery-3.jpg" alt=""></a>
                            </div>
                            <div class="instafeed-item">
                                <a href="#" target="_blank"><img src="images/ft-gallery-4.jpg" alt=""></a>
                            </div>
                            <div class="instafeed-item">
                                <a href="#" target="_blank"><img src="images/ft-gallery-5.jpg" alt=""></a>
                            </div>
                            <div class="instafeed-item">
                                <a href="#" target="_blank"><img src="images/ft-gallery-6.jpg" alt=""></a>
                            </div>
                        </div>
                    </aside>
                    <aside class="widget widget_tag_cloud">
                        <h5 class="widget-title">Tags</h5>
                        <div class="tagcloud">
                            <a href="#">business</a>
                            <a href="#">marketing</a>
                            <a href="#">SEO</a>
                            <a href="#">SMM</a>
                            <a href="#">solution</a>
                            <a href="#">startup</a>
                            <a href="#">strategy</a>
                            <a href="#">tips</a>
                        </div>
                    </aside>
                    <aside class="widget widget_media_image">
                        <a href="contact.html"><img src="images/promo-image.jpg" alt=""></a>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <!-- My code hahaha  -->
</div>