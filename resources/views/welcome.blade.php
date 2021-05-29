@extends('frontend.layout')
@section('content')

    <!-- Hero slider-->
    <section class="tns-carousel tns-controls-lg mb-4 mb-lg-5">
        <div class="tns-carousel-inner" data-carousel-options="{&quot;mode&quot;: &quot;gallery&quot;, &quot;responsive&quot;: {&quot;0&quot;:{&quot;nav&quot;:true, &quot;controls&quot;: false},&quot;992&quot;:{&quot;nav&quot;:false, &quot;controls&quot;: true}}}">
            <!-- Item-->
            @forelse($carousels as $carousel)
                <div class="px-lg-5" style="background-color: {{ $carousel->background_color }}">
                    <div class="d-lg-flex justify-content-between align-items-center ps-lg-4">
                        <img class="d-block order-lg-2 me-lg-n5 flex-shrink-0" width="963px" height="700px" src="{{ asset($carousel->image) }}" alt="Women Sportswear">
                        <div class="position-relative mx-auto me-lg-n5 py-5 px-4 mb-lg-5 order-lg-1" style="max-width: 42rem; z-index: 10;">
                            <div class="pb-lg-5 mb-lg-5 text-center text-lg-start text-lg-nowrap">
                                <h3 class="h2 text-light fw-light pb-1 from-bottom">{{ $carousel->h3_tag }}</h3>
                                <h2 class="text-light display-5 from-bottom delay-1">{{ $carousel->h2_tag }}</h2>
                                <p class="fs-lg text-light pb-3 from-bottom delay-2">{{ $carousel->p_tag }}</p>
                                <div class="d-table scale-up delay-4 mx-auto mx-lg-0">
                                    <a class="btn btn-primary" href="{{$carousel->link}}">Shop Now<i class="ci-arrow-right ms-2 me-n1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="px-lg-5" style="background-color: #c3b41d;">
                    <div class="d-lg-flex justify-content-between align-items-center ps-lg-4"><img class="d-block order-lg-2 me-lg-n5 flex-shrink-0" src="{{ asset('images/carousel/06.png') }}" alt="Women Sportswear">
                        <div class="position-relative mx-auto me-lg-n5 py-5 px-4 mb-lg-5 order-lg-1" style="max-width: 42rem; z-index: 10;">
                            <div class="pb-lg-5 mb-lg-5 text-center text-lg-start text-lg-nowrap">
                                <h3 class="h2 text-light fw-light pb-1 from-bottom">Hurry up! Limited time offer.</h3>
                                <h2 class="text-light display-5 from-bottom delay-1">Women Sportswear Sale</h2>
                                <p class="fs-lg text-light pb-3 from-bottom delay-2">Sneakers, Kids, Sweatshirts, Hoodies &amp; much more...</p>
                                <div class="d-table scale-up delay-4 mx-auto mx-lg-0"><a class="btn btn-primary" href="shop-grid-ls.html">Shop Now<i class="ci-arrow-right ms-2 me-n1"></i></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
    </section>
    <section class="container position-relative pt-3 pt-lg-0 pb-5 mt-lg-n10" style="z-index: 10;">
        <div class="row">
            <div class="col-xl-8 col-lg-9">
                <div class="card border-0 shadow-lg">
                    <div class="card-body px-3 pt-grid-gutter pb-0">
                        <div class="row g-0 ps-1">
                            @forelse($categories as $category)
                                <div class="col-sm-4 px-2 mb-grid-gutter">
                                    <a class="d-block text-center text-decoration-none me-1" href="{{ $category->slug }}">
                                        <img class="d-block rounded mb-3" width="700px" height="714px" src="{{ asset($category->image) }}" alt="Men">
                                        <h3 class="fs-base pt-1 mb-0">{{ $category->name }}</h3>
                                    </a>
                                </div>
                            @empty
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="container pt-md-3 pb-5 mb-md-3">
        <div class="row pt-4 mx-n2">
            @foreach($products as $product)
            <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-4">
                <div class="card product-card card-static">
                    <span class="badge bg-danger badge-shadow">Sale</span>
                    <a class="card-img-top d-block overflow-hidden" href="{{ $product->category->slug.'/'.$product->slug }}">
                        <img loading="lazy" width="600px" height="900px" src="{{ asset($product->image) }}" alt="Product">
                    </a>
                    <div class="card-body py-2">
                        <h3 class="product-title fs-sm"><a href="{{ $product->category->slug.'/'.$product->slug }}">{{ $product->name }}</a></h3>
                        <div class="d-flex justify-content-between">
                            <div class="product-price">
                                <div class="bg-faded-accent text-accent rounded-1 py-1 px-2 d-inline">{{ $product->price }}<small> PKR</small></div>
                                <del class="fs-sm text-muted">11<small> PKR</small></del>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                @endforeach
        </div>
    </section>


@endsection
