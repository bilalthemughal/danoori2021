<div class="row">
    <!-- List of items-->
    <section class="col-lg-8">
        <div class="d-flex justify-content-between align-items-center pt-3 pb-4 pb-sm-5 mt-1">
            <h2 class="h6 text-light mb-0">Products</h2><a class="btn btn-outline-primary btn-sm ps-2" href="/"><i
                    class="ci-arrow-left me-2"></i>Continue shopping</a>
        </div>
        @forelse ($products as $product )
            <!-- Item-->
            <div class="d-sm-flex justify-content-between align-items-center my-2 pb-3 border-bottom">
                <div class="d-block d-sm-flex align-items-center text-center text-sm-start"><a
                        class="d-inline-block flex-shrink-0 mx-auto me-sm-4" href="{{ $product['link'] }}"><img
                            src="{{ $product['image'] }}" width="160" alt="Product"></a>
                    <div class="pt-2">
                        <h3 class="product-title fs-base mb-2"><a
                                href="{{ $product['link'] }}">{{ $product['name'] }}</a></h3>
                        <div class="fs-lg text-accent pt-2">Rs.{{ $product['price'] }}.<small>00</small></div>
                    </div>
                </div>
                <div class="pt-2 pt-sm-0 ps-sm-3 mx-auto mx-sm-0 text-center text-sm-start" style="max-width: 15rem;">
                    <!-- <label class="form-label" for="quantity1">Quantity</label> -->
                    <!-- <input class="form-control" type="number" id="quantity1" min="1" value="{{ $product['qty'] }}"> -->
                    <div class="quantity">
                        <button wire:click.prevent="remove({{ $product['id'] }})"
                            class="quantity__minus"><span>-</span></button>
                        <input readonly name="quantity" type="text" class="quantity__input"
                            value="{{ $product['qty'] }}">
                        <button wire:click.prevent="addToCart({{ $product['id'] }})"
                            class="quantity__plus"><span>+</span></button>
                    </div>
                </div>
            </div>
        @empty
            <h3>No item found in your cart</h3>
        @endforelse



    </section>
    <!-- Sidebar-->
    <aside class="col-lg-4 pt-4 pt-lg-0 ps-xl-5">
        <div class="bg-white rounded-3 shadow-lg p-4">
            <div class="py-2 px-xl-2">
                <div class="text-center mb-4 pb-3 border-bottom">
                    <h2 class="h6 mb-3 pb-1">Subtotal</h2>
                    <h3 class="fw-normal">Rs.{{ $totalPrice }}.<small>00</small></h3>
                </div>
                {{-- <div class="mb-3 mb-4">
                    <label class="form-label mb-3" for="order-comments"><span
                            class="badge bg-info fs-xs me-2">Note</span><span class="fw-medium">Additional
                            comments</span></label>
                    <textarea class="form-control" rows="6" id="order-comments"></textarea>
                </div> --}}
                {{-- <div class="" id="order-options">
                    {{-- <div class="accordion-item">
                        <h3 class="accordion-header"><a class="accordion-button" role="button" aria-expanded="true"
                                aria-controls="promo-code">Apply promo code</a></h3>
                        <div class="accordion-collapse collapse show" id="promo-code" data-bs-parent="#order-options">
                            <form class="accordion-body needs-validation" method="post" novalidate="">
                                <div class="mb-3">
                                    <input class="form-control" type="text" placeholder="Promo code" required="">
                                    <div class="invalid-feedback">Please provide promo code.</div>
                                </div>
                                <button class="btn btn-outline-primary d-block w-100" type="submit">Apply promo
                                    code</button>
                            </form>
                        </div>
                    </div> --}}

                {{-- </div> --}} 
                <a class="btn btn-primary btn-shadow d-block w-100 mt-4" href="{{ route('checkout') }}">
                    <i class="ci-card fs-lg me-2"></i>
                    Proceed to Checkout
                </a>
            </div>
        </div>
    </aside>
</div>