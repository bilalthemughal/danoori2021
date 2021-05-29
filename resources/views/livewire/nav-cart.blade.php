<div class="navbar-tool dropdown ms-3">
    <a class="navbar-tool-icon-box bg-secondary dropdown-toggle" href="shop-cart.html">
        <span class="navbar-tool-label">{{ $totalItems }}</span>
        <i class="navbar-tool-icon ci-cart"></i>
    </a>
    <a class="navbar-tool-text" href="shop-cart.html">
        <small>My Cart</small>PKR {{ $totalPrice }}</a>
    <!-- Cart dropdown-->
    <div class="dropdown-menu dropdown-menu-end">
        <div class="widget widget-cart px-3 pt-2 pb-3" style="width: 20rem;">
            <div style="height: 15rem;" data-simplebar data-simplebar-auto-hide="false">
                @forelse($products as $product)
                    <div class="widget-cart-item pb-2 border-bottom">
                        <button class="btn-close text-danger" wire:click="remove({{ $product['id'] }})" type="button" aria-label="Remove">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="d-flex align-items-center">
                            <a class="flex-shrink-0" href="shop-single-v1.html">
                                <img src="{{asset($product['image'])}}" width="64" alt="Product">
                            </a>
                            <div class="ps-2">
                                <h6 class="widget-product-title">
                                    <a href="shop-single-v1.html">{{ $product['name'] }}</a>
                                </h6>
                                <div class="widget-product-meta">
                                    <span class="text-accent me-2">{{ $product['price'] }}<small> PKR</small></span>
                                    <span class="text-muted">x {{ $product['qty'] }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                @endforelse
            </div>
            <div class="d-flex flex-wrap justify-content-between align-items-center py-3">
                <div class="fs-sm me-2 py-2">
                    <span class="text-muted">Subtotal:</span>
                    <span class="text-accent fs-base ms-1">{{ $totalPrice }}<small> PKR</small></span>
                </div>
                <a class="btn btn-outline-secondary btn-sm" href="shop-cart.html">Expand cart<i class="ci-arrow-right ms-1 me-n1"></i></a>
            </div><a class="btn btn-primary btn-sm d-block w-100" href="checkout-details.html"><i class="ci-card me-2 fs-base align-middle"></i>Checkout</a>
        </div>
    </div>
</div>

