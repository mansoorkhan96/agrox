<!-- Desktop Nav -->
<header id="header" class="header header-desktop header-2">
    <div class="top-search">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <form>
                        <input type="search" class="top-search-input" name="s" placeholder="What are you looking for?" />
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <a href="index.html" id="logo">
                    <img class="logo-image" src="{{ asset('images/logo.png') }}" alt="AgroX Logo" />
                </a>
            </div>
            <div class="col-md-9">
                <div class="header-right">
                    <nav class="menu">
                        <ul class="main-menu">
                            <li class="active dropdown">
                                <a href="#">Home</a>
                                <ul class="sub-menu">
                                    <li><a href="index.html">Organik Main</a></li>
                                    <li><a href="index-fresh.html">Organik Fresh</a></li>
                                    <li><a href="index-shop.html">Organik Shop</a></li>
                                    <li><a href="index-store.html">Organik Store</a></li>
                                    <li><a href="index-farm.html">Organik Farm</a></li>
                                    <li><a href="index-house.html">Organik House</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#">Pages</a>
                                <ul class="sub-menu">
                                    <li class="menu-item-has-children">
                                        <a href="#">About Us</a>
                                        <ul class="sub-menu">
                                            <li><a href="about-us.html">About us 01</a></li>
                                            <li><a href="about-us-2.html">About us 02</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="gallery-freestyle.html">Gallery Freestyle</a></li>
                                    <li><a href="gallery-grid.html">Gallery Grid</a></li>
                                    <li><a href="404.html">404</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="shortcodes.html">Shortcodes</a>
                            </li>
                            <li class="dropdown mega-menu">
                                <a href="#">Shop</a>
                                <ul class="sub-menu">
                                    <li>
                                        <div class="mega-menu-content">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="pt-4 pb-4">
                                                        <h3>Shop Pages</h3>
                                                        <ul>
                                                            <li><a href="my-account.html">My Account</a></li>
                                                            <li><a href="cart-empty.html">Empty Cart</a></li>
                                                            <li><a href="cart.html">Cart</a></li>
                                                            <li><a href="checkout.html">Check Out</a></li>
                                                            <li><a href="wishlist.html">Wishlist</a></li>
                                                            <li><a href="shop.html">Shop</a></li>
                                                            <li><a href="shop-list.html">Shop List</a></li>
                                                            <li><a href="shop-detail.html">Single Product</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="pt-4 pb-4">
                                                        <h3>Fruits</h3>
                                                        <ul>
                                                            <li><a href="#">Seville Orange</a></li>
                                                            <li><a href="#">Aurore Grape</a></li>
                                                            <li><a href="#">Tieton Cherry</a></li>
                                                            <li class="new"><a href="#">Tomato Juice</a></li>
                                                            <li><a href="#">Cauliflower</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="pt-4 pb-4">
                                                        <h3>Featured</h3>
                                                        <ul>
                                                            <li><a href="#">Sprouting Broccoli</a></li>
                                                            <li class="sale"><a href="#">Chinese Cabbage</a></li>
                                                            <li><a href="#">Cara Orange</a></li>
                                                            <li><a href="#">Cauliflower</a></li>
                                                            <li><a href="#">Tomato Juice</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="pt-4 pb-4">
                                                        <h3>Best Seller</h3>
                                                        <ul>
                                                            <li><a href="#">Uvina Grape</a></li>
                                                            <li><a href="#">Seville Orange</a></li>
                                                            <li><a href="#">Aurore Grape</a></li>
                                                            <li><a href="#">Tieton Cherry</a></li>
                                                            <li class="new"><a href="#">Tomato Juice</a></li>
                                                            <li><a href="#">Sprouting Broccoli</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="pt-4 pb-4">
                                                        <img src="{{ asset('images/megamenu_ads.jpg') }}" alt="" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#">Blog</a>
                                <ul class="sub-menu">
                                    <li><a href="blog.html">Blog List</a></li>
                                    <li><a href="blog-classic.html">Blog Classic</a></li>
                                    <li><a href="blog-masonry.html">Blog Masonry</a></li>
                                    <li><a href="blog-detail.html">Blog Single</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="contact-us.html">Contact</a>
                            </li>
                        </ul>
                    </nav>
                    <div class="btn-wrap">
                        <div class="mini-cart-wrap">
                            <div class="mini-cart">
                                <div class="mini-cart-icon" data-count="{{ Cart::instance('default')->count() }}">
                                    <i class="ion-bag"></i>
                                </div>
                            </div>
                            <div class="widget-shopping-cart-content">
                                <ul class="cart-list">
                                    @forelse (Cart::content() as $item)
                                    <li>
                                        {{ Form::open(['route' => ['cart.destroy', $item->rowId], 'method' => 'DELETE']) }}
                                            <button type="submit" class="remove">x</button>
                                        {{ Form::close() }}
                                        {{-- <a href="#" class="remove">×</a> --}}
                                        <a href="{{ route('shop.show', $item->model->slug) }}">
                                            <img src="{{ asset('/storage/' . $item->model->featured_image) }}" alt="" />
                                            {{ $item->model->name }}&nbsp;
                                        </a>
                                        <span class="quantity">{{ $item->qty }} × Rs {{ $item->model->price }}</span>
                                    </li> 
                                    @empty
                                       Empty Cart 
                                    @endforelse
                                </ul>
                                <p class="total">
                                    <strong>Subtotal:</strong> 
                                    <span class="amount">Rs {{ Cart::subtotal() }}</span>
                                </p>
                                <p class="buttons">
                                    <a href="{{ route('cart.index') }}" class="view-cart">View cart</a>
                                    <a href="checkout.html" class="checkout">Checkout</a>
                                </p>
                            </div>
                        </div>
                        <div class="top-search-btn-wrap">
                            <div class="top-search-btn">
                                <a href="javascript:void(0);">
                                    <i class="ion-search"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Mobile Nav -->
<header class="header header-mobile">
    <div class="container">
        <div class="row">
            <div class="col-xs-2">
                <div class="header-left">
                    <div id="open-left"><i class="ion-navicon"></i></div>
                </div>
            </div>
            <div class="col-xs-8">
                <div class="header-center">
                    <a href="index.html" id="logo-2">
                        <img class="logo-image" src="{{ asset('images/logo.png') }}" alt="AgroX Logo" />
                    </a>
                </div>
            </div>
            <div class="col-xs-2">
                <div class="header-right">
                    <div class="mini-cart-wrap">
                        <a href="{{ route('cart.index') }}">
                            <div class="mini-cart">
                                <div class="mini-cart-icon" data-count="{{ Cart::instance('default')->count() }}">
                                    <i class="ion-bag"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>