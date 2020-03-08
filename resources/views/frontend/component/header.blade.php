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
                        <!-- <ul>
                            @foreach(Helper::MenuFrontPage() as $row)
                                <li>
                                    <a href="{{ url($row->url) }}">
                                        <div>{{ $row->getMenuFrontPageLanguage->judul_menu }}</div>
                                    </a>
                                @if(count(Helper::childFrontPage($row->id)) != 0)
                                    <div class="mega-menu-content style-2 clearfix">
                                        <ul class="mega-menu-column col-lg-12">
                                            <li class="mega-menu-title">
                                                <ul>
                                                    @foreach(Helper::childFrontPage($row->id) as $item)
                                                    <li>
                                                        <a href="{{ url($row->url, str_replace(' ', '-', Helper::getLanguageJudul($item->id))) }}">
                                                            <div>{{ Helper::getLanguageJudul($item->id) }}</div>
                                                        </a>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                @endif
                                </li>
                            @endforeach
                        </ul> --> 
                        <ul>
                        	<li>
                        		<a href="{{route('dermaster.home')}}">
                        			<div>Home</div>
                        		</a>
                        	</li>
                        	<li>
                        		<a href="{{route('dermaster.tentang_kami')}}">
                        			<div>Tentang Kami</div>
                        		</a>
                        	</li>
                        	<li>
                        		<li class="sub-menu"><a href="" class="sf-with-ul"><div>Treatments</div></a>
                        			<ul style="display: none;">
                        				<li class="sub-menu">
                        					<a href="{{route('dermaster.treatments', '48')}}" class="sf-with-ul">BOTOX</a>
                        					<a href="{{route('dermaster.treatments', '49')}}" class="sf-with-ul">Meso DNA Salmon</a>
                        				</li>
                        			</ul>
                        		</li>
                        	</li>
                            <li>
                                <a href="{{route('dermaster.products')}}">
                                    <div>Products</div>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('dermaster.price_list')}}">
                                    <div>Price List</div>
                                </a>
                            </li>
                            <!-- <li>
                                <a href="{{route('dermaster.blog')}}">
                                    <div>Blog</div>
                                </a>
                            </li> -->
                            <li>
                                <a href="{{route('dermaster.gallery')}}">
                                    <div>Gallery</div>
                                </a>
                            </li>
                        	<!-- <li>
                        		<a href="{{route('dermaster.checkpoint')}}">
                        			<div>Check Point</div>
                        		</a>
                        	</li> -->
                        	<li>
                        		<a href="{{route('dermaster.kontak')}}">
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