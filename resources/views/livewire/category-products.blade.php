<div class="row pt-3 mx-n2">

    <!-- Product-->
    @foreach ($products as $product)
        <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-4">
            <div class="card product-card card-static">
                @if ($product->stock === 0)
                    <span class="badge bg-accent badge-shadow">Sold Out</span>
                @elseif ($product->discounted_price)
                    <span class="badge bg-danger badge-shadow">Sale</span>
                @endif
                <a class="card-img-top d-block overflow-hidden"
                    href="{{ route('category.product', [$product->category->slug, $product->slug]) }}">
                    <img class="lazy" src="{{ asset('img/danoori.gif') }}"
                        data-src="{{ get_image_path($product->large_photo_path) }}" alt="{{ $product->slug }}"
                        onload="if(this.src !== this.getAttribute('data-src')) this.src=this.getAttribute('data-src');">
                </a>
                <div class="card-body py-2 px-0">
                    <h5 class="product-title fs-xs text-center text-uppercase"><a
                            href="{{ $product->category->slug . '/' . $product->slug }}">{{ $product->name }}</a>
                    </h5>
                    <div class="d-flex justify-content-center text-center">
                        <div class="product-price" @if ($loop->last && $loadAmount < $totalRecords) id="last_record" @endif>
                            @if ($product->discounted_price)
                                <div class="fs-xs bg-faded-danger text-danger rounded-1 py-1 px-2 d-inline">
                                    {{ number_format((float) $product->discounted_price, 2, '.', '') }}<small>
                                        PKR</small></div>
                                <del class="fs-xs text-muted">{{ number_format((float) $product->original_price, 2, '.', '') }}<small>
                                        PKR</small></del>
                            @else
                                <div class="fs-xs bg-faded-danger text-danger rounded-1 py-1 px-2 d-inline">
                                    {{ number_format((float) $product->original_price, 2, '.', '') }}<small>
                                        PKR</small></div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <div wire:loading.delay wire:loading.class="d-flex justify-content-center">
        <div class="">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>

    @if ($loadAmount >= $totalRecords)
        <p class="text-gray-800 font-bold text-2xl text-center my-2">No Remaining Records!</p>
    @endif


    @section('extra-js')
        <script>
            const lastRecord = document.getElementById('last_record');
            const options = {
                root: null,
                threshold: 1,
                rootMargin: '0px'
            }
            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        @this.loadMore()
                    }
                });
            });
            observer.observe(lastRecord);
        </script>

    @endsection

</div>
