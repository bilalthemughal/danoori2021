@extends('frontend.layout')

@section('title')
    Checkout &#8211; Danoori
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
                        <li class="breadcrumb-item text-nowrap"><a href="{{ route('cart') }}">Cart</a>
                        </li>
                        <li class="breadcrumb-item text-nowrap active" aria-current="page">Checkout</li>
                    </ol>
                </nav>
            </div>
            <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
                <h1 class="h3 text-light mb-0">Cart Detail</h1>
            </div>
        </div>


    </div>


    <div class="container pb-5 mb-2 mb-md-4">
        <div class="col-md-8">
            <div class="d-flex justify-content-between align-items-center pt-3 pb-4 pb-sm-5 mt-1">
                <h2 class="h6 text-light mb-0">Fill out the form</h2>
                <a class="btn btn-outline-primary btn-sm ps-2" href="/"><i class="ci-arrow-left me-2"></i>Continue
                    shopping</a>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{!! $error !!}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="post" id='checkout-form' action="{{ route('checkout') }}">
            @csrf
            <div class="row">
                <section class="col-lg-8">
                    @if (Session::has('message'))
                        <p class="alert alert-danger">{{ Session::get('message') }}</p>
                    @endif
                    <!-- Autor info-->
                    <div
                        class="d-sm-flex justify-content-between align-items-center bg-secondary p-4 rounded-3 mb-grid-gutter">
                        <div class="d-flex align-items-center">
                            <div class="img-thumbnail rounded-circle position-relative flex-shrink-0">

                                <img class="rounded-circle" src="{{ asset('images/placeholder.png') }}" width="90"
                                    alt="Danoori User">
                            </div>
                            <div class="ps-3">
                                <h3 class="fs-base mb-0">@auth {{ Auth::user()->name }} @else Danoori's Guest @endauth
                                </h3>
                                <span class="text-accent fs-sm">@auth {{ Auth::user()->email }} @endauth</span>
                            </div>
                        </div>
                        <a class="btn btn-light btn-sm btn-shadow mt-3 mt-sm-0" href="account-profile.html">
                            <i class="ci-edit me-2"></i>Edit profile
                        </a>
                    </div>
                    <!-- Shipping address-->

                    <h2 class="h6 pt-1 pb-3 mb-3 border-bottom">Shipping address</h2>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="checkout-fn">Name</label>
                                <input name="name" required @auth value="{{ Auth::user()->name }}" @endauth
                                    class="form-control" type="text" id="checkout-fn">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="checkout-email">E-mail Address</label>
                                <input name="email" @auth value="{{ Auth::user()->email }}" @endauth required
                                    class="form-control" type="email" id="checkout-email">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="checkout-phone">Phone Number</label>
                                <input name="phone_number" value="{{ old('phone_number') }}" required class="form-control"
                                    type="text" id="checkout-phone">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="checkout-address-1">Address</label>
                                <input name="address" required value="{{ old('phone_number') }}" class="form-control"
                                    type="text" id="checkout-address-1">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="city" class="form-label">City</label>
                                <input name="city" required value="{{ old('phone_number') }}" class="form-control"
                                    type="text" id="city">
                            </div>
                        </div>
                    </div>

                    @guest
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <div class="form-check form-switch" onclick="yesnoCheck();">
                                        <input type="checkbox" class="form-check-input" id="customSwitch1">
                                        <label class="form-check-label" for="customSwitch1">Want to create account?</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="display: none;" id="showPassword">
                        </div>
                    @endguest

                    <!-- Navigation (mobile)-->
                    <div class="row d-lg-none">
                        <div class="col-lg-8">
                            <div class="d-flex pt-4 mt-3">
                                <div class="w-50 pe-3">
                                    <a class="btn btn-secondary d-block w-100" href="{{ route('cart') }}">
                                        <i class="ci-arrow-left mt-sm-0 me-1"></i>
                                        <span class="d-none d-sm-inline">Back to Cart</span>
                                        <span class="d-inline d-sm-none">Back</span>
                                    </a>
                                </div>
                                <div class="w-50 ps-2">
                                    <button name="mobile-button" class="btn btn-primary d-block w-100" type="submit">
                                        <span class="d-none d-sm-inline">Place Order</span>
                                        <span class="d-inline d-sm-none">Place Order</span>
                                        <i class="ci-arrow-right mt-sm-0 ms-1"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Navigation (desktop)-->
                    <div class="d-none d-lg-flex pt-4 mt-3">
                        <div class="w-50 pe-3">
                            <a class="btn btn-secondary d-block w-100" href="{{ route('cart') }}">
                                <i class="ci-arrow-left mt-sm-0 me-1"></i>
                                <span class="d-none d-sm-inline">Back to Cart</span>
                                <span class="d-inline d-sm-none">Back</span>
                            </a>
                        </div>
                        <div class="w-50 ps-2">
                            <button name="desktop-button" class="btn btn-primary d-block w-100" type="submit">
                                <span class="d-none d-sm-inline">Place Order</span>
                                <span class="d-inline d-sm-none">Next</span>
                                <i class="ci-arrow-right mt-sm-0 ms-1"></i>
                            </button>
                        </div>
                    </div>
                </section>
                <!-- Sidebar-->
                @livewire('checkout-sidebar')

            </div>

        </form>

    </div>

    </form>


@endsection

@section('extra-js')
    <script>
        function yesnoCheck() {

            // alert(document.getElementById('customSwitch1').value);
            if (document.getElementById("customSwitch1").checked) {
                let password = `<div class="col-sm-6" id="passwordField">
                                                                                                <div class="mb-3">
                                                                                                    <label for="password" class="form-label">Password</label>
                                                                                                    <input name="password" required class="form-control" type="password" id="password">
                                                                                                </div>
                                                                                            </div>`;
                document.getElementById('showPassword').innerHTML += password;
                document.getElementById('showPassword').style.display = 'block';
            } else {
                document.getElementById('passwordField').remove();
            }
        }
    </script>

@endsection
