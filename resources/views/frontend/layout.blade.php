<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
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
        <noscript><img height="1" width="1" style="display:none"
                src="https://www.facebook.com/tr?id=383343576730611&ev=PageView&noscript=1" /></noscript>
        <!-- End Facebook Pixel Code -->
    @endif

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

    <style>
        .scrollable-cart-div {
            overflow: auto;
        }

    </style>

    @livewireStyles

    @yield('extra-css')
</head>
<!-- Body-->

<body class="handheld-toolbar-enabled">
    @include('frontend.partials.navbar')
    @yield('content')
    @include('frontend.partials.social')
    @include('frontend.partials.footer')
    <!-- Toolbar for handheld devices (Default)-->
    <div class="handheld-toolbar">
        <div class="d-table table-layout-fixed w-100">
            <a class="d-table-cell handheld-toolbar-item" href="javascript:void(0)" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse" onclick="window.scrollTo(0, 0)">
                <span class="handheld-toolbar-icon">
                    <i class="ci-menu"></i>
                </span>
                <span class="handheld-toolbar-label">Menu</span>
            </a>
            @livewire('mobile-cart')
        </div>
    </div>
    <!-- Back To Top Button-->
    <a class="btn btn-success rounded-pill btn-icon" style="position: fixed; bottom: 10%; right: 5%; z-index: 100;"
        href="https://wa.me/+923414455332" id="contactus-button">
        <img src="https://img.icons8.com/ios/24/000000/whatsapp--v2.png" /><span style="font-size: 18px;">&nbsp;CONTACT
            US</span>
    </a>
    <!-- Vendor scrits: js libraries and plugins-->
    <script src="{{ asset('vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/simplebar/dist/simplebar.min.js') }}"></script>
    <script src="{{ asset('vendor/tiny-slider/dist/min/tiny-slider.js') }}"></script>
    <script src="{{ asset('vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js') }}"></script>
    <link rel="stylesheet" media="screen" href="{{ asset('vendor/simplebar/dist/simplebar.min.css') }}" />
    <!-- Main theme script-->

    @livewireScripts
    @yield('extra-js')
    <script src="{{ asset('js/theme.min.js') }}"></script>
    <script>
        $('#contactus-button').click(function() {
            fbq('track', 'Lead');
        });
    </script>
</body>

</html>
