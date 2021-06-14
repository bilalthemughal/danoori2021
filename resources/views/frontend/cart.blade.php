@extends('frontend.layout')

@section('extra-css')

<!-- <link rel="stylesheet" media="screen" href="{{asset('vendor/lightgallery.js/dist/css/lightgallery.min.css')}}" />
<link rel="stylesheet" media="screen" href="{{asset('vendor/simplebar/dist/simplebar.min.css')}}" />
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
                    <li class="breadcrumb-item"><a class="text-nowrap" href="index.html"><i class="ci-home"></i>Home</a></li>
                    <li class="breadcrumb-item text-nowrap"><a href="#">Shop</a>
                    </li>
                    <li class="breadcrumb-item text-nowrap active" aria-current="page">Product Page v.1</li>
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

{{-- <script src="{{asset('vendor/lightgallery.js/dist/js/lightgallery.min.js')}}"></script>
<script src="{{asset('vendor/lg-zoom.js/dist/lg-zoom.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('vendor/simplebar/dist/simplebar.min.js')}}"></script>
<script src="{{asset('vendor/tiny-slider/dist/min/tiny-slider.js')}}"></script>
<script src="{{asset('vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js')}}"></script>
<script src="{{asset('vendor/drift-zoom/dist/Drift.min.js')}}"></script>
<script src="{{asset('vendor/lightgallery.js/dist/js/lightgallery.min.js')}}"></script>
<script src="{{asset('vendor/lg-video.js/dist/lg-video.min.js')}}"></script> --}}

@endsection