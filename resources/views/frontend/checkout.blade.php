@extends('frontend.layout')

@section('extra-css')

@endsection

@section('content')

    <div class="page-title-overlap bg-dark pt-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
            <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                        <li class="breadcrumb-item">
                            <a class="text-nowrap" href="index.html">
                                <i class="ci-home"></i>
                                Home
                            </a>
                        </li>
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
        <div class="col-md-8">
            <div class="d-flex justify-content-between align-items-center pt-3 pb-4 pb-sm-5 mt-1">
                <h2 class="h6 text-light mb-0">Fill out the form</h2>
                <a class="btn btn-outline-primary btn-sm ps-2" href="/"><i
                        class="ci-arrow-left me-2"></i>Continue shopping</a>
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
        <form method="post" action="{{ route('checkout') }}">
            @csrf
            <div class="row">
                <section class="col-lg-8">
                    <!-- Steps-->
                    {{-- <div class="steps steps-light pt-2 pb-3 mb-5"><a class="step-item active" href="shop-cart.html">
                        <div class="step-progress"><span class="step-count">1</span></div>
                        <div class="step-label"><i class="ci-cart"></i>Cart</div>
                    </a><a class="step-item active current" href="checkout-details.html">
                        <div class="step-progress"><span class="step-count">2</span></div>
                        <div class="step-label"><i class="ci-user-circle"></i>Details</div>
                    </a><a class="step-item" href="checkout-shipping.html">
                        <div class="step-progress"><span class="step-count">3</span></div>
                        <div class="step-label"><i class="ci-package"></i>Shipping</div>
                    </a><a class="step-item" href="checkout-payment.html">
                        <div class="step-progress"><span class="step-count">4</span></div>
                        <div class="step-label"><i class="ci-card"></i>Payment</div>
                    </a><a class="step-item" href="checkout-review.html">
                        <div class="step-progress"><span class="step-count">5</span></div>
                        <div class="step-label"><i class="ci-check-circle"></i>Review</div>
                    </a>
                </div> --}}
                    <!-- Autor info-->
                    <div
                        class="d-sm-flex justify-content-between align-items-center bg-secondary p-4 rounded-3 mb-grid-gutter">
                        <div class="d-flex align-items-center">
                            <div class="img-thumbnail rounded-circle position-relative flex-shrink-0">
                                <span class="badge bg-warning position-absolute end-0 mt-n2" data-bs-toggle="tooltip"
                                    title="" data-bs-original-title="Reward points">
                                    384
                                </span>
                                <img class="rounded-circle" src="img/shop/account/avatar.jpg" width="90"
                                    alt="Susan Gardner">
                            </div>
                            <div class="ps-3">
                                <h3 class="fs-base mb-0">Susan Gardner</h3>
                                <span class="text-accent fs-sm">s.gardner@example.com</span>
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
                                <input name="name" required class="form-control" type="text" id="checkout-fn">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="checkout-email">E-mail Address</label>
                                <input name="email" required class="form-control" type="email" id="checkout-email">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="checkout-phone">Phone Number</label>
                                <input name="phone_number" required class="form-control" type="text" id="checkout-phone">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="checkout-address-1">Address</label>
                                <input name="address" required class="form-control" type="text" id="checkout-address-1">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="city" class="form-label">City</label>
                                <input name="city" required class="form-control" type="text" id="city">
                            </div>
                        </div>
                    </div>

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
                        {{-- <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input name="password" required class="form-control" type="password" id="password">
                            </div>
                        </div> --}}
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
                            <button class="btn btn-primary d-block w-100" type="submit">
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
                            <button class="btn btn-primary d-block w-100" type="submit">
                                <span class="d-none d-sm-inline">Place Order</span>
                                <span class="d-inline d-sm-none">Next</span>
                                <i class="ci-arrow-right mt-sm-0 ms-1"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>


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
