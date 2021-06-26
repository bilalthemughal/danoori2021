<!-- Navbar 3 Level (Light)-->
<header class="shadow-sm">
    <!-- Topbar-->
    <div class="topbar topbar-dark bg-dark">
        <div class="container">
            <div class="topbar-text dropdown d-md-none"><a class="topbar-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Useful links</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="tel:00331697720"><i class="ci-support text-muted me-2"></i>(00) 33 169 7720</a></li>
                    <li><a class="dropdown-item" href="order-tracking.html"><i class="ci-location text-muted me-2"></i>Order tracking</a></li>
                </ul>
            </div>
            <div class="topbar-text text-nowrap d-none d-md-inline-block"><i class="ci-support"></i><span class="text-muted me-1">Support</span><a class="topbar-link" href="tel:00331697720">(00) 33 169 7720</a></div>
            <div class="tns-carousel tns-controls-static d-none d-md-block">
                <div class="tns-carousel-inner" data-carousel-options="{&quot;mode&quot;: &quot;gallery&quot;, &quot;nav&quot;: false, &quot;autoplay&quot;: true}">
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
            <div class="container"><a class="navbar-brand d-none d-sm-block flex-shrink-0" href="/"><img src="{{asset('images/noori.png')}}" width="222" alt="Cartzilla"></a><a class="navbar-brand d-sm-none flex-shrink-0 me-2" href="index.html"><img src="{{asset('images/noori.jpeg')}}" width="74" alt="Cartzilla"></a>
                <div class="input-group d-none d-lg-flex mx-4">
                    {{-- <input class="form-control rounded-end pe-5" type="text" placeholder="Search for products"><i class="ci-search position-absolute top-50 end-0 translate-middle-y text-muted fs-base me-3"></i> --}}
                </div>
                <div class="navbar-toolbar d-flex flex-shrink-0 align-items-center">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"><span class="navbar-toggler-icon"></span></button><a class="navbar-tool navbar-stuck-toggler" href="#"><span class="navbar-tool-tooltip">Expand menu</span>
                        <div class="navbar-tool-icon-box"><i class="navbar-tool-icon ci-menu"></i></div></a><a class="navbar-tool d-none d-lg-flex" href="account-wishlist.html"><span class="navbar-tool-tooltip">Wishlist</span>
                        <div class="navbar-tool-icon-box"><i class="navbar-tool-icon ci-heart"></i></div></a><a class="navbar-tool ms-1 ms-lg-0 me-n1 me-lg-2" href="{{ route('login') }}">
                        <div class="navbar-tool-icon-box"><i class="navbar-tool-icon ci-user"></i></div>
                        <div class="navbar-tool-text ms-n3"><small>Hello, @guest Sign in @endguest @auth
                            {{ Auth::user()->name }}
                        @endauth</small>My Account</div></a>
                </div>
                @livewire('nav-cart')
            </div>
        </div>
        <div class="navbar navbar-expand-lg navbar-light navbar-stuck-menu mt-n2 pt-0 pb-2">
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <!-- Search-->
                    <div class="input-group d-lg-none my-3"><i class="ci-search position-absolute top-50 start-0 translate-middle-y text-muted fs-base ms-3"></i>
                        <input class="form-control rounded-start" type="text" placeholder="Search for products">
                    </div>
                    <!-- Departments menu-->
                    {{-- <ul class="navbar-nav navbar-mega-nav pe-lg-2 me-lg-2">
                        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle ps-lg-0" href="#" data-bs-toggle="dropdown"><i class="ci-view-grid me-2"></i>Departments</a>
                            <div class="dropdown-menu px-2 pb-4">
                                <div class="d-flex flex-wrap flex-sm-nowrap">
                                    <div class="mega-dropdown-column pt-3 pt-sm-4 px-2 px-lg-3">
                                        <div class="widget widget-links"><a class="d-block overflow-hidden rounded-3 mb-3" href="#"><img src="img/shop/departments/01.jpg" alt="Clothing"></a>
                                            <h6 class="fs-base mb-2">Clothing</h6>
                                            <ul class="widget-list">
                                                <li class="widget-list-item mb-1"><a class="widget-list-link" href="#">Women's clothing</a></li>
                                                <li class="widget-list-item mb-1"><a class="widget-list-link" href="#">Men's clothing</a></li>
                                                <li class="widget-list-item mb-1"><a class="widget-list-link" href="#">Kid's clothing</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="mega-dropdown-column pt-4 px-2 px-lg-3">
                                        <div class="widget widget-links"><a class="d-block overflow-hidden rounded-3 mb-3" href="#"><img src="img/shop/departments/02.jpg" alt="Shoes"></a>
                                            <h6 class="fs-base mb-2">Shoes</h6>
                                            <ul class="widget-list">
                                                <li class="widget-list-item mb-1"><a class="widget-list-link" href="#">Women's shoes</a></li>
                                                <li class="widget-list-item mb-1"><a class="widget-list-link" href="#">Men's shoes</a></li>
                                                <li class="widget-list-item mb-1"><a class="widget-list-link" href="#">Kid's shoes</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="mega-dropdown-column pt-4 px-2 px-lg-3">
                                        <div class="widget widget-links"><a class="d-block overflow-hidden rounded-3 mb-3" href="#"><img src="img/shop/departments/03.jpg" alt="Gadgets"></a>
                                            <h6 class="fs-base mb-2">Gadgets</h6>
                                            <ul class="widget-list">
                                                <li class="widget-list-item mb-1"><a class="widget-list-link" href="#">Smartphones &amp; Tablets</a></li>
                                                <li class="widget-list-item mb-1"><a class="widget-list-link" href="#">Wearable gadgets</a></li>
                                                <li class="widget-list-item mb-1"><a class="widget-list-link" href="#">E-book readers</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-wrap flex-sm-nowrap">
                                    <div class="mega-dropdown-column pt-4 px-2 px-lg-3">
                                        <div class="widget widget-links"><a class="d-block overflow-hidden rounded-3 mb-3" href="#"><img src="img/shop/departments/04.jpg" alt="Furniture"></a>
                                            <h6 class="fs-base mb-2">Furniture &amp; Decor</h6>
                                            <ul class="widget-list">
                                                <li class="widget-list-item mb-1"><a class="widget-list-link" href="#">Home furniture</a></li>
                                                <li class="widget-list-item mb-1"><a class="widget-list-link" href="#">Office furniture</a></li>
                                                <li class="widget-list-item mb-1"><a class="widget-list-link" href="#">Lighting and decoration</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="mega-dropdown-column pt-4 px-2 px-lg-3">
                                        <div class="widget widget-links"><a class="d-block overflow-hidden rounded-3 mb-3" href="#"><img src="img/shop/departments/05.jpg" alt="Accessories"></a>
                                            <h6 class="fs-base mb-2">Accessories</h6>
                                            <ul class="widget-list">
                                                <li class="widget-list-item mb-1"><a class="widget-list-link" href="#">Hats</a></li>
                                                <li class="widget-list-item mb-1"><a class="widget-list-link" href="#">Sunglasses</a></li>
                                                <li class="widget-list-item mb-1"><a class="widget-list-link" href="#">Bags</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="mega-dropdown-column pt-4 px-2 px-lg-3">
                                        <div class="widget widget-links"><a class="d-block overflow-hidden rounded-3 mb-3" href="#"><img src="img/shop/departments/06.jpg" alt="Entertainment"></a>
                                            <h6 class="fs-base mb-2">Entertainment</h6>
                                            <ul class="widget-list">
                                                <li class="widget-list-item mb-1"><a class="widget-list-link" href="#">Kid's toys</a></li>
                                                <li class="widget-list-item mb-1"><a class="widget-list-link" href="#">Video games</a></li>
                                                <li class="widget-list-item mb-1"><a class="widget-list-link" href="#">Outdoor / Camping</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul> --}}
                    <!-- Primary menu-->
                    <ul class="navbar-nav justify-content-center">
                        <li class="nav-item"><a class="nav-link" href="#">Home</a>
                            
                        </li>
                        <li class="nav-item"><a class="nav-link">Shop</a>
                            
                        </li>
                        <li class="nav-item"><a class="nav-link">Account</a>
                            <ul class="dropdown-menu">
                                <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown">Shop User Account</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="account-orders.html">Orders History</a></li>
                                        <li><a class="dropdown-item" href="account-profile.html">Profile Settings</a></li>
                                        <li><a class="dropdown-item" href="account-address.html">Account Addresses</a></li>
                                        <li><a class="dropdown-item" href="account-payment.html">Payment Methods</a></li>
                                        <li><a class="dropdown-item" href="account-wishlist.html">Wishlist</a></li>
                                        <li><a class="dropdown-item" href="account-tickets.html">My Tickets</a></li>
                                        <li><a class="dropdown-item" href="account-single-ticket.html">Single Ticket</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown">Vendor Dashboard</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="dashboard-settings.html">Settings</a></li>
                                        <li><a class="dropdown-item" href="dashboard-purchases.html">Purchases</a></li>
                                        <li><a class="dropdown-item" href="dashboard-favorites.html">Favorites</a></li>
                                        <li><a class="dropdown-item" href="dashboard-sales.html">Sales</a></li>
                                        <li><a class="dropdown-item" href="dashboard-products.html">Products</a></li>
                                        <li><a class="dropdown-item" href="dashboard-add-new-product.html">Add New Product</a></li>
                                        <li><a class="dropdown-item" href="dashboard-payouts.html">Payouts</a></li>
                                    </ul>
                                </li>
                                <li><a class="dropdown-item" href="account-signin.html">Sign In / Sign Up</a></li>
                                <li><a class="dropdown-item" href="account-password-recovery.html">Password Recovery</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link">Pages</a>
                            <ul class="dropdown-menu">
                                <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#">Navbar Variants</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="navbar-1-level-light.html">1 Level Light</a></li>
                                        <li><a class="dropdown-item" href="navbar-1-level-dark.html">1 Level Dark</a></li>
                                        <li><a class="dropdown-item" href="navbar-2-level-light.html">2 Level Light</a></li>
                                        <li><a class="dropdown-item" href="navbar-2-level-dark.html">2 Level Dark</a></li>
                                        <li><a class="dropdown-item" href="navbar-3-level-light.html">3 Level Light</a></li>
                                        <li><a class="dropdown-item" href="navbar-3-level-dark.html">3 Level Dark</a></li>
                                        <li><a class="dropdown-item" href="home-electronics-store.html">Electronics Store</a></li>
                                        <li><a class="dropdown-item" href="home-marketplace.html">Marketplace</a></li>
                                        <li><a class="dropdown-item" href="home-grocery-store.html">Side Menu (Grocery)</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="about.html">About Us</a></li>
                                <li><a class="dropdown-item" href="contacts.html">Contacts</a></li>
                                <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown">Help Center</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="help-topics.html">Help Topics</a></li>
                                        <li><a class="dropdown-item" href="help-single-topic.html">Single Topic</a></li>
                                        <li><a class="dropdown-item" href="help-submit-request.html">Submit a Request</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown">404 Not Found</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="404-simple.html">404 - Simple Text</a></li>
                                        <li><a class="dropdown-item" href="404-illustration.html">404 - Illustration</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link">Blog</a>
                            <ul class="dropdown-menu">
                                <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown">Blog List Layouts</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="blog-list-sidebar.html">List with Sidebar</a></li>
                                        <li><a class="dropdown-item" href="blog-list.html">List no Sidebar</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#">Blog Grid Layouts</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="blog-grid-sidebar.html">Grid with Sidebar</a></li>
                                        <li><a class="dropdown-item" href="blog-grid.html">Grid no Sidebar</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown">Single Post Layouts</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="blog-single-sidebar.html">Article with Sidebar</a></li>
                                        <li><a class="dropdown-item" href="blog-single.html">Article no Sidebar</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link">Docs / Components</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="docs/dev-setup.html">
                                        <div class="d-flex">
                                            <div class="lead text-muted pt-1"><i class="ci-book"></i></div>
                                            <div class="ms-2"><span class="d-block text-heading">Documentation</span><small class="d-block text-muted">Kick-start customization</small></div>
                                        </div></a></li>
                                <li class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="components/typography.html">
                                        <div class="d-flex">
                                            <div class="lead text-muted pt-1"><i class="ci-server"></i></div>
                                            <div class="ms-2"><span class="d-block text-heading">Components<span class="badge bg-info ms-2">40+</span></span><small class="d-block text-muted">Faster page building</small></div>
                                        </div></a></li>
                                <li class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="docs/changelog.html">
                                        <div class="d-flex">
                                            <div class="lead text-muted pt-1"><i class="ci-edit"></i></div>
                                            <div class="ms-2"><span class="d-block text-heading">Changelog<span class="badge bg-success ms-2">v2.0</span></span><small class="d-block text-muted">Regular updates</small></div>
                                        </div></a></li>
                                <li class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="mailto:support@createx.studio">
                                        <div class="d-flex">
                                            <div class="lead text-muted pt-1"><i class="ci-help"></i></div>
                                            <div class="ms-2"><span class="d-block text-heading">Support</span><small class="d-block text-muted">support@createx.studio</small></div>
                                        </div></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
