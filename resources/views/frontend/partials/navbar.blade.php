<!-- Navbar 3 Level (Light)-->
<header class="shadow-sm">
    <!-- Topbar-->
    <div class="topbar topbar-dark bg-dark">
        <div class="container" style="display: flex; justify-content: center;">
            <div class="topbar-text text-nowrap d-sm-block d-md-none">
                <i class="ci-rocket"></i>
                {{-- <span class="text-muted me-1">Free Shipping:</span> --}}
                {{-- <a class="topbar-link">Free shipping on all orders</a> --}}
                <a class="topbar-link">Orders placed after 26-April will be delivered after Eid.</a>
            </div>
            <div class="tns-carousel tns-controls-static d-none d-md-block">
                <div class="tns-carousel-inner"
                    data-carousel-options="{&quot;mode&quot;: &quot;gallery&quot;, &quot;nav&quot;: false, &quot;autoplay&quot;: true}">
                    {{-- <div class="topbar-text">Free shipping on all orders</div> --}}
                    {{-- <div class="topbar-text">We return money within 30 days</div> --}}
                    {{-- <div class="topbar-text">Friendly 24/7 customer support</div> --}}
                    <div class="topbar-text">Orders placed after 26-April will be delivered after Eid. Resuming delivery after Eid IN SHA ALLAH</div>
                </div>
            </div>
        </div>
    </div>

    <div class="navbar navbar-sticky navbar-light navbar-expand-lg  px-3 rounded" style="background-color: #fff;">
        <div class="container" style="background-color: fff;">
            <a class="navbar-brand d-none d-lg-block me-3 order-lg-1" href="/"><img
                    src="{{ asset('images/noori.png') }}" width="142" alt="Danoori"></a><a
                class="navbar-brand d-lg-none me-2" href="/"><img src="{{ asset('images/noori.png') }}" width="74"
                    alt="Danoori">
            </a>
            <div class="navbar-toolbar d-flex align-items-center order-lg-3">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCustomCollapse"><span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-tool ms-1 me-n1" href="{{ route('login') }}">
                    <div class="navbar-tool-icon-box">
                        <i class="navbar-tool-icon ci-user"></i>
                    </div>

                    <div class="navbar-tool-text ms-n3">
                        <small>Hello, @guest Sign in @endguest @auth
                            {{ Auth::user()->name }}
                        @endauth</small>
                    My Account
                </div>
            </a>
            @livewire('nav-cart')
        </div>
        <?php $categories = App\Models\Category::whereHas('products')->inRandomOrder()->limit(3)->get(); ?>
        <div class="collapse navbar-collapse me-auto order-lg-2" id="navbarCustomCollapse">
            <hr class="d-lg-none mt-3 mb-2">
            <ul class="navbar-nav">
                @foreach ($categories as $category)
                    <li class="nav-item"><a class="nav-link" href="{{ route('category.page', $category->slug) }}">{{ $category->name }}</a></li>
                @endforeach

            </ul>
        </div>
    </div>
</header>
