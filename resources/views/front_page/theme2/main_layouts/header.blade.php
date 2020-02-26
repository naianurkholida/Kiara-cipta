<header id="header" class="clearfix static-sticky">
    <div id="header-wrap">
        <div class="container clearfix">
            <div id="primary-menu-trigger">
                <i class="icon-reorder">
                </i>
            </div>

            <!-- Logo
            ============================================= -->
            <div id="logo">
                <a href="index.html" class="standard-logo" data-dark-logo="images/mizan-panjang.png">
                    <img src="{{asset('themes/theme1/images/mizan-panjang.png')}}" alt="Canvas Logo">
                </a>
                <a href="index.html" class="retina-logo" data-dark-logo="images/mizan-panjang.png">
                    <img src="{{asset('themes/theme1/images/mizan-panjang.png')}}" alt="Canvas Logo">
                </a>
            </div><!-- #logo end -->

            <!-- Primary Navigation
            ============================================= -->
            <nav id="primary-menu" class="d-lg-flex d-xl-flex justify-content-xl-between justify-content-lg-between fnone with-arrows">
                <ul class="align-self-start">
                    <li><span class="menu-bg col-auto align-self-start d-flex"></span></li>
                    <!-- <li class="active"> -->
                    @foreach($header as $head)
                        <li>
                            <a href="{{Route('front_page.'.$head->url)}}">
                                <div>{{$head->judul_menu}}</div>
                            </a>
                        </li>
                    @endforeach
                </ul>

                <ul class="not-dark align-self-end">
                    <li>
                        <a href="#" class="header-button">
                            <div>@lang('language.donasi')</div>
                        </a>
                    </li>
                </ul>
            </nav><!-- #primary-menu end -->
        </div>
    </div>
</header>