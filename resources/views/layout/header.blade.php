<div id="header">
    <div class="header-top">
        <div class="container">
            <div class="pull-left auto-width-left">
                <ul class="top-menu menu-beta l-inline">
                    <li><a href=""><i class="fa fa-home"></i> 90-92 Lê Thị Riêng, Bến Thành, Quận 1</a></li>
                    <li><a href=""><i class="fa fa-phone"></i> 0163 296 7751</a></li>
                </ul>
            </div>
            <div class="pull-right auto-width-right">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                        <i class="fa fa-user"></i>
                        @if(Auth::check())
                        {{ Auth::user()->email }}
                        @else
                        Tài khoản
                        @endif
                        <span class="caret"></span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a href="{{ route('sendEmail')}}">Quên mật khẩu</a>
                        @if(!Auth::check())
                        <a href="{{ route('getsignin')}}">Đăng kí</a>
                        <a href="{{ route('getlogin')}}">Đăng nhập</a>
                        @endif
                        <a href="{{ route('getlogout')}}">Đăng xuất</a>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-top -->
    <div class="header-body">
        <div class="container beta-relative">
            <div class="pull-left">
                <a href="{{ route('home') }}" id="logo"><img src="/source/assets/dest/images/logo-cake.png" width="100px" alt=""></a>
            </div>
            <div class="pull-right beta-components space-left ov">
                <div class="space10">&nbsp;</div>
                <div class="beta-comp">
                    <form role="search" method="get" id="searchform" action="/">
                        <input type="text" value="" name="s" id="s" placeholder="Nhập từ khóa..." />
                        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
                    </form>
                </div>

                <div class="beta-comp">
                    <div class="cart">
                        <!-- <div class="beta-select">
                            <a href=""><i class="fa fa-shopping-cart"></i> Giỏ hàng (Trống)</a>
                        </div> -->
                        <div class="beta-comp">
                            @if(Session::has('cart'))
                            <div class="cart">
                                <div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng (@if(Session::has('cart')){{ Session('cart')->totalQty }}
                                    @else Trống @endif) <i class="fa fa-chevron-down"></i></div>

                                <div class="beta-dropdown cart-body">
                                    @foreach($productCarts as $product)
                                    <div class="cart-item">
                                        <a class="cart-item-delete" href="{{ route('delete-cart-item',$product['item']['id']) }}"><i class="fa fa-times"></i>
                                        </a>
                                        <div class="media">
                                            <a class="pull-left" href="#"><img src="/source/image/product/{{ $product['item']['image'] }}" alt=""></a>
                                            <div class="media-body">
                                                <span class="cart-item-title">{{ $product['item']['name'] }}</span>
                                                <span class="cart-item-amount">{{ $product['item']['qty'] }}*<span>
                                                        @if($product['item']['promotion_price']==0)
                                                        {{ number_format($product['item']['unit_price']) }}@else
                                                        {{ number_format($product['item']['promotion_price']) }}
                                                        @endif
                                                    </span></span>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                    <div class="cart-caption">
                                        <div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">{{ $cart->totalPrice }}</span></div>
                                        <div class="clearfix"></div>
                                        <div class="center">
                                            <div class="space10">&nbsp;</div>
                                            <a href="{{ route('shopping-cart') }}" class="beta-btn primary text-center">Xem <i class="fa fa-chevron-right"></i></a>
                                        </div>

                                        <div class="center">
                                            <div class="space10">&nbsp;</div>
                                            <a href="{{ route('showCart') }}" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- .cart -->
                            @endif
                        </div>
                    </div> <!-- .cart -->
                </div>
            </div>
            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-body -->
    <div class="header-bottom" style="background-color: #0277b8;">
        <div class="container">
            <a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
            <div class="visible-xs clearfix"></div>
            <nav class="main-menu">
                <ul class="l-inline ov">
                    <li><a href="{{ route('home') }}">Trang chủ</a></li>
                    <li><a href="">Sản phẩm</a>
                        <ul class="sub-menu">
                            @if(isset($producttypes))
                            @foreach ($producttypes as $producttype)
                            <li><a href="{{ route('showProductType', $producttype->id) }}">{{$producttype->name}}</a></li>
                            @endforeach
                            @endif
                        </ul>
                    </li>

                    <li><a href="{{ route('about-page') }}">Giới thiệu</a></li>
                    <li><a href="{{ route('contact-page') }}">Liên hệ</a></li>
                </ul>
                <div class="clearfix"></div>
            </nav>
        </div>
    </div>
</div>