<!-- Navbar 3 Level (Light)-->
<header class="shadow-sm">
    <!-- Topbar-->
    <div class="topbar topbar-dark bg-dark">
        <div class="container" style="display: flex; justify-content: center;">
            <div class="topbar-text text-nowrap d-sm-block d-md-none">
                <i class="ci-rocket"></i>
                {{-- <span class="text-muted me-1">Free Shipping:</span> --}}
                <a class="topbar-link">Free shipping on all orders</a>
            </div>
            <div class="tns-carousel tns-controls-static d-none d-md-block">
                <div class="tns-carousel-inner"
                    data-carousel-options="{&quot;mode&quot;: &quot;gallery&quot;, &quot;nav&quot;: false, &quot;autoplay&quot;: true}">
                    <div class="topbar-text">Free shipping on all orders</div>
                    <div class="topbar-text">We return money within 30 days</div>
                    <div class="topbar-text">Friendly 24/7 customer support</div>
                </div>
            </div>
        </div>
    </div>
    <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->
    <div class="navbar-sticky bg-light">
        <div class="navbar navbar-expand-lg navbar-light">
            <div class="container"><a class="navbar-brand d-none d-sm-block flex-shrink-0" href="/"><img
                        src="{{ asset('images/noori.png') }}" width="222" alt="Cartzilla"></a><a
                    class="navbar-brand d-sm-none flex-shrink-0 me-2" href="/"><img
                        src="{{ asset('images/mobile-logo.png') }}" width="74" alt="Cartzilla"></a>
                <div class="input-group d-none d-lg-flex mx-4">
                    {{-- <input class="form-control rounded-end pe-5" type="text" placeholder="Search for products"><i class="ci-search position-absolute top-50 end-0 translate-middle-y text-muted fs-base me-3"></i> --}}
                </div>
                <div class="navbar-toolbar d-flex flex-shrink-0 align-items-center">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-tool navbar-stuck-toggler" href="#">
                        <span class="navbar-tool-tooltip">Expand menu</span>

                        {{-- <div class="navbar-tool-icon-box">
                            <i class="navbar-tool-icon ci-heart"></i>
                        </div> --}}
                    </a>
                    <a class="navbar-tool ms-1 ms-lg-0 me-n1 me-lg-2" href="{{ route('login') }}">
                        <div class="navbar-tool-icon-box"><i class="navbar-tool-icon ci-user"></i></div>
                        <div class="navbar-tool-text ms-n3"><small>Hello, @guest Sign in @endguest @auth
                                {{ Auth::user()->name }}
                            @endauth</small>My Account</div>
                </a>
            </div>
            @livewire('nav-cart')
        </div>
    </div>

</div>
</header>
