@extends('front-end.master')
@section('title')

@endsection

@section('mainContent')
    <!-- Home slider -->
    <div class="swiper-container" id="home-slider">
        <div class="swiper-wrapper">

            <div class="swiper-slide" data-cover="{{ asset('assets/front-end/img/') }}/slider/1.jpg" data-xs-height="220px" data-sm-height="350px" data-md-height="400px" data-lg-height="430px" data-xl-height="460px">
            <div class="swiper-overlay right">
                <div class="text-center">
                <p class="display-4 animated" data-animate="fadeDown">Business Casual<br/>Outfit Ideas</p>
                <a href="shop-grid.html" class="btn btn-primary rounded-pill animated" data-animate="fadeUp" data-addclass-on-xs="btn-sm">SHOP NOW</a>
                </div>
            </div>
            </div>

            <div class="swiper-slide" data-cover="{{ asset('assets/front-end/img/') }}/slider/2.jpg" data-xs-height="220px" data-sm-height="350px" data-md-height="400px" data-lg-height="430px" data-xl-height="460px">
            <div class="swiper-overlay left">
                <div class="text-center">
                <h1 class="bg-white text-dark d-inline-block p-1 animated" data-animate="fadeDown">TOP BRANDS</h1>
                <p class="display-4 animated" data-animate="fadeDown">30% - 70% OFF</p>
                <a href="shop-grid.html" class="btn btn-warning rounded-pill animated" data-animate="fadeUp" data-addclass-on-xs="btn-sm">SHOP NOW</a>
                </div>
            </div>
            </div>

            <div class="swiper-slide" data-cover="{{ asset('assets/front-end/img/') }}/slider/3.jpg" data-xs-height="220px" data-sm-height="350px" data-md-height="400px" data-lg-height="430px" data-xl-height="460px">
            <div class="swiper-overlay right">
                <div class="text-center">
                <h1 class="bg-white text-dark d-inline-block p-1 animated" data-animate="fadeDown">Brand New</h1>
                <p class="display-4 animated" data-animate="fadeDown">High Quality Clothes</p>
                <a href="shop-grid.html" class="btn btn-primary rounded-pill animated" data-animate="fadeUp" data-addclass-on-xs="btn-sm">SHOP NOW</a>
                </div>
            </div>
            </div>

        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-prev autohide"><i data-feather="chevron-left"></i></div>
        <div class="swiper-button-next autohide"><i data-feather="chevron-right"></i></div>
        </div>
        <!-- /Home slider -->

        <div class="container my-3">
        <div class="row">

            <div class="col">

            <!-- Blog Toolbar -->
            <div class="card">
                <div class="card-body d-flex justify-content-end align-items-center py-2">
                <span class="mr-auto bold">Latest Blog</span>
                <div class="dropdown dropdown-hover">
                    <button class="btn btn-light btn-sm border rounded-pill dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Newest <i data-feather="chevron-down"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right shadow-sm">
                    <button class="dropdown-item" type="button">Newest</button>
                    <button class="dropdown-item" type="button">Oldest</button>
                    <button class="dropdown-item" type="button">Popular</button>
                    </div>
                </div>
                <a href="blog-grid.html" class="btn btn-icon rounded-pill btn-sm btn-primary ml-3" data-toggle="tooltip" title="Show Grid"><i data-feather="grid"></i></a>
                <a href="blog-list.html" class="btn btn-icon rounded-pill btn-sm btn-outline-primary ml-1" data-toggle="tooltip" title="Show List"><i data-feather="list"></i></a>
                </div>
            </div>
            <!-- /Blog Toolbar -->

            <!-- Blog Grid -->
            <div class="card-deck card-deck-2-columns mt-3">
                @foreach($posts as $post)
                <div class="card card-blog">
                <a href="" class="zoom-hover"><img src="{{ asset('assets/images/post/grid/'.$post->image) }}" alt="Blog"></a>
                <div class="card-body">
                    <a href="" class="title h4">{{ $post->title }}</a>
                    <span>{!! str_limit($post->description, 115) !!}</span>
                </div>
                <div class="card-footer flex-center">
                    <div class="small text-muted counter">
                    <i data-feather="heart"></i> 55
                    <i data-feather="message-square" class="ml-3"></i> 15
                    <i style="font-size: 15px" class="fas fa-eye ml-3"></i> {{ $post->view_count }}
                    </div>
                    <a href="blog-single.html" class="bold">READ MORE</a>
                </div>
                </div>
                @endforeach
            </div>
            <!-- /Blog Grid -->

            <!-- Pagination -->
            <div class="card card-pagination">
                <div class="card-body">
                <a href="javascript:void(0)" class="btn btn-link btn-icon"><i data-feather="chevron-left"></i></a>
                <div class="d-inline-flex">
                    <a href="javascript:void(0)" class="btn btn-icon rounded-pill btn-light">1</a>
                    <a href="javascript:void(0)" class="btn btn-icon rounded-pill btn-primary">2</a>
                    <a href="javascript:void(0)" class="btn btn-icon rounded-pill btn-light">3</a>
                    <button type="button" class="btn btn-icon rounded-pill bg-white">...</button>
                    <a href="javascript:void(0)" class="btn btn-icon rounded-pill btn-light">10</a>
                </div>
                <a href="javascript:void(0)" class="btn btn-link btn-icon"><i data-feather="chevron-right"></i></a>
                </div>
            </div>
            <!-- /Pagination -->

            </div>

            <!-- Blog Sidebar -->
            <div class="col-md-4 col-lg-4 mt-3 mt-md-0">
            <div class="card">
                <div class="card-header bg-white border-bottom bold roboto-condensed">
                <h5 class="bold mb-0">POPULAR THIS <span class="text-primary">WEEK</span></h5>
                </div>
                <div class="card-body">

                <div class="row">
                    <div class="col-12 col-sm-6 col-md-12">
                    <div class="card card-blog shadow-none">
                        <a href="blog-single.html" class="zoom-hover"><img src="{{ asset('assets/front-end/img/') }}/blog/3.jpg" alt="Blog"></a>
                        <div class="card-body p-0 text-center">
                        <a href="blog-single.html" class="title h5 mt-3">5 Simple Outfits for Men</a>
                        <div class="small text-muted">
                            <i data-feather="heart"></i> 55 Likes
                            <i data-feather="message-square" class="ml-3"></i> 15 Comments
                        </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-12 mt-4 mt-sm-0 mt-md-4">
                    <div class="card card-blog shadow-none">
                        <a href="blog-single.html" class="zoom-hover"><img src="{{ asset('assets/front-end/img/') }}/blog/4.jpg" alt="Blog"></a>
                        <div class="card-body p-0 text-center">
                        <a href="blog-single.html" class="title h5 mt-3">Business Casual Outfit Ideas</a>
                        <div class="small text-muted">
                            <i data-feather="heart"></i> 55 Likes
                            <i data-feather="message-square" class="ml-3"></i> 15 Comments
                        </div>
                        </div>
                    </div>
                    </div>
                </div>

                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header bg-white border-bottom bold roboto-condensed">
                <h5 class="bold mb-0">POPULAR <span class="text-primary">CATEGORIES</span></h5>
                </div>
                <div class="card-body">
                <div class="btn-group-scatter">
                    @foreach($categories as $category)
                    <a href="javascript:void(0)" class="btn btn-light rounded-pill">{{ $category->category_name }}</a>
                    @endforeach
                </div>
                </div>
            </div>

            <br>

            <div class="card mt-3">
                <div class="card-header bg-white border-bottom bold roboto-condensed">
                <h5 class="bold mb-0">POPULAR <span class="text-primary">TAGS</span></h5>
                </div>
                <div class="card-body">
                <div class="btn-group-scatter">
                    @foreach($tags as $tag)
                    <a href="javascript:void(0)" class="btn btn-light rounded-pill">{{ $tag->tag_name }}</a>
                    @endforeach
                </div>
                </div>
            </div>
            </div>
            <!-- /Blog Sidebar -->

        </div>
        </div>
@endsection

