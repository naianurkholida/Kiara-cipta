<header id="header" class="full-header clearfix">

	<div id="header-wrap">
		<div class="container" id="header_luar">
			<div class="container" id="header_dalem">
				<div class="container" id="header_detail" style="display: flex; justify-content:center;">
                    
					<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

					<!-- Logo ============================================= -->
					
					<!-- #logo end -->

					<!-- Primary Navigation ============================================= -->
					<nav id="primary-menu" class="style-2 with-arrows">
                        <ul>
                            <li>
                                <a href="">
                                    <div>Testing</div>
                                </a>   
                            </li>
                            <li>
                                <a href="">
                                    <div>Testing</div>
                                </a>   
                            </li>
                            <li>
                                <a href="">
                                    <div>Testing</div>
                                </a>   
                            </li>
                            <li>
                                <a href="">
                                    <div>Testing</div>
                                </a>   
                            </li>
                            <div id="logo" style="border:0;padding: 0px !important;margin: 0px !important;">
                                <a href="" class="standard-logo"><img src="{{asset('assets/images/dermaexpress.png')}}" alt="DermaexpressLogo"></a>
                                <a href="" class="retina-logo"><img src="{{asset('assets/images/dermaexpress.png')}}" alt="DermaexpressLogo"></a>
                            </div>
                            <li>
                                <a href="">
                                    <div>Testing</div>
                                </a>   
                            </li>
                            <li>
                                <a href="">
                                    <div>Testing</div>
                                </a>   
                            </li>
                            <li>
                                <a href="">
                                    <div>Testing</div>
                                </a>   
                            </li>
                            <li>
                                <a href="">
                                    <div>Testing</div>
                                </a>   
                            </li>
                            <!-- <li id="menu-hover">
                                <a href="">
                                    <div>Testing</div>
                                </a>
                               
                            </li>
                            <div class="menu-drop-new">
                                <div class="scroller-detail">
                                    <?php foreach(Helper::produkList() as $key => $row){ ?>
                                        <div class="submenu" id="submenu{{$key}}">
                                            <span>{{$row->getProdukLanguage->judul}}</span>
                                        </div>
                                    <?php } ?>
                                </div>

                                <?php foreach (Helper::produkList() as $key => $value) { ?>
                                    <div class="detail-submenu" id="detail-submenu{{$key}}">
                                        @foreach($value->getMedia('produk') as $row)
                                        <div class="img-home" style="margin-bottom:20px;width: 100%; height: 300px; background-color: #ffffff; background-image: url({{ $row->getUrl() }}); background-size: contain;background-repeat: no-repeat;   background-position: center;"></div>
                                        @endforeach

                                        {{ $value->getProdukLanguage->judul }}
                                        {!! $value->getProdukLanguage->deskripsi !!}

                                         <a href="{{ route('dermaster.products.show', $value->getProdukLanguage->seo) }}"><p id="dokter-name">{{ $value->getProdukLanguage->judul }}</p></a>
                                    </div>
                                <?php } ?>

                            </div>
                            @foreach(Helper::MenuFrontPage() as $row)
                            @if($row->url != "treatments" && $row->url != "products")
                            <li>
                                <a href="{{ route('dermaster.'.$row->url) }}">
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
                            @elseif($row->url == "treatments" && $row->url != "products")
                            <li>
                                <a href="#">
                                    <div>{{ $row->getMenuFrontPageLanguage->judul_menu }}</div>
                                </a>
                                @if(count(Helper::childFrontPage($row->id)) != 0)
                                <div class="mega-menu-content style-2 clearfix">
                                    <ul class="mega-menu-column col-lg-12">
                                        <li class="mega-menu-title">
                                            <ul style="display: none;">
                                                @foreach(Helper::childFrontPage($row->id) as $item)
                                                <li>
                                                    <a href="{{ route('dermaster.treatments', $item->url) }}">
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
                            @else
                            <li id="menu-hover">
                                <a href="{{ route('dermaster.'.$row->url) }}">
                                    <div>{{$row->getMenuFrontPageLanguage->judul_menu}}</div>
                                </a>
                               
                            </li>
                            <div class="menu-drop-new">
                                <div class="scroller-detail">
                                    <?php foreach(Helper::produkList() as $key => $row){ ?>
                                        <div class="submenu" id="submenu{{$key}}">
                                            <span>{{$row->getProdukLanguage->judul}}</span>
                                        </div>
                                    <?php } ?>
                                </div>

                                <?php foreach (Helper::produkList() as $key => $value) { ?>
                                    <div class="detail-submenu" id="detail-submenu{{$key}}">
                                        @foreach($value->getMedia('produk') as $row)
                                        <div class="img-home" style="margin-bottom:20px;width: 100%; height: 300px;background-image: url({{ $row->getUrl() }}); background-size: contain;background-repeat: no-repeat;   background-position: center;"></div>
                                        @endforeach
                                        <div class="desc-detail">
                                            <h2>
                                            {{ $value->getProdukLanguage->judul }}
                                            </h2>
                                            {!! $value->getProdukLanguage->deskripsi !!}

                                            <a href="{{ route('dermaster.products.show', $value->getProdukLanguage->seo) }}" class="btn-submenu">{{ $value->getProdukLanguage->judul }}</a>
                                        </div>
                                    </div>
                                <?php } ?>

                            </div>
                            @endif
                            @endforeach -->
                        </ul> 

                        </nav>
                        <!-- #primary-menu end -->
                        
                    </div>
                </div>
            </div>
        </div>

    </header>
