@extends('frontend.layout')

@section('extra-css')

    <link rel="stylesheet" media="screen" href="{{asset('vendor/lightgallery.js/dist/css/lightgallery.min.css')}}"/>
    <link rel="stylesheet" media="screen" href="{{asset('vendor/simplebar/dist/simplebar.min.css')}}"/>
    <link rel="stylesheet" media="screen" href="{{ asset('vendor/tiny-slider/dist/tiny-slider.css') }}"/>
    <link rel="stylesheet" media="screen" href="{{ asset('vendor/drift-zoom/dist/drift-basic.min.css') }}"/>
    <link rel="stylesheet" media="screen" href="{{ asset('vendor/lightgallery.js/dist/css/lightgallery.min.css') }}"/>

    @endsection
@section('content')
    <div class="page-title-overlap bg-dark pt-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
            <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                        <li class="breadcrumb-item"><a class="text-nowrap" href="index.html"><i class="ci-home"></i>Home</a></li>
                        <li class="breadcrumb-item text-nowrap"><a href="#">Shop</a>
                        </li>
                        <li class="breadcrumb-item text-nowrap active" aria-current="page">Product Page v.1</li>
                    </ol>
                </nav>
            </div>
            <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
                <h1 class="h3 text-light mb-0">Sports Hooded Sweatshirt</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <!-- Gallery + details-->
        <div class="bg-light shadow-lg rounded-3 px-4 py-3 mb-5">
            <div class="px-lg-3">
                <div class="row">
                    <!-- Product gallery-->
                    <div class="col-lg-7 pe-lg-0 pt-lg-4">
                        <div class="product-gallery">
                            <div class="product-gallery-preview order-sm-2">
                                <div class="product-gallery-preview-item active" id="first"><img class="image-zoom" src="img/shop/single/gallery/01.jpg" data-zoom="img/shop/single/gallery/01.jpg" alt="Product image">
                                    <div class="image-zoom-pane"></div>
                                </div>
                                <div class="product-gallery-preview-item" id="second"><img class="image-zoom" src="img/shop/single/gallery/02.jpg" data-zoom="img/shop/single/gallery/02.jpg" alt="Product image">
                                    <div class="image-zoom-pane"></div>
                                </div>
                                <div class="product-gallery-preview-item" id="third"><img class="image-zoom" src="img/shop/single/gallery/03.jpg" data-zoom="img/shop/single/gallery/03.jpg" alt="Product image">
                                    <div class="image-zoom-pane"></div>
                                </div>
                                <div class="product-gallery-preview-item" id="fourth"><img class="image-zoom" src="img/shop/single/gallery/04.jpg" data-zoom="img/shop/single/gallery/04.jpg" alt="Product image">
                                    <div class="image-zoom-pane"></div>
                                </div>
                            </div>
                            <div class="product-gallery-thumblist order-sm-1"><a class="product-gallery-thumblist-item active" href="#first"><img src="img/shop/single/gallery/th01.jpg" alt="Product thumb"></a><a class="product-gallery-thumblist-item" href="#second"><img src="img/shop/single/gallery/th02.jpg" alt="Product thumb"></a><a class="product-gallery-thumblist-item" href="#third"><img src="img/shop/single/gallery/th03.jpg" alt="Product thumb"></a><a class="product-gallery-thumblist-item" href="#fourth"><img src="img/shop/single/gallery/th04.jpg" alt="Product thumb"></a><a class="product-gallery-thumblist-item video-item" href="https://www.youtube.com/watch?v=1vrXpMLLK14" lg-uid="lg0">
                                    <div class="product-gallery-thumblist-item-text"><i class="ci-video"></i>Video</div></a></div>
                        </div>
                    </div>
                    <!-- Product details-->
                    <div class="col-lg-5 pt-4 pt-lg-0">
                        <div class="product-details ms-auto pb-3">
                            <div class="mb-3"><span class="h3 fw-normal text-accent me-1">$18.<small>99</small></span>
                                <del class="text-muted fs-lg me-3">$25.<small>00</small></del><span class="badge bg-danger badge-shadow align-middle mt-n2">Sale</span>
                            </div>
                            <div class="position-relative me-n4 mb-5">
                                <div class="product-badge product-available mt-n1"><i class="ci-security-check"></i>Product available</div>
                            </div>
                            <!-- Product panels-->
                            <div class="accordion mb-4" id="productPanels">
                                <div class="accordion-item">
                                    <h3 class="accordion-header"><a class="accordion-button" href="#productInfo" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="productInfo"><i class="ci-announcement text-muted fs-lg align-middle mt-n1 me-2"></i>Product info</a></h3>
                                    <div class="accordion-collapse collapse show" id="productInfo" data-bs-parent="#productPanels" style="">
                                        <div class="accordion-body">
                                            <h6 class="fs-sm mb-2">Composition</h6>
                                            <ul class="fs-sm ps-4">
                                                <li>Elastic rib: Cotton 95%, Elastane 5%</li>
                                                <li>Lining: Cotton 100%</li>
                                                <li>Cotton 80%, Polyester 20%</li>
                                            </ul>
                                            <h6 class="fs-sm mb-2">Art. No.</h6>
                                            <ul class="fs-sm ps-4 mb-0">
                                                <li>183260098</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h3 class="accordion-header"><a class="accordion-button collapsed" href="#shippingOptions" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="shippingOptions"><i class="ci-delivery text-muted lead align-middle mt-n1 me-2"></i>Shipping options</a></h3>
                                    <div class="accordion-collapse collapse" id="shippingOptions" data-bs-parent="#productPanels" style="">
                                        <div class="accordion-body fs-sm">
                                            <div class="d-flex justify-content-between border-bottom pb-2">
                                                <div>
                                                    <div class="fw-semibold text-dark">Courier</div>
                                                    <div class="fs-sm text-muted">2 - 4 days</div>
                                                </div>
                                                <div>$26.50</div>
                                            </div>
                                            <div class="d-flex justify-content-between border-bottom py-2">
                                                <div>
                                                    <div class="fw-semibold text-dark">Local shipping</div>
                                                    <div class="fs-sm text-muted">up to one week</div>
                                                </div>
                                                <div>$10.00</div>
                                            </div>
                                            <div class="d-flex justify-content-between border-bottom py-2">
                                                <div>
                                                    <div class="fw-semibold text-dark">Flat rate</div>
                                                    <div class="fs-sm text-muted">5 - 7 days</div>
                                                </div>
                                                <div>$33.85</div>
                                            </div>
                                            <div class="d-flex justify-content-between border-bottom py-2">
                                                <div>
                                                    <div class="fw-semibold text-dark">UPS ground shipping</div>
                                                    <div class="fs-sm text-muted">4 - 6 days</div>
                                                </div>
                                                <div>$18.00</div>
                                            </div>
                                            <div class="d-flex justify-content-between pt-2">
                                                <div>
                                                    <div class="fw-semibold text-dark">Local pickup from store</div>
                                                    <div class="fs-sm text-muted">—</div>
                                                </div>
                                                <div>$0.00</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Sharing-->
                            <label class="form-label d-inline-block align-middle my-2 me-3">Share:</label><a class="btn-share btn-twitter me-2 my-2" href="#"><i class="ci-twitter"></i>Twitter</a><a class="btn-share btn-instagram me-2 my-2" href="#"><i class="ci-instagram"></i>Instagram</a><a class="btn-share btn-facebook my-2" href="#"><i class="ci-facebook"></i>Facebook</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product description section 1-->
        <div class="row align-items-center py-md-3">
            <div class="col-lg-5 col-md-6 offset-lg-1 order-md-2"><img class="d-block rounded-3" src="img/shop/single/prod-img.jpg" alt="Image"></div>
            <div class="col-lg-4 col-md-6 offset-lg-1 py-4 order-md-1">
                <h2 class="h3 mb-4 pb-2">High quality materials</h2>
                <h6 class="fs-base mb-3">Soft cotton blend</h6>
                <p class="fs-sm text-muted pb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit.</p>
                <h6 class="fs-base mb-3">Washing instructions</h6>
                <ul class="nav nav-tabs mb-3" role="tablist">
                    <li class="nav-item"><a class="nav-link active" href="#wash" data-bs-toggle="tab" role="tab" aria-selected="true"><i class="ci-wash fs-xl"></i></a></li>
                    <li class="nav-item"><a class="nav-link" href="#bleach" data-bs-toggle="tab" role="tab" aria-selected="false"><i class="ci-bleach fs-xl"></i></a></li>
                    <li class="nav-item"><a class="nav-link" href="#hand-wash" data-bs-toggle="tab" role="tab" aria-selected="false"><i class="ci-hand-wash fs-xl"></i></a></li>
                    <li class="nav-item"><a class="nav-link" href="#ironing" data-bs-toggle="tab" role="tab" aria-selected="false"><i class="ci-ironing fs-xl"></i></a></li>
                    <li class="nav-item"><a class="nav-link" href="#dry-clean" data-bs-toggle="tab" role="tab" aria-selected="false"><i class="ci-dry-clean fs-xl"></i></a></li>
                </ul>
                <div class="tab-content text-muted fs-sm">
                    <div class="tab-pane fade active show" id="wash" role="tabpanel">30° mild machine washing</div>
                    <div class="tab-pane fade" id="bleach" role="tabpanel">Do not use any bleach</div>
                    <div class="tab-pane fade" id="hand-wash" role="tabpanel">Hand wash normal (30°)</div>
                    <div class="tab-pane fade" id="ironing" role="tabpanel">Low temperature ironing</div>
                    <div class="tab-pane fade" id="dry-clean" role="tabpanel">Do not dry clean</div>
                </div>
            </div>
        </div>
        <!-- Product description section 2-->

    </div>




    <div class="container py-5 my-md-3">
        <h2 class="h3 text-center pb-4">You may also like</h2>
        <div class="tns-carousel tns-controls-static tns-controls-outside">
            <div class="tns-outer" id="tns3-ow"><div class="tns-controls" aria-label="Carousel Navigation" tabindex="0"><button type="button" data-controls="prev" tabindex="-1" aria-controls="tns3"><i class="ci-arrow-left"></i></button><button type="button" data-controls="next" tabindex="-1" aria-controls="tns3"><i class="ci-arrow-right"></i></button></div><div class="tns-liveregion tns-visually-hidden" aria-live="polite" aria-atomic="true">slide <span class="current">9 to 12</span>  of 5</div><div id="tns3-mw" class="tns-ovh"><div class="tns-inner" id="tns3-iw"><div class="tns-carousel-inner  tns-slider tns-carousel tns-subpixel tns-calc tns-horizontal" data-carousel-options="{&quot;items&quot;: 2, &quot;controls&quot;: true, &quot;nav&quot;: false, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;500&quot;:{&quot;items&quot;:2, &quot;gutter&quot;: 18},&quot;768&quot;:{&quot;items&quot;:3, &quot;gutter&quot;: 20}, &quot;1100&quot;:{&quot;items&quot;:4, &quot;gutter&quot;: 30}}}" id="tns3" style="transition-duration: 0s; transform: translate3d(-38.0952%, 0px, 0px);"><div class="tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">
                                <div class="card product-card card-static">
                                    <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="" data-bs-original-title="Add to wishlist" aria-label="Add to wishlist"><i class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="#"><img src="img/shop/catalog/22.jpg" alt="Product"></a>
                                    <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Men’s Hoodie</a>
                                        <h3 class="product-title fs-sm"><a href="#">Block-colored Hooded Top</a></h3>
                                        <div class="d-flex justify-content-between">
                                            <div class="product-price text-accent">$24.<small>99</small></div>
                                            <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-half active"></i><i class="star-rating-icon ci-star"></i><i class="star-rating-icon ci-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><div class="tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">
                                <div class="card product-card card-static">
                                    <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="" data-bs-original-title="Add to wishlist" aria-label="Add to wishlist"><i class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="#"><img src="img/shop/catalog/23.jpg" alt="Product"></a>
                                    <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Men’s Hoodie</a>
                                        <h3 class="product-title fs-sm"><a href="#">Block-colored Hooded Top</a></h3>
                                        <div class="d-flex justify-content-between">
                                            <div class="product-price text-accent">$24.<small>99</small></div>
                                            <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><div class="tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">
                                <div class="card product-card card-static">
                                    <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="" data-bs-original-title="Add to wishlist" aria-label="Add to wishlist"><i class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="#"><img src="img/shop/catalog/24.jpg" alt="Product"></a>
                                    <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Men’s Hoodie</a>
                                        <h3 class="product-title fs-sm"><a href="#">Block-colored Hooded Top</a></h3>
                                        <div class="d-flex justify-content-between">
                                            <div class="product-price text-accent">$25.<small>00</small></div>
                                            <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i><i class="star-rating-icon ci-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><div class="tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">
                                <div class="card product-card card-static">
                                    <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="" data-bs-original-title="Add to wishlist" aria-label="Add to wishlist"><i class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="#"><img src="img/shop/catalog/20.jpg" alt="Product"></a>
                                    <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Men’s Hoodie</a>
                                        <h3 class="product-title fs-sm"><a href="#">Block-colored Hooded Top</a></h3>
                                        <div class="d-flex justify-content-between">
                                            <div class="product-price"><span class="text-accent">$24.<small>99</small></span></div>
                                            <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-half active"></i><i class="star-rating-icon ci-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><div class="tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">
                                <div class="card product-card card-static">
                                    <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="" data-bs-original-title="Add to wishlist" aria-label="Add to wishlist"><i class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="#"><img src="img/shop/catalog/21.jpg" alt="Product"></a>
                                    <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Men’s Hoodie</a>
                                        <h3 class="product-title fs-sm"><a href="#">Block-colored Hooded Top</a></h3>
                                        <div class="d-flex justify-content-between">
                                            <div class="product-price text-accent">$26.<small>99</small></div>
                                            <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><div class="tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">
                                <div class="card product-card card-static">
                                    <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="" data-bs-original-title="Add to wishlist" aria-label="Add to wishlist"><i class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="#"><img src="img/shop/catalog/22.jpg" alt="Product"></a>
                                    <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Men’s Hoodie</a>
                                        <h3 class="product-title fs-sm"><a href="#">Block-colored Hooded Top</a></h3>
                                        <div class="d-flex justify-content-between">
                                            <div class="product-price text-accent">$24.<small>99</small></div>
                                            <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-half active"></i><i class="star-rating-icon ci-star"></i><i class="star-rating-icon ci-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><div class="tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">
                                <div class="card product-card card-static">
                                    <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="" data-bs-original-title="Add to wishlist" aria-label="Add to wishlist"><i class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="#"><img src="img/shop/catalog/23.jpg" alt="Product"></a>
                                    <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Men’s Hoodie</a>
                                        <h3 class="product-title fs-sm"><a href="#">Block-colored Hooded Top</a></h3>
                                        <div class="d-flex justify-content-between">
                                            <div class="product-price text-accent">$24.<small>99</small></div>
                                            <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><div class="tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">
                                <div class="card product-card card-static">
                                    <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="" data-bs-original-title="Add to wishlist" aria-label="Add to wishlist"><i class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="#"><img src="img/shop/catalog/24.jpg" alt="Product"></a>
                                    <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Men’s Hoodie</a>
                                        <h3 class="product-title fs-sm"><a href="#">Block-colored Hooded Top</a></h3>
                                        <div class="d-flex justify-content-between">
                                            <div class="product-price text-accent">$25.<small>00</small></div>
                                            <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i><i class="star-rating-icon ci-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Product-->
                            <div class="tns-item tns-slide-active" id="tns3-item0">
                                <div class="card product-card card-static">
                                    <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="" data-bs-original-title="Add to wishlist" aria-label="Add to wishlist"><i class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="#"><img src="img/shop/catalog/20.jpg" alt="Product"></a>
                                    <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Men’s Hoodie</a>
                                        <h3 class="product-title fs-sm"><a href="#">Block-colored Hooded Top</a></h3>
                                        <div class="d-flex justify-content-between">
                                            <div class="product-price"><span class="text-accent">$24.<small>99</small></span></div>
                                            <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-half active"></i><i class="star-rating-icon ci-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Product-->
                            <div class="tns-item tns-slide-active" id="tns3-item1">
                                <div class="card product-card card-static">
                                    <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="" data-bs-original-title="Add to wishlist" aria-label="Add to wishlist"><i class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="#"><img src="img/shop/catalog/21.jpg" alt="Product"></a>
                                    <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Men’s Hoodie</a>
                                        <h3 class="product-title fs-sm"><a href="#">Block-colored Hooded Top</a></h3>
                                        <div class="d-flex justify-content-between">
                                            <div class="product-price text-accent">$26.<small>99</small></div>
                                            <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Product-->
                            <div class="tns-item tns-slide-active" id="tns3-item2">
                                <div class="card product-card card-static">
                                    <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="" data-bs-original-title="Add to wishlist" aria-label="Add to wishlist"><i class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="#"><img src="img/shop/catalog/22.jpg" alt="Product"></a>
                                    <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Men’s Hoodie</a>
                                        <h3 class="product-title fs-sm"><a href="#">Block-colored Hooded Top</a></h3>
                                        <div class="d-flex justify-content-between">
                                            <div class="product-price text-accent">$24.<small>99</small></div>
                                            <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-half active"></i><i class="star-rating-icon ci-star"></i><i class="star-rating-icon ci-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Product-->
                            <div class="tns-item tns-slide-active" id="tns3-item3">
                                <div class="card product-card card-static">
                                    <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="" data-bs-original-title="Add to wishlist" aria-label="Add to wishlist"><i class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="#"><img src="img/shop/catalog/23.jpg" alt="Product"></a>
                                    <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Men’s Hoodie</a>
                                        <h3 class="product-title fs-sm"><a href="#">Block-colored Hooded Top</a></h3>
                                        <div class="d-flex justify-content-between">
                                            <div class="product-price text-accent">$24.<small>99</small></div>
                                            <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Product-->
                            <div class="tns-item" id="tns3-item4" aria-hidden="true" tabindex="-1">
                                <div class="card product-card card-static">
                                    <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="" data-bs-original-title="Add to wishlist" aria-label="Add to wishlist"><i class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="#"><img src="img/shop/catalog/24.jpg" alt="Product"></a>
                                    <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Men’s Hoodie</a>
                                        <h3 class="product-title fs-sm"><a href="#">Block-colored Hooded Top</a></h3>
                                        <div class="d-flex justify-content-between">
                                            <div class="product-price text-accent">$25.<small>00</small></div>
                                            <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i><i class="star-rating-icon ci-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">
                                <div class="card product-card card-static">
                                    <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="" data-bs-original-title="Add to wishlist" aria-label="Add to wishlist"><i class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="#"><img src="img/shop/catalog/20.jpg" alt="Product"></a>
                                    <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Men’s Hoodie</a>
                                        <h3 class="product-title fs-sm"><a href="#">Block-colored Hooded Top</a></h3>
                                        <div class="d-flex justify-content-between">
                                            <div class="product-price"><span class="text-accent">$24.<small>99</small></span></div>
                                            <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-half active"></i><i class="star-rating-icon ci-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><div class="tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">
                                <div class="card product-card card-static">
                                    <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="" data-bs-original-title="Add to wishlist" aria-label="Add to wishlist"><i class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="#"><img src="img/shop/catalog/21.jpg" alt="Product"></a>
                                    <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Men’s Hoodie</a>
                                        <h3 class="product-title fs-sm"><a href="#">Block-colored Hooded Top</a></h3>
                                        <div class="d-flex justify-content-between">
                                            <div class="product-price text-accent">$26.<small>99</small></div>
                                            <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><div class="tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">
                                <div class="card product-card card-static">
                                    <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="" data-bs-original-title="Add to wishlist" aria-label="Add to wishlist"><i class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="#"><img src="img/shop/catalog/22.jpg" alt="Product"></a>
                                    <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Men’s Hoodie</a>
                                        <h3 class="product-title fs-sm"><a href="#">Block-colored Hooded Top</a></h3>
                                        <div class="d-flex justify-content-between">
                                            <div class="product-price text-accent">$24.<small>99</small></div>
                                            <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-half active"></i><i class="star-rating-icon ci-star"></i><i class="star-rating-icon ci-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><div class="tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">
                                <div class="card product-card card-static">
                                    <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="" data-bs-original-title="Add to wishlist" aria-label="Add to wishlist"><i class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="#"><img src="img/shop/catalog/23.jpg" alt="Product"></a>
                                    <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Men’s Hoodie</a>
                                        <h3 class="product-title fs-sm"><a href="#">Block-colored Hooded Top</a></h3>
                                        <div class="d-flex justify-content-between">
                                            <div class="product-price text-accent">$24.<small>99</small></div>
                                            <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><div class="tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">
                                <div class="card product-card card-static">
                                    <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="" data-bs-original-title="Add to wishlist" aria-label="Add to wishlist"><i class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="#"><img src="img/shop/catalog/24.jpg" alt="Product"></a>
                                    <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Men’s Hoodie</a>
                                        <h3 class="product-title fs-sm"><a href="#">Block-colored Hooded Top</a></h3>
                                        <div class="d-flex justify-content-between">
                                            <div class="product-price text-accent">$25.<small>00</small></div>
                                            <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i><i class="star-rating-icon ci-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><div class="tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">
                                <div class="card product-card card-static">
                                    <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="" data-bs-original-title="Add to wishlist" aria-label="Add to wishlist"><i class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="#"><img src="img/shop/catalog/20.jpg" alt="Product"></a>
                                    <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Men’s Hoodie</a>
                                        <h3 class="product-title fs-sm"><a href="#">Block-colored Hooded Top</a></h3>
                                        <div class="d-flex justify-content-between">
                                            <div class="product-price"><span class="text-accent">$24.<small>99</small></span></div>
                                            <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-half active"></i><i class="star-rating-icon ci-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><div class="tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">
                                <div class="card product-card card-static">
                                    <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="" data-bs-original-title="Add to wishlist" aria-label="Add to wishlist"><i class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="#"><img src="img/shop/catalog/21.jpg" alt="Product"></a>
                                    <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Men’s Hoodie</a>
                                        <h3 class="product-title fs-sm"><a href="#">Block-colored Hooded Top</a></h3>
                                        <div class="d-flex justify-content-between">
                                            <div class="product-price text-accent">$26.<small>99</small></div>
                                            <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><div class="tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">
                                <div class="card product-card card-static">
                                    <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="" data-bs-original-title="Add to wishlist" aria-label="Add to wishlist"><i class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="#"><img src="img/shop/catalog/22.jpg" alt="Product"></a>
                                    <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Men’s Hoodie</a>
                                        <h3 class="product-title fs-sm"><a href="#">Block-colored Hooded Top</a></h3>
                                        <div class="d-flex justify-content-between">
                                            <div class="product-price text-accent">$24.<small>99</small></div>
                                            <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-half active"></i><i class="star-rating-icon ci-star"></i><i class="star-rating-icon ci-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div></div></div></div></div>
        </div>
    </div>


@endsection

@section('extra-js')

    <script src="{{asset('vendor/lightgallery.js/dist/js/lightgallery.min.js')}}"></script>
    <script src="{{asset('vendor/lg-zoom.js/dist/lg-zoom.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('vendor/simplebar/dist/simplebar.min.js')}}"></script>
    <script src="{{asset('vendor/tiny-slider/dist/min/tiny-slider.js')}}"></script>
    <script src="{{asset('vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js')}}"></script>
    <script src="{{asset('vendor/drift-zoom/dist/Drift.min.js')}}"></script>
    <script src="{{asset('vendor/lightgallery.js/dist/js/lightgallery.min.js')}}"></script>
    <script src="{{asset('vendor/lg-video.js/dist/lg-video.min.js')}}"></script>

    @endsection
