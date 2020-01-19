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
                <a href="{{ route('home') }}" id="logo">
                    <img class="logo-image" src="{{ asset('images/logo.png') }}" alt="AgroX Logo" />
                </a>
            </div>
            <div class="col-md-9">
                <div class="header-right">
                    <nav class="menu">
                        <ul class="main-menu">
                            <li class="{{ request()->is('/') ? 'active' : '' }}">
                                <a href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="{{ request()->is('shop') ? 'active' : '' }}">
                                <a href="{{ route('shop.index') }}">Shop</a>
                            </li>
                            <li class="{{ request()->is('blog') ? 'active' : '' }}">
                                <a href="{{ route('blog.index') }}">Blog</a>
                            </li>
                            <li class="{{ request()->is('forum') ? 'active' : '' }}">
                                <a href="{{ route('forum.index') }}">Forum</a>
                            </li>
                            <li class="{{ request()->is('contact') ? 'active' : '' }}">
                                <a href="{{ route('pages.contact') }}">Contact</a>
                            </li>
                            <li class="{{ request()->is('about') ? 'active' : '' }}">
                                <a href="{{ route('pages.about') }}">About Us</a>
                            </li>
                        </ul>
                    </nav>
                    <div class="btn-wrap">
                        <div class="mini-cart-wrap">
                            <div class="mini-cart">
                                <div class="mini-cart-icon" data-count="{{ MCart::count() }}">
                                    <i class="ion-bag"></i>
                                </div>
                            </div>
                            <div class="widget-shopping-cart-content">
                                <ul class="cart-list">
                                    @forelse (MCart::content() as $item)
                                    <li>
                                        {{ Form::open(['route' => ['cart.destroy', $item['rowId']], 'method' => 'DELETE']) }}
                                            <button type="submit" class="remove">x</button>
                                        {{ Form::close() }}
                                        {{-- <a href="#" class="remove">×</a> --}}
                                        <a href="{{ route('shop.show', $item['slug']) }}">
                                            <img src="{{ asset('/storage/' . $item['image']) }}" alt="" />
                                            {{ $item['name'] }}&nbsp;
                                        </a>
                                        <span class="quantity">{{ $item['qty'] }} × Rs {{ $item['price'] }}</span>
                                    </li> 
                                    @empty
                                       Empty Cart 
                                    @endforelse
                                </ul>
                                <p class="total">
                                    <strong>Subtotal:</strong> 
                                    <span class="amount">Rs {{ MCart::total() }}</span>
                                </p>
                                <p class="buttons">
                                    <a href="{{ route('cart.index') }}" class="view-cart">View cart</a>
                                    @if (MCart::count() > 0)
                                    <a href="{{ route('checkout.index') }}" class="checkout">Checkout</a>
                                    @endif
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
                    <a href="{{ route('home') }}" id="logo-2">
                        <img class="logo-image" src="{{ asset('images/logo.png') }}" alt="AgroX Logo" />
                    </a>
                </div>
            </div>
            <div class="col-xs-2">
                <div class="header-right">
                    <div class="mini-cart-wrap">
                        <a href="{{ route('cart.index') }}">
                            <div class="mini-cart">
                                <div class="mini-cart-icon" data-count="{{ MCart::count() }}">
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