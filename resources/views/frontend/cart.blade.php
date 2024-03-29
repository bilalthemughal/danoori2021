@extends('frontend.layout')

@section('title')
    My Cart &#8211; Danoori
@endsection

@section('extra-css')
    <!-- <link rel="stylesheet" media="screen" href="{{ asset('vendor/lightgallery.js/dist/css/lightgallery.min.css') }}" />
        <link rel="stylesheet" media="screen" href="{{ asset('vendor/simplebar/dist/simplebar.min.css') }}" />
        <link rel="stylesheet" media="screen" href="{{ asset('vendor/tiny-slider/dist/tiny-slider.css') }}" />
        <link rel="stylesheet" media="screen" href="{{ asset('vendor/drift-zoom/dist/drift-basic.min.css') }}" />
        <link rel="stylesheet" media="screen" href="{{ asset('vendor/lightgallery.js/dist/css/lightgallery.min.css') }}" /> -->
    <style>
        .quantity {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0;
        }

        .quantity__minus,
        .quantity__plus {
            display: block;
            width: 44px;
            height: 46px;
            margin: 0;
            background: #FFFFFF;
            text-decoration: none;
            text-align: center;
            line-height: 23px;
            border-top: 2px solid #dee0ee;
            border-bottom: 2px solid #dee0ee;
            border-left: 1px solid #dee0ee;
            border-right: 2px solid #dee0ee;
        }

        .quantity__minus:hover,
        .quantity__plus:hover {
            background: #575b71;
            color: #fff;
        }

        .quantity__minus {
            border-radius: 3px 0 0 3px;
        }

        .quantity__plus {
            border-radius: 0 3px 3px 0;
        }

        .quantity__input {
            width: 65px;
            height: 46px;
            margin: 0;
            padding: 0;
            text-align: center;
            border-top: 2px solid #dee0ee;
            border-bottom: 2px solid #dee0ee;
            border-left: 1px solid #dee0ee;
            border-right: 2px solid #dee0ee;
            background: #fff;
            color: #8184a1;
        }
    </style>
@endsection
@section('content')
    <div class="page-title-overlap bg-dark pt-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
            <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                        <li class="breadcrumb-item"><a class="text-nowrap" href="/"><i class="ci-home"></i>Home</a>
                        </li>

                        <li class="breadcrumb-item text-nowrap active" aria-current="page">Cart</li>
                    </ol>
                </nav>
            </div>
            <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
                <h1 class="h3 text-light mb-0">Cart Detail</h1>
            </div>
        </div>

    </div>

    <div class="container pb-5 mb-2 mb-md-4">
        @livewire('cart-page')
    </div>
@endsection

@section('extra-js')
    <script>
        history.scrollRestoration = "manual";
        window.addEventListener("pageshow", function(event) {
            var historyTraversal = event.persisted ||
                (typeof window.performance != "undefined" &&
                    window.performance.navigation.type === 2);
            if (!historyTraversal) {
                if ({{ Session::get('added') }}) {
                    //fbq('track', 'AddToCart');
                    fbq('track', 'AddToCart');
                }
            }
        });
    </script>
@endsection
