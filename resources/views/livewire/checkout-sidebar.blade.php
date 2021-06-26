<aside class="col-lg-4 pt-4 pt-lg-0 ps-xl-5">
    <div class="bg-white rounded-3 shadow-lg p-4 ms-lg-auto">
        <div class="py-2 px-xl-2">
            <div class="widget mb-3">
                <h2 class="widget-title text-center">Order summary</h2>
                @if ($totalPrice > 0)
                    @foreach ($products as $product)
                        <div class="d-flex align-items-center pb-2 border-bottom"><a class="d-block flex-shrink-0"
                                href="shop-single-v1.html"><img src="{{ $product['image'] }}" width="64"
                                    alt="Product"></a>
                            <div class="ps-2">
                                <h6 class="widget-product-title">
                                    <a href="shop-single-v1.html">{{ $product['name'] }}</a>
                                </h6>
                                <div class="widget-product-meta"><span
                                        class="text-accent me-2">Rs.{{ $product['price'] }}<small>.00</small></span><span
                                        class="text-muted">x {{ $product['qty'] }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="mb-3 mb-4">
                <label class="form-label mb-3" for="order-comments">
                    <span class="badge bg-info fs-xs me-2">Note</span>
                    <span class="fw-medium">Additional comments</span>
                </label>
                <textarea class="form-control" name="order_note" rows="6" id="order-comments"></textarea>
            </div>
            <ul class="list-unstyled fs-sm pb-2 border-bottom">
                <li class="d-flex justify-content-between align-items-center">
                    <span class="me-2">Subtotal:</span>
                    <span class="text-end">Rs.{{ $totalPrice }}.<small>00</small></span>
                </li>
                <li class="d-flex justify-content-between align-items-center"><span class="me-2">Shipping:</span><span
                        class="text-end">Free</span></li>
                <li class="d-flex justify-content-between align-items-center"><span class="me-2">Discount:</span><span
                        class="text-end">{{ $discount }}</span></li>
            </ul>
            <h3 class="fw-normal text-center my-4">Rs.{{ $discountedPrice }}.<small>00</small></h3>
            <form class="needs-validation" novalidate="">
                <div class="mb-3">
                    <input class="form-control" type="text" value="{{ $coupon_text }}" wire:model.defer="coupon_text"
                        placeholder="Promo code" required="">
                    <div class="invalid-feedback">Please provide promo code.</div>
                </div>
                <button class="btn btn-outline-primary d-block w-100" wire:click.prevent="applyPromoCode">Apply promo
                    code</button>
            </form>
        </div>
    </div>
</aside>
