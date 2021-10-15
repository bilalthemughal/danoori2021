<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Checkout &#8211; Danoori</title>

    <!-- SEO Meta Tags-->
    <meta name="description" content="Danoori - Clothing store.">
    <meta name="keywords" content="lawn, replica, embroidered dresses">
    <meta name="author" content="Tech Notch">
    <!-- Viewport-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon and Touch Icons-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/icon180.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/icon32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/icon16.png') }}">
    <link rel="manifest" href="site.webmanifest">
    <link rel="mask-icon" color="#fe6a6a" href="safari-pinned-tab.svg">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <meta name="facebook-domain-verification" content="ixijrccyazbuvpq0s547fy0pk86ye2" />
    <!-- Vendor Styles including: Font Icons, Plugins, etc.-->

    <link rel="stylesheet" media="screen" href="{{ asset('vendor/tiny-slider/dist/tiny-slider.css') }}" />
    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" defer media="screen" href="{{ asset('css/theme.min.css') }}">
    @if (env('APP_ENV') == 'production')
        <script>
            ! function(f, b, e, v, n, t, s) {
                if (f.fbq) return;
                n = f.fbq = function() {
                    n.callMethod ?
                        n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                };
                if (!f._fbq) f._fbq = n;
                n.push = n;
                n.loaded = !0;
                n.version = '2.0';
                n.queue = [];
                t = b.createElement(e);
                t.async = !0;
                t.src = v;
                s = b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t, s)
            }(window, document, 'script',
                'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '383343576730611');
        </script>
        <!-- End Facebook Pixel Code -->

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-08YZTCCLVD"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', 'G-08YZTCCLVD');
        </script>
    @endif
    @livewireStyles
</head>

<body class="handheld-toolbar-enabled">

    <div class="page-title-overlap bg-dark pt-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
            <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
                <nav aria-label="breadcrumb">
                    <ol
                        class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
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
                    @auth

                        <div
                            class="d-sm-flex justify-content-between align-items-center bg-secondary p-4 rounded-3 mb-grid-gutter">
                            <div class="d-flex align-items-center">
                                <div class="img-thumbnail rounded-circle position-relative flex-shrink-0">

                                    <img class="rounded-circle" src="{{ asset('images/placeholder.png') }}" width="90"
                                        alt="Danoori User">
                                </div>
                                <div class="ps-3">
                                <h3 class="fs-base mb-0">@auth {{ Auth::user()->name }} @else Danoori's Guest
                                    @endauth
                                </h3>
                                <span class="text-accent fs-sm">@auth {{ Auth::user()->email }} @endauth</span>
                            </div>
                        </div>
                        {{-- <a class="btn btn-light btn-sm btn-shadow mt-3 mt-sm-0" href="account-profile.html">
                            <i class="ci-edit me-2"></i>Edit profile
                        </a> --}}
                    </div>
                @endauth
                <!-- Shipping address-->

                <h2 class="h6 pt-1 pb-3 mb-3 border-bottom">Shipping Address</h2>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="form-label" for="checkout-fn">Name (نام)</label>
                            <input name="name" required @auth value="{{ Auth::user()->name }}" @endauth
                                class="form-control" type="text" id="checkout-fn">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="form-label" for="checkout-email">E-mail Address (اگر آپ کے پاس ای میل
                                نہیں ہے تو اسے خالی چھوڑ دیں)</label>
                            <input name="email" @auth value="{{ Auth::user()->email }}" @endauth
                                class="form-control" type="email" id="checkout-email">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="form-label" for="checkout-phone">Phone Number (فون نمبر)</label>
                            <input name="phone_number" value="{{ old('phone_number') }}" required
                                class="form-control" type="text" id="checkout-phone">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="city" class="form-label">City (شہر)</label>
                            <input name="city" required value="{{ old('phone_number') }}" class="form-control"
                                type="text" id="city">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="form-label" for="checkout-address-1">Address (مکمل پتہ)</label>
                            <textarea class="form-control" name="address" value="{{ old('phone_number') }}"
                                required id="checkout-address-1" cols="20" rows="3"></textarea>
                        </div>
                    </div>
                </div>

                <!-- Navigation (mobile)-->
                <div class="row d-lg-none">
                    <div class="col-lg-8">
                        <div class="d-flex pt-4 mt-3">
                            <div class="w-50 pe-3">
                                <a class="btn btn-secondary d-block w-100" href="{{ route('cart')}}">
                                    <i class="ci-arrow-left mt-sm-0 me-1"></i>
                                    <span class="d-none d-sm-inline">Cart</span>
                                    <span class="d-inline d-sm-none">Cart</span>
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
                            <span class="d-none d-sm-inline">Back To Cart</span>
                            <span class="d-inline d-sm-none">Back To Cart</span>
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


@livewireScripts

<script>
        history.scrollRestoration = "manual";
        window.addEventListener("pageshow", function(event) {
            var historyTraversal = event.persisted ||
                (typeof window.performance != "undefined" &&
                    window.performance.navigation.type === 2);
            if (historyTraversal) {
                Livewire.emit('productAdded')
            }
            else {
                if({{ Session::get('checkoutInitiated') }}){
                    fbq('track', 'InitiateCheckout');
                }
            }
        });
    </script>
</body>

</html>
