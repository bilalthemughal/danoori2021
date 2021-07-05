<!-- Navbar 3 Level (Light)-->
<header class="shadow-sm">
    <!-- Topbar-->
    <div class="topbar topbar-dark bg-dark">
        <div class="container">
            <div class="topbar-text dropdown d-md-none"><a class="topbar-link dropdown-toggle" href="#"
                    data-bs-toggle="dropdown">Useful links</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="tel:00331697720"><i class="ci-support text-muted me-2"></i>(00)
                            33 169 7720</a></li>
                    <li><a class="dropdown-item" href="order-tracking.html"><i
                                class="ci-location text-muted me-2"></i>Order tracking</a></li>
                </ul>
            </div>
            <div class="topbar-text text-nowrap d-none d-md-inline-block"><i class="ci-support"></i><span
                    class="text-muted me-1">Support</span><a class="topbar-link" href="tel:00331697720">(00) 33 169
                    7720</a></div>
            <div class="tns-carousel tns-controls-static d-none d-md-block">
                <div class="tns-carousel-inner"
                    data-carousel-options="{&quot;mode&quot;: &quot;gallery&quot;, &quot;nav&quot;: false, &quot;autoplay&quot;: true}">
                    <div class="topbar-text">Free shipping on all Orders</div>
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
                    class="navbar-brand d-sm-none flex-shrink-0 me-2" href="index.html"><img
                        src="{{ asset('images/noori.jpeg') }}" width="74" alt="Cartzilla"></a>
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
    <div class="navbar navbar-expand-lg navbar-light navbar-stuck-menu mt-n2 pt-0 pb-2">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <!-- Search-->
                {{-- <div class="input-group d-lg-none my-3"><i
                        class="ci-search position-absolute top-50 start-0 translate-middle-y text-muted fs-base ms-3"></i>
                    <input class="form-control rounded-start" type="text" placeholder="Search for products">
                </div> --}}

                <!-- Primary menu-->
                <ul class="navbar-nav justify-content-center">
                    <li class="nav-item"><a class="nav-link" href="#">Home</a>

                    </li>
                    <li class="nav-item"><a class="nav-link">Shop</a>

                    </li>
                    <li class="nav-item"><a class="nav-link">Account</a>
                        
                    </li>
                    <li class="nav-item"><a class="nav-link">Pages</a>
                        
                    </li>
                    <li class="nav-item"><a class="nav-link">Blog</a>
                        
                    </li>
                    <li class="nav-item"><a class="nav-link">Docs / Componentss</a>
                       
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
</header>
