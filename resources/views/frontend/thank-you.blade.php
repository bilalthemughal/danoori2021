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
                    <p class="fs-sm">We will call you shortly or confirm your order via Whatsapp.</p>
                    <a class="btn btn-success mt-3 me-3"
                        href="{{ 'https://wa.me/+923264294050?text=Confirm my order: ' . $order_id }}"><i
                            class="ci-message"></i>&nbsp;&nbsp;Confirm via Whatsapp</a> @auth
                        <a class="btn btn-primary mt-3" href="{{ route('dashboard') }}"><i
                            class="ci-location"></i>&nbsp;Track order</a> @endauth
                </div>
            </div>
        </div>
    </div>

    <input type="hidden" value="{{ Session::get('total') }}" id="session_total">
@endsection

@section('extra-js')
    <script>
        window.addEventListener("pageshow", function(event) {
            var historyTraversal = event.persisted ||
                (typeof window.performance != "undefined" &&
                    window.performance.navigation.type === 2);
            if (!historyTraversal) {
                let total = document.querySelector('#session_total').value;
                if (total) {
                    fbq('track', 'Purchase', {
                        currency: 'PKR',
                        value: total
                    });
                    document.querySelector('#session_total').value = '';
                }
            }
        });
    </script>
@endsection
