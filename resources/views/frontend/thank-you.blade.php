@extends('frontend.layout')

@section('title')
    Thank you | Danoori
@endsection

@section('content')

    <div class="page-title-overlap bg-dark pt-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
            <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                        <li class="breadcrumb-item">
                            <a class="text-nowrap" href="/">
                                <i class="ci-home"></i>
                                Home
                            </a>
                        </li>
                        <li class="breadcrumb-item text-nowrap"><a href="/">Shop</a>
                        </li>
                        <li class="breadcrumb-item text-nowrap active" aria-current="page">Order placed</li>
                    </ol>
                </nav>
            </div>
            <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
                <h1 class="h3 text-light mb-0">Order Placed</h1>
            </div>
        </div>


    </div>


    <div class="container pb-5 mb-sm-4">
        <div class="pt-5">
            <div class="card py-3 mt-sm-3">
                <div class="card-body text-center">
                    <h2 class="h4 pb-3">Thank you for your order!</h2>
                    <p class="fs-sm mb-2">Your order has been placed and will be processed as soon as possible.</p>
                    <p class="fs-sm mb-2">Make sure you make note of your order number, which is <span
                            class="fw-medium">{{ $order_id }}.</span></p>
                    <p class="fs-sm">You will be receiving an email shortly with confirmation of your order. <u>You
                            can now:</u></p><a class="btn btn-secondary mt-3 me-3" href="/">Go back shopping</a> @auth <a
                            class="btn btn-primary mt-3" href="{{ route('dashboard') }}"><i
                            class="ci-location"></i>&nbsp;Track order</a> @endauth
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extra-js')
    <script>
        let total = {{ Session::get('total') }};
        if (total) {
            fbq('track', 'Purchase', {currency: 'abc', value: total});
        }
    </script>
@endsection
