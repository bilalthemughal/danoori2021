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

    <style>
        .scrollable-cart-div {
            overflow: auto;
        }

        .purchase-popup {
            display: flex;
            /* visibility: hidden; */
            opacity: 0;
            padding: 0;
            position: fixed;
            left: 50px;
            bottom: 20px;
            z-index: 100;
            background: white;
            max-width: 360px;
            max-height: 0;
            box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
            transition: 1s ease;
            overflow: hidden;
            cursor: pointer;
        }

        .purchase-popup.active {
            left: 50px;
            bottom: 50px;
            /* visibility: visible; */
            opacity: 100;
            max-height: 150px;
            padding: 5px;
        }

        @media (max-width: 400px) {
            .purchase-popup {
                left: 10px;
            }

            .purchase-popup.active {
                left: 10px;
                bottom: 70px;
            }
        }

        @media (max-width: 800px) {
            .purchase-popup {
                left: 10px;
            }

            .purchase-popup.active {
                left: 10px;
                bottom: 100px;
            }
        }

        .image-container {
            max-width: 75px;
            z-index: 100;
            flex: 1;
        }

        .popup__text * {
            margin: 0;
            padding: 0;
        }

        .popup__text {
            margin-left: 5px;
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
            flex: 2;
        }

        .popup__detail {
            font-size: 12px;
            font-weight: 400;
        }

        .popup__heading {
            font-size: 16px;
            font-weight: 400;
        }

        .popup__time {
            font-size: 11px;
            color: purple;
        }

        .pop__cta {
            position: absolute;
            top: -5px;
            right: -5px;
            cursor: pointer;
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
    @include('frontend.partials.purchasepopup')
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
        href="https://wa.me/+923414455332" id="contactus-button" target="_blank">
        <img src="https://img.icons8.com/ios/24/000000/whatsapp--v2.png" /><span style="font-size: 18px;">&nbsp;CONTACT
            US</span>
    </a>
    <!-- Vendor scrits: js libraries and plugins-->
    <script src="{{ asset('vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/simplebar/dist/simplebar.min.js') }}"></script>
    <script src="{{ asset('vendor/tiny-slider/dist/min/tiny-slider.js') }}"></script>
    <script src="{{ asset('vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js') }}"></script>
    <link rel="stylesheet" media="screen" href="{{ asset('vendor/simplebar/dist/simplebar.min.css') }}" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.4/axios.min.js"
        integrity="sha512-lTLt+W7MrmDfKam+r3D2LURu0F47a3QaW5nF0c6Hl0JDZ57ruei+ovbg7BrZ+0bjVJ5YgzsAWE+RreERbpPE1g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Main theme script-->

    @livewireScripts
    @yield('extra-js')
    <script src="{{ asset('js/theme.min.js') }}"></script>
    <script>
        document.querySelector('#contactus-button').addEventListener('click', () => {
            fbq('track', 'Lead');
        })
    </script>

    <script>
        // import axios from 'axios';
        window.onload = function() {

            showPopUp();

            setInterval(() => {
                let popup = document.querySelector('.purchase-popup');
                popup.classList.remove('active');
                setTimeout(() => {
                    showPopUp();
                }, 5000)
            }, 10000)

            let popup__cta = document.querySelector('.pop__cta')
            popup__cta.addEventListener('click', function() {
                let popup = document.querySelector('.purchase-popup');
                popup.classList.remove('active');
            })

        }

        function showPopUp() {
            let image = document.querySelector('.popup__image');
            let popup__detail = document.querySelector('.popup__detail');
            let popup__heading = document.querySelector('.popup__heading');
            let popup__time = document.querySelector('.popup__time');
            let popup = document.querySelector('.purchase-popup');
            axios.get('/pop-up').then(({
                data
            }) => {
                image.src = 'https://res.cloudinary.com/danoori/image/upload/v1/' + data['photo'];
                popup__detail.innerHTML = 'Someone in ' + data['city'] + ' , Pakistan purchased';
                popup__heading.innerHTML = data['product_name'];
                popup__time.innerHTML = data['time'];
                popup.href = "/"+data['category_slug']+"/"+data['product_slug'];
                image.addEventListener('load', function() {
                    popup.classList.add('active');
                })
            })
        }
    </script>

</body>

</html>
