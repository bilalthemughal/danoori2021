<div class="modal fade show" id="order-details" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Order No - {{ $order? $order->order_id: '' }}</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-0">
                <!-- Item-->
                @forelse ($products as $product)
                    <div class="d-sm-flex justify-content-between my-4">
                        <div class="d-sm-flex text-center text-sm-start"><a class="d-inline-block flex-shrink-0 mx-auto"
                                href="shop-single-v1.html" style="width: 10rem;"><img src="{{ $product->getImage() }}"
                                    alt="Product"></a>
                            <div class="ps-sm-4 pt-2">
                                <h3 class="product-title fs-base mb-2">
                                    <a href="{{ route('category.product', [$product->category->slug, $product->slug])}}">
                                        {{ $product->name }} </a>
                                </h3>
                                <div class="fs-sm"><span class="text-muted me-2">Category:</span>{{ $product->category->name }}</div>
                                {{-- <div class="fs-sm"><span class="text-muted me-2">Color:</span>Light blue</div> --}}
                                <div class="fs-lg text-accent pt-2">Rs. {{ $product->pivot->price / $product->pivot->quantity }}</div>
                            </div>
                        </div>
                        <div class="pt-2 ps-sm-3 mx-auto mx-sm-0 text-center">
                            <div class="text-muted mb-2">Quantity:</div>{{ $product->pivot->quantity }}
                        </div>
                        <div class="pt-2 ps-sm-3 mx-auto mx-sm-0 text-center">
                            <div class="text-muted mb-2">Subtotal</div>Rs. {{ $product->pivot->price }}
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
            <!-- Footer-->
            <div class="modal-footer flex-wrap justify-content-between bg-secondary fs-md">
                <div class="px-2 py-1"><span
                        class="text-muted">Subtotal:&nbsp;</span><span>Rs. {{ $order ? $order->sub_total : '' }}</span></div>
                <div class="px-2 py-1"><span class="text-muted">Shipping:&nbsp;</span><span>Free</span>
                </div>
                <div class="px-2 py-1"><span class="text-muted">Discount:&nbsp;</span><span>Rs. {{ $order ? $order->sub_total - $order->total  : 'N/A'}}</span></div>
                <div class="px-2 py-1"><span class="text-muted">Total:&nbsp;</span><span
                        class="fs-lg">Rs. {{ $order ? $order->total : ''}}</span></div>
            </div>
        </div>
    </div>
</div>
