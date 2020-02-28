<header id="header" class="full-header clearfix">

    <div id="header-wrap">
        <div class="container">
            <div class="container">
                <div class="container clearfix">

                    <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

                    <!-- Logo ============================================= -->
                    <div id="logo" style="border:0;">
                        <a href="" class="standard-logo"><img src="{{asset('assets/images/dermaexpress.png')}}" alt="DermaexpressLogo"></a>
                        <a href="" class="retina-logo"><img src="{{asset('assets/images/dermaexpress.png')}}" alt="DermaexpressLogo"></a>
                    </div>
                    <!-- #logo end -->

                    <!-- Primary Navigation ============================================= -->
                    <nav id="primary-menu" class="style-2 with-arrows">

                        <ul>
                            <li class="current">
                            <a href="{{route('dermaster.home')}}">
                                    <div>Home</div>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('dermaster.tentang_kami')}}">
                                    <div>Tentang Kami</div>
                                </a>
                            </li>
                            <!-- <li>
                                <a href="{{route('dermaster.dokter')}}">
                                    <div>Dokter</div>
                                </a>
                            </li> -->
                            <li>
                                <a href="#">
                                    <div>Treatments</div>
                                </a>
                                <div class="mega-menu-content style-2 clearfix">
                                    <ul class="mega-menu-column col-lg-12">
                                        <li class="mega-menu-title">
                                            <ul>
                                                @foreach(Helper::getCategory(47) as $row)
                                                    <li>
                                                        <a href="{{ route('dermaster.treatments', str_replace(' ', '-', $row->category)) }}">
                                                            <div>{{ $row->category }}</div>
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="{{ route('dermaster.products') }}">
                                    <div>Products</div>
                                </a>

                            </li>
                            <li>
                                <a href="#">
                                    <div>Sosial</div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div>Blog</div>
                                </a>
                            </li>
                            <li>
                            <a href="{{route('dermaster.gallery')}}">
                                    <div>Gallery</div>
                                </a>
                            </li>
                            <li>
                                <a href="http://103.11.134.45:1717/apex/f?p=889">
                                        <div>Check Point</div>
                                    </a>
                                </li>
                            <li>
                                <a href="#">
                                    <div>Kontak</div>
                                </a>
                            </li>
                        </ul>

                        <!-- Top Search
                ============================================= -->
                        <div id="top-search">
                            <a href="#" id="top-search-trigger"><i class="icon-line-search"></i><i class="icon-line-cross"></i></a>
                            <form action="search.html" method="get">
                                <input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter..">
                            </form>
                        </div>
                        <!-- #top-search end -->



                    </nav>
                    <!-- #primary-menu end -->

                </div>
            </div>
        </div>
    </div>

</header>