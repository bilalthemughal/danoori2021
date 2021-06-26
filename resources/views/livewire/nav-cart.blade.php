<div class="navbar-tool dropdown ms-3">
    <style>
        /* width */
        ::-webkit-scrollbar {
          width: 10px;
        }
        
        /* Track */
        ::-webkit-scrollbar-track {
          background: #f1f1f1; 
        }
         
        /* Handle */
        ::-webkit-scrollbar-thumb {
          background: #888; 
        }
        
        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
          background: #555; 
        }
        </style>
    <a class="navbar-tool-icon-box bg-secondary dropdown-toggle" href="{{ route('cart') }}">
        <span class="navbar-tool-label">{{ $totalItems }}</span>
        <i class="navbar-tool-icon ci-cart"></i>
    </a>
    <a class="navbar-tool-text" href="{{ route('cart') }}">
        <small>My Cart</small>PKR {{ $totalPrice }}</a>
    <!-- Cart dropdown-->
    @if ($totalItems > 0)
        <div class="dropdown-menu dropdown-menu-end">
            <div class="widget widget-cart px-3 pt-2 pb-3" style="width: 20rem;">
                <div style="height: 15rem; overflow-y: scroll; overflow-x: hidden;">
                    @foreach ($products as $product)
                        <div class="widget-cart-item pb-2 border-bottom">
                            <button class="btn-close text-danger" wire:click.prevent="remove({{ $product['id'] }})"
                                type="button" aria-label="Remove">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div class="d-flex align-items-center">
                                <a class="flex-shrink-0" href="{{ $product['link'] }}">
                                    <img src="{{ $product['nav_image'] }}" width="64" alt="Product">
                                </a>
                                <div class="ps-2">
                                    <h6 class="widget-product-title">
                                        <a href="{{ $product['link'] }}">{{ $product['name'] }}</a>
                                    </h6>
                                    <div class="widget-product-meta">
                                        <span class="text-accent me-2">{{ $product['price'] }}<small>
                                                PKR</small></span>
                                        <span class="text-muted">x {{ $product['qty'] }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>
                <div class="d-flex flex-wrap justify-content-between align-items-center py-3">
                    <div class="fs-sm me-2 py-2">
                        <span class="text-muted">Subtotal:</span>
                        <span class="text-accent fs-base ms-1">{{ $totalPrice }}<small> PKR</small></span>
                    </div>
                    <a class="btn btn-outline-secondary btn-sm" href="{{ route('cart') }}">Expand cart<i
                            class="ci-arrow-right ms-1 me-n1"></i></a>
                </div>
                <a class="btn btn-primary btn-sm d-block w-100" href="{{ route('checkout') }}"><i
                        class="ci-card me-2 fs-base align-middle"></i>Checkout</a>
            </div>
        </div>
    @endif

</div>
