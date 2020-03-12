<!-- ##### Header Area Start ##### -->
<header class="header_area">
    <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
        <!-- Classy Menu -->
        <nav class="classy-navbar" id="essenceNav">
            <!-- Logo -->
            <a class="nav-brand" href="{{route('index')}}"><img src="/frontend/img/core-img/logo.png" alt="logoVenus" style="width:80px;"></a>
            <!-- Navbar Toggler -->
            <div class="classy-navbar-toggler">
                <span class="navbarToggler"><span></span><span></span><span></span></span>
            </div>
            <!-- Menu -->
            <div class="classy-menu">
                <!-- close btn -->
                <div class="classycloseIcon">
                    <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                </div>
                <!-- Nav Start -->
                <div class="classynav">
                    <ul>
                        <li><a href="{{route('allitems')}}">All items</a></li>
                        <li><a href="{{route('allitems')}}">Shop</a>
                            <div class="megamenu">
                                <ul class="single-mega cn-col-4">
                                    <li class="title">What are you looking for?</li>
                                    {{-- <li><a href="/shop">T-Shirts</a></li>
                                    <li><a href="/shop">Croptops</a></li>
                                    <li><a href="/shop">Hoodies</a></li>
                                    <li><a href="/shop">Sweaters</a></li>
                                    <li><a href="/shop">Jackets</a></li> --}}
                                    @foreach ($types as $item)
                                    <li><a href="{{route('products_in_types',$item->id)}}">{{$item->name}}</a></li>
                                    @endforeach
                                </ul>
                                {{-- <ul class="single-mega cn-col-4">
                                    <li class="title">Bot</li>
                                    <li><a href="/shop">Dresses</a></li>
                                    <li><a href="/shop">Pants</a></li>
                                    <li><a href="/shop">Shorts</a></li>
                                    <li><a href="/shop">Skirts</a></li>
                                </ul>
                                <ul class="single-mega cn-col-4">
                                    <li class="title">Accessories</li>
                                    <li><a href="/shop">Socks</a></li>
                                    <li><a href="/shop">Caps/Hats</a></li>
                                </ul>
                                <ul class="single-mega cn-col-4">
                                    <li class="title">Bags</li>
                                    <li><a href="/shop">Backpacks</a></li>
                                    <li><a href="/shop">Waist bags</a></li>
                                    <li><a href="/shop">Shoulder bag</a></li>
                                    <li><a href="/shop">Messenger bags</a></li>
                                </ul> --}}
                            </div>
                        </li>
                        <li><a href="{{route('blog')}}">Blog</a></li>
                        <li><a href="{{route('contact')}}">Contact</a></li>
                    </ul>
                </div>
                <!-- Nav End -->
            </div>
        </nav>

        <!-- Header Meta Data -->
        <div class="header-meta d-flex clearfix justify-content-end">
            <!-- Search Area -->
            <div class="search-area">
                <form action="{{route('search')}}" method="get">
                    <input type="search" name="search" placeholder="Type for search">
                    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </form>
            </div>
            <!-- Favourite Area -->
            <div class="favourite-area">
                <a href="#"><img src="/frontend/img/core-img/heart.svg" alt=""></a>
            </div>
            <!-- User Login Info -->
            <div class="user-login-info">
                @if (auth()->check())
                    <a href="{{route('profile')}}" ><img src="/frontend/img/core-img/user.svg" alt=""></a>
                @else
                    <a href="{{route('login')}}" ><img src="/frontend/img/core-img/user.svg" alt=""></a>
                @endif
                
            </div>
            <!-- Cart Area -->
            <div class="cart-area">
                <a href="#" id="essenceCartBtn"><img src="/frontend/img/core-img/bag.svg" alt="">
                    <span>           
                        @if (Session::has('cart'))
                            {{Session('cart')->totalQuantity}}
                        @else
                            0
                        @endif
                    </span>
                </a>
            </div>
        </div>

    </div>
</header>
<!-- ##### Header Area End ##### -->

<!-- ##### Right Side Cart Area ##### -->
<div class="cart-bg-overlay"></div>

<div class="right-side-cart-area">

    <!-- Cart Button -->
    <div class="cart-button">
        <a href="#" id="rightSideCart"><img src="/frontend/img/core-img/bag.svg" alt="">
            <span>           
                @if (Session::has('cart'))
                    {{Session('cart')->totalQuantity}}
                @else
                    0
                @endif
            </span>
        </a>
    </div>

    <div class="cart-content d-flex">

        <!-- Cart List Area -->
        <div class="cart-list">
            @if(Session::has('cart'))
            @foreach ($products as $product)
                <!-- Single Cart Item -->
                <div class="single-cart-item">
                        <a href="#" class="product-image">
                            <img src="/frontend/img/products/{{$product['item']['image']}}" class="cart-thumb" alt="">
                            <!-- Cart Item Desc -->
                            <div class="cart-item-desc">
                              <span class="product-remove"><a href="{{route('delete_cart', $product['item']['id'])}}"><i class="fa fa-close" aria-hidden="true"></i></a></span>
                                {{-- <span class="badge">Mango</span> --}}
                                <h6>{{$product['item']['name']}}</h6>
                                {{-- <p class="size">Size: S</p>
                                <p class="color">Color: Red</p> --}}
                                <p class="price">{{$product['item']['price_out']}} * {{$product['quantity']}}</p>
                                <p class="price">Tổng: {{$product['price']}}</p>
                            </div>
                        </a>
                </div>
            @endforeach
            @endif

        <!-- Cart Summary --> 
            
            <div class="cart-amount-summary">
                <h2>Summary</h2>
                <ul class="summary-table">
                    <li><span>delivery:</span> <span>Free</span></li>
                    <li><span>discount:</span> <span>0</span></li>
                    <li><span>total:</span> 
                        <span>
                            @if (Session::has('cart'))
                                {{Session('cart')->totalPrice}}
                            @endif
                        </span>
                    </li>
                </ul>
                <div class="checkout-btn mt-100">
                    <a href="{{route('checkout')}}" class="btn essence-btn">check out</a>
                </div>
            </div>
        </div>    
    </div>
</div>
<!-- ##### Right Side Cart End ##### -->